<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        return response()->view('front.index', compact('collections'))
            ->header('Cache-Control', 'public, max-age=60, s-maxage=300, stale-while-revalidate=600');
    }

    public function catalogue(Request $request)
    {
        $query = Product::where('is_active', true);
        $currentCollection = null;

        if ($request->filled('collection')) {
            $colQuery = Collection::where('slug', $request->collection);
            if (is_numeric($request->collection)) {
                $colQuery->orWhere('id', $request->collection);
            }
            $currentCollection = $colQuery->first();

            if ($currentCollection) {
                $query->where('collection_id', $currentCollection->id);
            }
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'latest':
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->get();

        return response()->view('front.catalogue', compact('products', 'currentCollection'))
            ->header('Cache-Control', 'public, max-age=60, s-maxage=300, stale-while-revalidate=600');
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProducts = Product::where('is_active', true)
                            ->where('id', '!=', $product->id)
                            ->where('collection_id', $product->collection_id)
                            ->take(4)
                            ->get();

        if ($relatedProducts->count() < 4) {
            $moreProducts = Product::where('is_active', true)
                                ->where('id', '!=', $product->id)
                                ->whereNotIn('id', $relatedProducts->pluck('id'))
                                ->take(4 - $relatedProducts->count())
                                ->get();
            $relatedProducts = $relatedProducts->merge($moreProducts);
        }

        return response()->view('front.product', compact('product', 'relatedProducts'))
            ->header('Cache-Control', 'public, max-age=60, s-maxage=300, stale-while-revalidate=600');
    }

    public function contact()
    {
        return view('front.contact');
    }
}
