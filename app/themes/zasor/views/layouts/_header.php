
<header class="header">
    <div class="container">
        <div class="header-logo">
            <img src="/images/logo.webp" alt="Logo zasorunet">
            <div class="header-logo-description">
                Устранение засоров в Казани
            </div>
        </div>
        <div class="header-app">
            <div class="app-box">
                <div class="header-app-description">Удобное приложение для наших клиентов <span class="icon-question" rel="tooltip" data-title="На данный момент приложение на доработке" title=""></span></div>
                <ul>
                    <li><a href="#"><img src="/images/AppStore.webp" alt="AppStore zasorunet"></a></li>
                    <li><a href="#"><img src="/images/GooglePlay.webp" alt="GooglePlay zasorunet"></a></li>
                    <li><img src="/images/qr.webp" alt="qr app"></li>
                </ul>
            </div>
            <div class="header-contacts">
                <div class="around-the-clock">
                    <img src="/images/24_7.webp" alt="">
                </div>
                <div class="header-social">
                    <ul>
                        <li><a href="https://t.me/Zasorynet" rel="nofollow" target="_blank"><span class="icon-telegram"></span></a></li>
                        <li><a href="whatsapp://send?phone=79172612455" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span></a></li>
                        <li><a href="https://youtu.be/Ylvzt8IknEU" target="_blank"><span class="icon-youtube2"></span></a></li>
                        <li><a href="tel:+79172612455"><span class="icon-phone"></span></a></li>
                    </ul>
                </div>
                <div class="header-phone">
                    <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a>
                    <time>Круглосуточно</time>
                </div>
            </div>
        </div>
    </div>
</header>

<?php /*
<header class="header">
    <div class="container">
<a href="/" class="header__logo">
    <img itemprop="logo" src="/web/img/icons/logo.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/icons/logo.png', 'Логотип'); ?>">
    <img src="/web/img/icons/logo-sm.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/icons/logo-sm.png', 'Логотип мобильный'); ?>" class="hidden">
</a>
        <nav class="wrap-nav">
            <div class="close-nav">
                <span class="icon-close"></span>
            </div>
            <div class="header__mail">

                <?php if (Yii::app()->hasModule('menu')): ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'main-menu', 'view' => 'main']); ?>
                <?php endif; ?>

                <div class="socials">
                    <?php if (Yii::app()->getModule('yupe')->companyEmail) { ?>
                        <a href="mailto:<?= Yii::app()->getModule('yupe')->companyEmail ?>" target="_blank">
                            <span class="icon-mail4"></span>
                        </a>
                    <?php } ?>

                    <?php if (Yii::app()->getModule('yupe')->companyInstagramm) { ?>
                        <a href="<?= Yii::app()->getModule('yupe')->companyInstagramm ?>" target="_blank">
                            <span class="icon-telegram"></span>
                        </a>
                    <?php } ?>

                    <?php if (Yii::app()->getModule('yupe')->companyVk) { ?>
                        <a href="<?= Yii::app()->getModule('yupe')->companyVk ?>" target="_blank">
                            <span class="icon-vk"></span>
                        </a>
                    <?php } ?>

                    <?php if (Yii::app()->getModule('yupe')->companyYoutube) { ?>
                        <a href="<?= Yii::app()->getModule('yupe')->companyYoutube ?>" target="_blank">
                            <span class="icon-youtube"></span>
                        </a>
                    <?php } ?>

                </div>

            </div>
            <div class="header__info">

                <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                    $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone); ?>
                    <a href="tel:<?= $cleanPhone ?>"><?= Yii::app()->getModule('yupe')->companyPhone ?></a>
                <?php } ?>

                <p>

                    <?php if (Yii::app()->getModule('yupe')->companyWorkTime) { ?>
                        <span> График работы с</span> <?= Yii::app()->getModule('yupe')->companyWorkTime ?>
                    <?php } ?>

                </p>
                <p>
                    <span class="icon-location">
                        <a class="navigator-yandex-desktop" href="https://yandex.ru/maps/-/CCUBYHVyhA" target="_blank"></a>
                        <a class="navigator-yandex" href="yandexnavi://map_search?text=Галерея стиля"></span></a>
                    </span>
                
                    <?= Yii::app()->getModule('yupe')->companyStreet ?>
                    , <?= Yii::app()->getModule('yupe')->companyOffice ?>
                </p>
            </div>
        </nav>
        <div class="open-nav" aria-label="Открыть меню" aria-expanded="false">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
        <div class="overlay"></div>
    </div>

</header>

<?php */ ?>