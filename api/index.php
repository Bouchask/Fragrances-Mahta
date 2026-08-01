<?php

// Ensure Vercel Serverless environment uses /tmp for all caching and compiled views
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('VIEW_COMPILED_PATH=/tmp/views');
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';

// Create the compiled views directory if it doesn't exist
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0777, true);
}

require __DIR__ . '/../public/index.php';
