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
    
    ?>

    <!-- css -->
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="https://atuin.ru/demo/fancybox/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="/css/swiper.css" rel="stylesheet" type="text/css">
    <!-- js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>




    <!-- Favicon -->
    <!-- fav icon -->
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="ZasoruNET" />
    <link rel="manifest" href="/favicon/site.webmanifest" />

    <!-- Гео-метатеги -->
    <?php $yupe = Yii::app()->getModule('yupe'); ?>
    <meta name="geo.region" content="RU" />
    <?php if (!empty($yupe->companyCity)): ?>
    <meta name="geo.placename" content="<?= CHtml::encode($yupe->companyCity) ?>" />
    <?php endif; ?>
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

    <?php
    $baseUrl = Yii::app()->getRequest()->getHostInfo() . Yii::app()->getBaseUrl();
    $localBusiness = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'url' => rtrim($baseUrl, '/') . '/',
    ];
    if (!empty($yupe->siteName)) {
        $localBusiness['name'] = $yupe->siteName;
    }
    if (!empty($yupe->siteDescription)) {
        $localBusiness['description'] = $yupe->siteDescription;
    }
    if (!empty($yupe->logo)) {
        $localBusiness['logo'] = rtrim($baseUrl, '/') . '/' . ltrim($yupe->logo, '/');
        $localBusiness['image'] = $localBusiness['logo'];
    }
    $hasAddress = !empty($yupe->companyStreet) || !empty($yupe->companyCity);
    if ($hasAddress) {
        $localBusiness['address'] = [
            '@type' => 'PostalAddress',
            'streetAddress' => $yupe->companyStreet ?: '',
            'addressLocality' => $yupe->companyCity ?: '',
            'addressRegion' => $yupe->companyRegion ?: '',
            'postalCode' => !empty($yupe->companyPostalCode) ? $yupe->companyPostalCode : '',
            'addressCountry' => $yupe->companyCountry ?: 'RU',
        ];
    }
    $localBusiness['geo'] = [
        '@type' => 'GeoCoordinates',
        'latitude' => '55.848509',
        'longitude' => '49.156316',
    ];
    if (!empty($yupe->companyWorkTime)) {
        $localBusiness['openingHours'] = 'Mo-Su';
    }
    if (!empty($yupe->companyPhone)) {
        $localBusiness['telephone'] = $yupe->companyPhone;
        $localBusiness['contactPoint'] = [
            '@type' => 'ContactPoint',
            'telephone' => $yupe->companyPhone,
            'contactType' => 'sales',
        ];
    }
    if (!empty($yupe->companyEmail) && isset($localBusiness['contactPoint'])) {
        $localBusiness['contactPoint']['email'] = $yupe->companyEmail;
    }
    ?>
    <script type="application/ld+json"><?= json_encode($localBusiness, JSON_UNESCAPED_UNICODE) ?></script>
    <?php if (!empty($this->schema)): ?>
        <script type="application/ld+json">
          <?php echo $this->schema; ?>
        </script>
    <?php endif; ?>

    <!-- 22 Yandex.Metrika counter -->
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

    <?php if (!empty($this->breadcrumbs)) : ?>
    <div class="breadcrumbs-container">
        <div class="container">
            <?php $this->renderPartial('//layouts/_breadcrumbs'); ?>
        </div>
    </div>
    <?php endif; ?>

    <?= $content; ?>

    <?php $this->renderPartial('//layouts/_footer'); ?>



<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_END); ?>

<?php //$this->renderPartial('//layouts/_modal'); ?>


<!-- Подключаем скрипты с оптимизацией -->
<?php

?>
<script type="text/javascript" src="/js/swiper-main.js"></script>
<script type="text/javascript" src="/js/main.min.js"></script>
</body>
</html>