<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'], // Методы, которые разрешены (например, GET, POST)
    'allowed_origins' => ['http://localhost:5173'], // Домены, которым разрешён доступ (или укажите конкретные домены)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
