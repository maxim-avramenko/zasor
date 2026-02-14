<?php

return array(
    'module' => array(
        'class' => 'application.modules.page.PageModule',
    ),
    'import' => [],
    'component' => [
        'eventManager' => [
            'class' => 'yupe\components\EventManager',
            'events' => [
                'sitemap.before.generate' => [
                    ['\PageSitemapGeneratorListener', 'onGenerate']
                ]
            ]
        ]
    ],
    'rules' => [
        '/services' => 'page/page/index',
        '/<slug>' => 'page/page/view',

    ],
);