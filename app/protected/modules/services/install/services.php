<?php

return [
    'module' => [
        'class' => 'application.modules.services.ServicesModule',
    ],
    'import' => [],
    'component' => [
        'eventManager' => [
            'class' => 'yupe\components\EventManager',
            'events' => [
                'sitemap.before.generate' => [
                    ['\ServicesSitemapGeneratorListener', 'onGenerate']
                ]
            ]
        ]
    ],
    'rules' => [
        '/services/' => 'services/services/index',
        '/services/<slug>' => 'services/services/view',
    ],
];

