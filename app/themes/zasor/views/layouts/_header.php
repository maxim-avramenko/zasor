<?php $yupe = Yii::app()->getModule('yupe'); ?>
<header class="header">
    <div class="container">
        <?php if (!empty($yupe->logo)): ?>
        <div class="header-logo">
            <!-- <img src="<?= CHtml::encode($yupe->getLogo()) ?>" alt="<?= CHtml::encode($yupe->siteName) ?>"> -->
            <img src="images/logo.webp" alt="<?= CHtml::encode($yupe->siteName) ?>">
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
                    <li><a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" target="_blank" rel="nofollow"><img class="ico-app" src="/images/app-store-download.svg" alt="AppStore"></a></li>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyApplicationGooglePlay)): ?>
                    <li><a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" target="_blank" rel="nofollow"><img class="ico-app" src="/images/google-play-app.png" alt="GooglePlay"></a></li>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyApplicationQR)): ?>
                    <li><img src="/<?= ltrim($yupe->companyApplicationQR, '/') ?>" alt="qr app"></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="header-contacts">
                <div class="around-the-clock">
                    <img src="/images/24_7.webp" alt="Круглосуточно">
                </div>
                    <!-- <button type="button" class="around-the-clock-btn" aria-label="Прослушать сообщение">
                        <img src="/images/24_7.webp" alt="Круглосуточно">
                    </button>
                    <audio id="audio-24-7" preload="metadata">
                        <source src="/robots.m4a" type="audio/mp4">
                    </audio> 
                </div>
                <script>
                (function() {
                    var btn = document.querySelector('.around-the-clock-btn');
                    var audio = document.getElementById('audio-24-7');
                    if (!btn || !audio) return;
                    btn.addEventListener('click', function() {
                        if (audio.paused) {
                            audio.play();
                        } else {
                            audio.pause();
                            audio.currentTime = 0;
                        }
                    });
                })();
                </script> -->
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
                        <li><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><span class="icon-phone"></span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if (!empty($yupe->companyPhone) || !empty($yupe->companyWorkTime)): ?>
                <div class="header-phone">
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
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

