<?php $yupe = Yii::app()->getModule('yupe'); ?>
<header class="header">
    <div class="container">
        <?php if (!empty($yupe->logo)): ?>
        <div class="header-logo">
            <img src="<?= CHtml::encode($yupe->getLogo()) ?>" alt="<?= CHtml::encode($yupe->siteName) ?>">
            <?php if (!empty($yupe->companyDescription)): ?>
            <div class="header-logo-description">
                <?= CHtml::encode($yupe->companyDescription) ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="header-app">
            <?php
            $hasApp = !empty($yupe->companyApplicationQR) || !empty($yupe->companyApplicationAppStore) || !empty($yupe->companyApplicationGooglePlay);
            if ($hasApp):
            ?>
            <div class="app-box">
                <div class="header-app-description">Удобное приложение для наших клиентов <span class="icon-question" rel="tooltip" data-title="На данный момент приложение на доработке" title=""></span></div>
                <ul>
                    <?php if (!empty($yupe->companyApplicationAppStore)): ?>
                    <li><a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" target="_blank" rel="nofollow"><img src="/images/AppStore.webp" alt="AppStore"></a></li>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyApplicationGooglePlay)): ?>
                    <li><a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" target="_blank" rel="nofollow"><img src="/images/GooglePlay.webp" alt="GooglePlay"></a></li>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyApplicationQR)): ?>
                    <li><img src="/<?= ltrim($yupe->companyApplicationQR, '/') ?>" alt="qr app"></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="header-contacts">
                <div class="around-the-clock">
                    <img src="/images/24_7.webp" alt="">
                </div>
                <?php
                $hasSocial = !empty($yupe->companyTelegram) || !empty($yupe->companyPhone) || !empty($yupe->companyYoutube) || !empty($yupe->companyInstagramm) || !empty($yupe->companyVk) || !empty($yupe->companyIMO);
                if ($hasSocial):
                ?>
                <div class="header-social">
                    <ul>
                        <?php if (!empty($yupe->companyTelegram)): ?>
                        <li><a href="<?= CHtml::encode($yupe->companyTelegram) ?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span></a></li>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyPhone)): ?>
                        <li><a href="whatsapp://send?phone=<?= preg_replace('/[^0-9+]/', '', $yupe->companyPhone) ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span></a></li>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyYoutube)): ?>
                        <li><a href="<?= CHtml::encode($yupe->companyYoutube) ?>" target="_blank" rel="nofollow"><span class="icon-youtube2"></span></a></li>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyInstagramm)): ?>
                        <li><a href="<?= CHtml::encode($yupe->companyInstagramm) ?>" rel="nofollow" target="_blank"><span class="icon-instagram"></span></a></li>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyVk)): ?>
                        <li><a href="<?= CHtml::encode($yupe->companyVk) ?>" rel="nofollow" target="_blank"><span class="icon-vk"></span></a></li>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyIMO)): ?>
                        <li><a href="<?= CHtml::encode($yupe->companyIMO) ?>" rel="nofollow" target="_blank"><span class="icon-imo"></span></a></li>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyPhone)): ?>
                        <li><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyPhone) ?>" title="контактный телефон"><span class="icon-phone"></span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if (!empty($yupe->companyPhone) || !empty($yupe->companyWorkTime)): ?>
                <div class="header-phone">
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyWorkTime)): ?>
                    <time><?= CHtml::encode($yupe->companyWorkTime) ?></time>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
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