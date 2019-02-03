<?php

return [
    'connection' => env('MONGODB_CONNECTION' ,'mongodb'),
    'collection' => env('MONGODB_LOG_COLLECTION' ,'logs'),
];