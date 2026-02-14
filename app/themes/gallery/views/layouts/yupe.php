<!DOCTYPE html>
<html lang="<?= Yii::app()->getLanguage(); ?>">
<?php
Yii::import('application.components.UniversalAltHelper');
?>

<head>
    <?php
    \yupe\components\TemplateEvent::fire(GalleryThemeEvents::HEAD_START);
    
    // Preload критических ресурсов
    Yii::app()->clientScript->registerLinkTag('preload', null, '/web/css/main.min.css', null, [
        'as' => 'style'
    ]);
    
    // CSS файлы
    Yii::app()->clientScript->registerCssFile('/web/css/main.min.css');
    Yii::app()->clientScript->registerCssFile('/web/css/fix.css');
    
    // Preload для jQuery
    Yii::app()->clientScript->registerLinkTag('preload', null, Yii::app()->clientScript->getCoreScriptUrl() . '/jquery.min.js', null, [
        'as' => 'script'
    ]);
    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="6bb6e7ff9ea7e7e1" />

    <title><?= CHtml::encode($this->title); ?></title>
    <meta name="description" content="<?= CHtml::encode($this->description); ?>"/>
    <?php if ($this->canonical): ?>
        <link rel="canonical" href="<?= CHtml::encode($this->canonical); ?>"/>
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Гео-метатеги -->
    <meta name="geo.region" content="RU-TA" />
    <meta name="geo.placename" content="Казань" />
    <meta name="geo.position" content="55.7279352;49.1740352" />
    <meta name="ICBM" content="55.7279352, 49.1740352" />

    <!-- Переменные Yii -->
    <script type="text/javascript" defer>
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName; ?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken(); ?>';
        var yupeCartDeleteProductUrl = '<?= Yii::app()->createUrl('/cart/cart/delete/'); ?>';
        var yupeCartUpdateUrl = '<?= Yii::app()->createUrl('/cart/cart/update/'); ?>';
        var yupeCartWidgetUrl = '<?= Yii::app()->createUrl('/cart/cart/widget/'); ?>';
    </script>

    <!-- Микроразметка WebSite -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Галерея стиля - Рекламное агентство полного цикла",
        "alternateName": "Галерея стиля",
        "description": "Рекламное агентство полного цикла в Казани. Разработка брендов, наружная реклама, дизайн, брендирование. 15 лет опыта.",
        "url": "https://gs-kzn.ru/",
        "inLanguage": "ru",
        "publisher": {
            "@type": "Organization",
            "name": "Галерея стиля",
            "legalName": "ООО \"МС\"",
            "url": "https://gs-kzn.ru/",
            "logo": "https://gs-kzn.ru/web/img/icons/logo.png",
            "foundingDate": "2016",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "ул. Г. Ахунова, дом 20, офис №7",
                "addressLocality": "Казань",
                "addressRegion": "Республика Татарстан", 
                "postalCode": "420064",
                "addressCountry": "RU"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+7-843-240-53-00",
                "contactType": "customer service",
                "email": "2404300@mail.ru",
                "areaServed": "RU",
                "availableLanguage": ["Russian"]
            },
            "sameAs": [
                "https://vk.com/gallerystyle",
                "https://t.me/gs_kzn", 
                "https://www.youtube.com/channel/UC5uh1dbScphYHwTteD-QJQA"
            ]
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://gs-kzn.ru/search?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <!-- Микроразметка Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Галерея стиля",
        "legalName": "ООО \"МС\"",
        "url": "https://gs-kzn.ru/",
        "logo": "https://gs-kzn.ru/web/img/icons/logo.png",
        "description": "Рекламное агентство полного цикла в Казани. Разработка брендов, наружная реклама, дизайн, брендирование",
        "foundingDate": "2016",
        "taxID": "1659081677",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "ул. Г. Ахунова, дом 20, офис №7",
            "addressLocality": "Казань",
            "addressRegion": "Республика Татарстан",
            "postalCode": "420064",
            "addressCountry": "RU"
        },
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+7-843-240-53-00",
                "contactType": "customer service",
                "email": "2404300@mail.ru",
                "areaServed": "RU",
                "availableLanguage": ["Russian"]
            }
        ],
        "email": "2404300@mail.ru",
        "telephone": "+7-843-240-53-00",
        "sameAs": [
            "https://vk.com/gallerystyle",
            "https://t.me/gs_kzn",
            "https://www.youtube.com/channel/UC5uh1dbScphYHwTteD-QJQA"
        ],
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
                "opens": "09:00",
                "closes": "17:00"
            }
        ],
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "bestRating": "5",
            "ratingCount": "47",
            "reviewCount": "47"
        }
    }
    </script>

<!-- Yandex.Metrika counter 2-->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js', 'ym');

    ym(87534884, 'init', {webvisor:true, clickmap:true, accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/87534884" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



    <?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::HEAD_END); ?>
</head>

<body>
<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_START); ?>

<div class="wrapper">

    <?php $this->renderPartial('//layouts/_header'); ?>

    <?php if ($this->breadcrumbs) { ?>

        <main>
            <div class="container">

                <?php $this->renderPartial('//layouts/_sub_header'); ?>

                <?php $this->renderPartial('//layouts/_breadcrumbs'); ?>

                <?= $content; ?>

            </div>
        </main>

    <?php } else { ?>

        <?= $content; ?>

    <?php } ?>

    <?php $this->renderPartial('//layouts/_footer'); ?>

</div>

<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_END); ?>

<?php $this->renderPartial('//layouts/_modal'); ?>
<div class='notifications top-right' id="notifications"></div>

<!-- Подключаем скрипты с оптимизацией -->
<?php
// jQuery с defer
Yii::app()->clientScript->registerCoreScript('jquery', [
    'defer' => 'defer'
]);

// Основные скрипты с defer
Yii::app()->clientScript->registerScriptFile(
    '/web/js/main.js', 
    CClientScript::POS_END,
    ['defer' => 'defer']
);

Yii::app()->clientScript->registerScriptFile(
    '/web/js/auto-alt.js', 
    CClientScript::POS_END,
    ['defer' => 'defer']
);

// Яндекс.Метрика с async
$yandexMetrika = "
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, 'script', 'https://yastatic.net/metrika/tag.js', 'ym');

    ym(87534884, 'init', {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
";

Yii::app()->clientScript->registerScript('yandex-metrika', $yandexMetrika, CClientScript::POS_END, [
    'async' => true
]);
?>

<script type="text/javascript" defer>
document.addEventListener('DOMContentLoaded', function() {
    const BASE_SITE = 'Галерея стиля';
    const BASE_REGION = 'Казань';
    
    // Lazy Loading для изображений
    const images = document.querySelectorAll('img:not([loading])');
    const viewportHeight = window.innerHeight;
    
    const criticalImages = [
        'logo.png',
        'logo-sm.png', 
        'services-block/1.webp',
        'star.png'
    ];
    
    images.forEach(img => {
        const src = img.src.toLowerCase();
        const isCritical = criticalImages.some(critical => src.includes(critical));
        const rect = img.getBoundingClientRect();
        const isAboveFold = rect.top < viewportHeight * 1.5;
        
        if (!isCritical && !isAboveFold) {
            img.setAttribute('loading', 'lazy');
            
            img.addEventListener('load', function() {
                this.classList.add('loaded');
            });
            
            img.addEventListener('error', function() {
                console.log('Error loading image:', this.src);
                this.classList.add('loaded');
            });
        } else {
            img.classList.add('loaded');
        }
        
        img.classList.add('lazy-processed');
    });
    
    // Автоматическое добавление title для ссылок
    function getCurrentPage() {
        const path = window.location.pathname;
        const pageMap = {
            '/': 'Главная страница',
            '/services': 'Услуги',
            '/portfolio': 'Портфолио', 
            '/about': 'О компании',
            '/contacts': 'Контакты',
            '/news': 'Новости'
        };
        
        for (const [key, value] of Object.entries(pageMap)) {
            if (path === key || path.startsWith(key + '/')) {
                return value;
            }
        }
        
        return 'Страница сайта';
    }
    
    function getLinkType(url, text) {
        if (!url || url === '/' || url === '#' || url === '#modal') {
            return 'main';
        }
        
        if (url.startsWith('tel:') || /^\+7|8\s?\(\d{3}\)/.test(text)) {
            return 'phone';
        }
        
        if (url.startsWith('mailto:') || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(text)) {
            return 'email';
        }
        
        if (url.startsWith('http') && !url.includes('gs-kzn.ru')) {
            return 'external';
        }
        
        return 'internal';
    }
    
    function generateTitle(linkText, linkUrl, linkElement = null) {
        const pageContext = getCurrentPage();
        const linkType = getLinkType(linkUrl, linkText);
        
        if (linkElement && 
            (linkText.toLowerCase().includes('подробнее') || 
             linkElement.classList.contains('btn-border') ||
             linkElement.classList.contains('btn-gradient')) &&
            linkElement.closest('.services-block__item')) {
            
            const card = linkElement.closest('.services-block__item');
            const titleElement = card.querySelector('.services-block__subtitle');
            if (titleElement) {
                const serviceTitle = titleElement.textContent.trim();
                return `Узнать подробнее об услуге: ${serviceTitle} | ${BASE_SITE} - ${BASE_REGION}`;
            }
        }
        
        if (linkElement && 
            linkText.toLowerCase().includes('подробнее') &&
            linkElement.closest('.services-block__item, .portfolio-item, .card')) {
            
            const card = linkElement.closest('.services-block__item, .portfolio-item, .card');
            const titleElement = card.querySelector('h3, .title, .subtitle, .card-title');
            if (titleElement) {
                const itemTitle = titleElement.textContent.trim();
                return `Узнать подробнее: ${itemTitle} | ${BASE_SITE} - ${BASE_REGION}`;
            }
        }
        
        const templates = {
            'main': `Перейти на главную страницу | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`,
            'internal': `${linkText} - ${pageContext} | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`,
            'external': `${linkText} - внешний ресурс | ${BASE_SITE} - ${BASE_REGION}`,
            'phone': `Позвонить в ${BASE_SITE} по номеру ${linkText} | ${BASE_REGION}`,
            'email': `Написать письмо в ${BASE_SITE} | ${linkText}`
        };
        
        return templates[linkType] || templates['internal'];
    }
    
    function generateSocialTitle(url) {
        const socialMap = {
            'vk.com': 'ВКонтакте',
            't.me': 'Telegram', 
            'youtube.com': 'YouTube',
            'instagram.com': 'Instagram',
            'facebook.com': 'Facebook',
            '2gis.com': '2GIS',
            'yandex.ru': 'Яндекс'
        };
        
        for (const [domain, name] of Object.entries(socialMap)) {
            if (url.includes(domain)) {
                return `Мы в ${name} | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`;
            }
        }
        
        return `Социальная сеть | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`;
    }
    
    // Обрабатываем все ссылки без title
    const allLinks = document.querySelectorAll('a:not([title])');
    allLinks.forEach(link => {
        const linkText = link.textContent.trim();
        const linkUrl = link.getAttribute('href');
        
        let title = '';
        
        if (linkUrl && linkUrl.startsWith('http') && !linkUrl.includes('gs-kzn.ru')) {
            title = generateSocialTitle(linkUrl);
        } else if (link.classList.contains('icon-telegram') || linkUrl?.includes('t.me')) {
            title = `Мы в Telegram | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`;
        } else if (link.classList.contains('icon-vk') || linkUrl?.includes('vk.com')) {
            title = `Мы в ВКонтакте | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`;
        } else if (link.classList.contains('icon-youtube') || linkUrl?.includes('youtube.com')) {
            title = `Мы в YouTube | Рекламное агентство полного цикла ${BASE_SITE} - ${BASE_REGION}`;
        } else {
            title = generateTitle(linkText, linkUrl, link);
        }
        
        link.title = title;
    });
});
</script>

</body>
</html>