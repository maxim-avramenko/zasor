<?php
/** @var $content string */
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html lang="RU"><!-- <![endif]-->
<?php
Yii::import('application.components.UniversalAltHelper');
?>
<head>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name = "viewport" content = "width = device-width, initial-scale=1, user-scalable=yes">
    <meta name="language" content="ru"/>
    <meta name="author" content="zMWeb.ru">
    <!-- verification -->
    <meta name="google-site-verification" content="u_cz4Fsx2r7_OAat8usanCxz4f4EeAa5VHZnjvpw7V8">
    <meta name="yandex-verification" content="2c9fa77bec8ae7e3" />
    <meta name="yandex-verification" content="cd1a81877b5889d3" />
    <!-- verification END -->
    <title><?= CHtml::encode($this->title); ?></title>
    <meta name="description" content="<?= CHtml::encode($this->description); ?>"/>
    <?php if ($this->canonical): ?>
        <link rel="canonical" href="<?= CHtml::encode($this->canonical); ?>"/>
    <?php endif; ?>
    <?php
    \yupe\components\TemplateEvent::fire(GalleryThemeEvents::HEAD_START);
    
    // Preload критических ресурсов
//    Yii::app()->clientScript->registerLinkTag('preload', null, '/css/main.css', null, [
//        'as' => 'style'
//    ]);
    
    // CSS файлы
//    Yii::app()->clientScript->registerCssFile('/css/swiper.css');
//    Yii::app()->clientScript->registerCssFile('/web/css/fix.css');
    
    // Preload для jQuery
//    Yii::app()->clientScript->registerLinkTag('preload', null, Yii::app()->clientScript->getCoreScriptUrl() . '/jquery.min.js', null, [
//        'as' => 'script'
//    ]);
    ?>

    <!-- css -->
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="https://atuin.ru/demo/fancybox/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="/css/swiper.css" rel="stylesheet" type="text/css">
    <!-- js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->




    <!-- Favicon -->
    <!-- fav icon -->
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="ZasoruNET" />
    <link rel="manifest" href="/favicon/site.webmanifest" />

    <!-- Гео-метатеги -->
    <meta name="geo.region" content="RU" />
    <meta name="geo.placename" content="Казань" />
    <meta name="geo.position" content="55.848509;49.156316" />
    <meta name="ICBM" content="55.848509, 49.156316" />
    <meta property="og:url" content="https://zasorunetkzn.ru/">
    <meta property="og:type" content="website">

    <meta property="og:image" content="https://zasorunetkzn.ru/images/541_1.jpg">
    <meta property="og:image:secure_url" content="https://zasorunetkzn.ru/logo.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="245" />
    <meta property="og:image:height" content="26" />

    <!-- title description -->
    <meta property="og:description" content="<?= CHtml::encode($this->description); ?>">
    <meta property="og:title" content="<?= CHtml::encode($this->title); ?>">
    <!-- title description END-->

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
        "name": "Устранение засоров в Казани по доступным ценам",
        "alternateName": "Устранение засоров в Казани",
        "description": "Услуги по устранению засоров в Казани и пригороде по разумным ценам с наличным и безналичным расчетом. Даем гарантию на все виды выполняемых нами работ. Возможно как единоразовое так и постоянное сотрудничество. Звоните!",
        "url": "https://zasorunetkzn.ru",
        "inLanguage": "ru",
        "publisher": {
            "@type": "Organization",
            "name": "Устранение засоров в Казани",
            "legalName": "",
            "url": "https://zasorunetkzn.ru/",
            "logo": "https://zasorunetkzn.ru/web/img/icons/logo.png",
            "foundingDate": "2016",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "",
                "addressLocality": "Казань",
                "addressRegion": "Республика Татарстан", 
                "postalCode": "",
                "addressCountry": "RU"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "",
                "contactType": "customer service",
                "email": "",
                "areaServed": "RU",
                "availableLanguage": ["Russian"]
            },
            "sameAs": [
                "https://zasorunetkzn.ru"
            ]
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://zasorunetkzn.ru/search?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <!-- schema json -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "",
            "url": "https://zasorunetkzn.ru/",
            "logo": "/icon192x192.png",
            "image": "/logo.png",
            "description": "Услуги по устранению засоров в Казани и пригороде по разумным ценам с наличным и безналичным расчетом. Даем гарантию на все виды выполняемых нами работ. Возможно как единоразовое так и постоянное сотрудничество. Звоните!",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "ул. Николая Ершова, 27И",
                "addressLocality": "Казань",
                "addressRegion": "Татарстан Республика",
                "postalCode": "420061",
                "addressCountry": "Россия"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "55.848509",
                "longitude": "49.156316"
            },
            "openingHours": "Mo-Su",
            "telephone": "+7 (917) 261 24 55",
            "priceRange": "$$",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+7 (917) 261 24 55",
                "contactType": "sales"
            }
        }
    </script>
    <!-- schema json END -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(62366107, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/62366107" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::HEAD_END); ?>
</head>

<body>
<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_START); ?>


    <?php $this->renderPartial('//layouts/_header'); ?>

    <?php $this->widget(
            'application.modules.menu.widgets.MenuWidget', array(
                    'name'         => 'menyu-v-shapke',
                    'params'       => array('hideEmptyItems' => true),
                    'view'         => 'main',
                    'viewParams' => array(
                            'htmlOptions' => array(
                                    'class' => 'menu-class',
                                    'id'    => 'menu-id',
                            )
                    ),
            )
    ); ?>


    <?= $content; ?>

    <?php $this->renderPartial('//layouts/_footer'); ?>



<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_END); ?>

<?php //$this->renderPartial('//layouts/_modal'); ?>


<!-- Подключаем скрипты с оптимизацией -->
<?php
// jQuery с defer
//Yii::app()->clientScript->registerCoreScript('jquery', [
//    'defer' => 'defer'
//]);
//
//// Основные скрипты с defer
//Yii::app()->clientScript->registerScriptFile(
//    '/web/js/main.min.js',
//    CClientScript::POS_END,
//    ['defer' => 'defer']
//);
//
//Yii::app()->clientScript->registerScriptFile(
//    '/js/swiper-main.js',
//    CClientScript::POS_END,
//    ['defer' => 'defer']
//);

// Яндекс.Метрика с async
//$yandexMetrika = "
//    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
//    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
//    (window, document, 'script', 'https://yastatic.net/metrika/tag.js', 'ym');
//
//    ym(87534884, 'init', {
//        clickmap:true,
//        trackLinks:true,
//        accurateTrackBounce:true,
//        webvisor:true
//    });
//";
//
//Yii::app()->clientScript->registerScript('yandex-metrika', $yandexMetrika, CClientScript::POS_END, [
//    'async' => true
//]);
?>
<script type="text/javascript" src="/js/swiper-main.js"></script>
<!--<script src="/js/main.min.js"></script>-->
</body>
</html>