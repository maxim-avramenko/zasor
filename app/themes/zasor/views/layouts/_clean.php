<!DOCTYPE html>
<html lang="<?= Yii::app()->getLanguage(); ?>">

<head>
    <?php
    \yupe\components\TemplateEvent::fire(GalleryThemeEvents::HEAD_START);
    Yii::app()->getClientScript()->registerCssFile('/web/css/main.min.css');
    Yii::app()->getClientScript()->registerCssFile('/web/css/fix.css');
    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="6bb6e7ff9ea7e7e1" />

    <title><?= $this->title; ?></title>
    <meta name="description" content="<?= $this->description; ?>"/>
    <meta name="keywords" content="<?= $this->keywords; ?>"/>
    <?php if ($this->canonical): ?>
        <link rel="canonical" href="<?= $this->canonical ?>"/>
    <?php endif; ?>

    <link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
        <meta name="language" content="ru"/>
        <meta name="geo.region" content="RU" />
        <meta name="author" content="zmweb.ru" />   
        <meta name="geo.placename" content="Казань" />
        <meta name="geo.position" content="55.7279352 49.1740352" />
        <meta name="ICBM" content="55.7279352 49.1740352" />

    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
        var yupeCartDeleteProductUrl = '<?= Yii::app()->createUrl('/cart/cart/delete/')?>';
        var yupeCartUpdateUrl = '<?= Yii::app()->createUrl('/cart/cart/update/')?>';
        var yupeCartWidgetUrl = '<?= Yii::app()->createUrl('/cart/cart/widget/')?>';
    </script>

<!-- Yandex.Metrika counter 1 -->
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

<body itemscope itemtype="https://schema.org/Organization">
<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_START); ?>

<div class="wrapper">

    <?= $content ?>

</div>

<?php \yupe\components\TemplateEvent::fire(GalleryThemeEvents::BODY_END); ?>

<?php $this->renderPartial('//layouts/_modal'); ?>

<div class='notifications top-right' id="notifications"></div>
<?php
Yii::app()->getClientScript()->registerScriptFile('/web/js/main.js', CClientScript::POS_END);
?>
<?php
// ПОДКЛЮЧАЕМ СКРИПТЫ В КОНЦЕ СТРАНИЦЫ
Yii::app()->getClientScript()->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerScriptFile('/assets/607524a4/jquery.maskedinput.min.js', CClientScript::POS_END);
Yii::app()->getClientScript()->registerScriptFile('/web/js/main.js', CClientScript::POS_END);
?>
</body>
</html>
