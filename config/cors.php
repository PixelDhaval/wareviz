<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Allow API routes
    'allowed_methods' => ['*'], // Allow all methods (GET, POST, etc.)
    'allowed_origins' => ['http://localhost:5173'], // Add your frontend URL
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, // Set to true if using authentication (e.g., Sanctum)
];

