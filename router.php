<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Handle root URL by serving index.html if it exists
if ($uri === '/' && file_exists(__DIR__.'/public_html/index.html')) {
    $_SERVER['SCRIPT_NAME'] = '/index.html';
    require_once __DIR__.'/public_html/index.html';
    exit;
}

// Strip index.php/ prefix for routing to static files
$cleanUri = preg_replace('/^\/index\.php\//', '/', $uri);

// Serve static files from public_html
if ($cleanUri !== '/' && file_exists(__DIR__.'/public_html'.$cleanUri)) {
    return false;
}

// Otherwise, route to CodeIgniter
$_SERVER['SCRIPT_NAME'] = '/index.php';
require_once __DIR__.'/public_html/index.php';


