<?php

return [
    'module' => [
        'class' => 'application.modules.sitemap.SitemapModule'
    ],
    'import' => [
        'application.modules.blog.listeners.SitemapGeneratorListener',
        'application.modules.page.listeners.PageSitemapGeneratorListener',
        'application.modules.services.listeners.ServicesSitemapGeneratorListener',
    ],
    'component' => [
        'sitemapGenerator' => [
            'class' => 'application.modules.sitemap.components.SitemapGenerator'
        ]
    ],
    'rules' => [
        'sitemap.xml' => 'sitemap/sitemap/index'
    ]
];
