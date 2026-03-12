<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;

$this->canonical = Yii::app()->createAbsoluteUrl('/page/page/view', ['slug' => $model->slug]);

$this->pageH1 = $model->title;

$this->breadcrumbs = isset($breadcrumbs) ? $breadcrumbs : [
    Yii::t('PageModule.page', 'Главная') => Yii::app()->homeUrl,
    $model->title,
];
$this->schema = $model->json_head;
?>
<?php $yupe = Yii::app()->getModule('yupe'); ?>
<div class="page-contacts">
    <div class="container">
        <div class="contacts">
            <h1>Контакты</h1>

                <div class="contacts-block">
                    <img src="images/24_7.webp" alt="Круглосуточно">
                    
                    
                    <div class="contacts-adres">
                    <span class="icon-location"></span>

                    <?php
                    if (isset($yupe)) {
                        $addrParts = [];
                        
                        if (!empty($yupe->companyPostalCode)) {
                            $addrParts[] = '<span class="address-postal">' . CHtml::encode($yupe->companyPostalCode) . '</span> <br>';
                        }
                        if (!empty($yupe->companyCountry)) {
                            $addrParts[] = '<span class="address-country">' . CHtml::encode($yupe->companyCountry) . '</span>';
                        }
                        if (!empty($yupe->companyRegion)) {
                            $addrParts[] = '<span class="address-region">' . CHtml::encode($yupe->companyRegion) . '</span>';
                        }
                        if (!empty($yupe->companyCity)) {
                            $addrParts[] = '<span class="address-city">' . CHtml::encode($yupe->companyCity) . '</span> <br>';
                        }
                        if (!empty($yupe->companyStreet)) {
                            $addrParts[] = '<span class="address-street">' . CHtml::encode($yupe->companyStreet) . '</span>';
                        }
                        if (!empty($yupe->companyOffice)) {
                            $addrParts[] = '<span class="address-office">' . CHtml::encode($yupe->companyOffice) . '</span>';
                        }
                        
                        echo implode(' ', $addrParts);
                    }
                    ?>

                </div>

               
                <div class="contacts-connection">
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <div class="contacts-phone"><span class="icon-phone"></span><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a></div>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyEmail)): ?>
                    <a class="mail" href="mailto:<?= CHtml::encode($yupe->companyEmail) ?>"><?= CHtml::encode($yupe->companyEmail) ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (!empty($yupe->citiesList)): ?>
<div class="sector-work">
    <div class="container">
        <h2>Область обслуживания</h2>
        <div class="position-work"><?= nl2br(CHtml::encode($yupe->citiesList)) ?></div>
    </div>
</div>
<?php endif; ?>
<div class="contacts-map">
    <div class="container">
        <h3>Базируемся в Казани</h3>
        <div class="map-iframe">
            <img src="/images/map-cont.png" alt="map">
        </div>
    </div>
</div>
<div class="tszh-uk-contacts">
    <div class="container">
        <div class="tszh-uk-contacts-block">
            <?php if (!empty($yupe->companyPhone)): ?>
            <div class="col">
                <h4>Специальные условия для УК и ТСЖ</h4>
                <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон">Подробности - <?= CHtml::encode($yupe->companyPhone) ?></a>
            </div>
            <?php endif; ?>
            <?php if (!empty($yupe->companyApplicationQR) || !empty($yupe->companyApplicationAppStore) || !empty($yupe->companyApplicationGooglePlay)): ?>
            <div class="col">
                <div class="footer-app-commercial-section">
                    <div class="footer-app-commercial-section-sub">
                        <?php if (!empty($yupe->companyApplicationAppStore)): ?><a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" target="_blank" rel="nofollow"><img class="ico-app" src="/images/app-store-download.svg" alt="App Store"></a><?php endif; ?>
                        <?php if (!empty($yupe->companyApplicationGooglePlay)): ?><a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" target="_blank" rel="nofollow"><img class="ico-app" src="/images/google-play-app.png" alt="Google Play"></a><?php endif; ?>
                    </div>
                    <?php if (!empty($yupe->companyApplicationQR)): ?>
                    <div class="footer-qr-commercial-block">
                        <img src="/<?= ltrim($yupe->companyApplicationQR, '/') ?>" alt="qr-app">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if (!empty($yupe->companyPhone)): ?>
<div class="section-12">
    <div class="container">
        <div class="question">
            Остались вопросы ?
            <span>Спросите <img src="/images/24_7.webp" alt=""> <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a></span>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /* ?>
<div class="contacts slide-up">
    <div class="contacts__map">

        <?php if (Yii::app()->getModule('yupe')->companyMap) { ?>
            <?= Yii::app()->getModule('yupe')->companyMap ?>
        <?php } ?>

    </div>
    <div class="contacts__form">

        <?php if (Yii::app()->hasModule('callback')): ?>
            <?php $this->widget('application.modules.callback.widgets.CallbackWidget', ['view' => 'contacts']); ?>
        <?php endif; ?>

    </div>
</div>
<?php */ ?>