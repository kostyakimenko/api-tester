<?php

return [
    'domain' => 'http://localhost:8000',

    'endpoints' => [
        'getBooks' => '/api/v1/books/',
        'getSingleBook' => '/api/v1/books/:bookId',
        'order' => '/api/v1/books/:bookId/order',
        'getBooksByAdmin' => '/admin/api/v1/books/',
        'getSingleBookByAdmin' => '/admin/api/v1/books/:bookId',
        'addBookByAdmin' => '/admin/api/v1/add',
        'removeBookByAdmin' => '/admin/api/v1/books/remove/:bookId',
        'updateBookByAdmin' => '/admin/api/v1/books/update/:bookId',
        'getQueueByAdmin' => '/admin/api/v1/queue/:bookId',
        'addReaderByAdmin' => '/admin/api/v1/readers/add',
        'giveBookByAdmin' => '/admin/api/v1/books/:bookId/give',
        'getEventByAdmin' => '/admin/api/v1/events/:eventId',
        'updateEventByAdmin' => '/admin/api/v1/events/:eventId/update',
        'takeBookByAdmin' => '/admin/api/v1/books/:bookId/take'
    ],

    'pathToCookie' => '/tmp/web-backend-level3.txt'
];
