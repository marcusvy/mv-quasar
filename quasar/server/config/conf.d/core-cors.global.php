<?php
return [
    'cors' => [
        /**
         * Set the list of allowed origins domain with protocol.
         * For example:
         * 'allowed_origins' => ['http://www.mysite.com','https://api.mysite.com'],
         */
        'allowed_origins' => ['http://localhost:4200', 'http://localhost:8000'],

        /**
         * Set the list of HTTP verbs.
         */
        'allowed_methods' => ['HEAD', 'GET', 'POST', 'PUT', 'OPTIONS', 'DELETE'],

        /**
         * Set the list of allowed headers. This is returned in the preflight request to indicate
         * which HTTP headers can be used when making the actual request
         */
        'allowed_headers' => [
            'Keep-Alive',
            'User-Agent',
            'X-Requested-With',
            'If-Modified-Since',
            'Cache-Control',
            'Content-Type',
            'Accept',
            'Authorization'
        ],

        /**
         * Set the max age of the preflight request in seconds. A non-zero max age means
         * that the preflight will be cached during this amount of time
         */
        'max_age' => 7200,

        /**
         * Set the list of exposed headers. This is a whitelist that authorize the browser
         * to access to some headers using the getResponseHeader() JavaScript method. Please
         * note that this feature is buggy and some browsers do not implement it correctly
         */
        'expose_headers' => [
            'Date',
            'Etag',
            'Content-Type',
            'Authorization',
            'X-RateLimit-Limit',
            'X-RateLimit-Remaining',
            'X-RateLimit-Reset'
        ],

        /**
         * Standard CORS requests do not send or set any cookies by default. For this to work,
         * the client must set the XMLHttpRequest's "withCredentials" property to "true". For
         * this to work, you must set this option to true so that the server can serve
         * the proper response header.
         */
        'allowed_credentials' => false,
    ],
];
