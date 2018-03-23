<?php

return [
    'log' => [
        /**
         * The main log 'name'
         */
        'name' => 'mv_log',

        /**
         * Default option enabled
         */
        'enabled' => true,

        /**
         * The list of $configuration => $handlerList.
         * The default configuration is 'default_log'
         */
        'handlers' => [
            'stream' => [
                'enabled' => true,
                'format' => "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
                'output_dir' => __DIR__ . '/../../data/log/',
                'output_file' => 'app.log',
                'level' => 'info',
                'bubble' => true,
                'file_permission' => null,
                'use_locking' => false,
            ],
            'doctrine' => [
                'enabled' => true,
                'format' => "%level_name%: %message% %context% %extra%\n",
            ],
        ],
    ],
];
