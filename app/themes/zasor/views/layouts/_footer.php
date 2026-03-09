<?php $yupe = Yii::app()->getModule('yupe'); ?>
<footer>
    <div class="container">
        <div class="footer">
            <div class="col">
                <?php if (!empty($yupe->logo)): ?>
                <div class="footer-logo">
                    <div class="footer-logo-box">
                        <img src="/images/footer-logo.png" alt="<?= CHtml::encode($yupe->siteName) ?>">
                        <?php if (!empty($yupe->companyDescription)): ?>
                        <div class="footer-logo-description">
                            <?= CHtml::encode($yupe->companyDescription) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="copyright">2015 - <?= date('Y') ?> © Все права защищены</div>
                <div class="prav-info-footer">
                    <ul>
                        <li>ИП Тимиров А. И.</li>
                        <li>ОГРНИП: 313167431700057</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <h4>Услуги :</h4>
                <ul>
<?php
Yii::import('application.modules.page.models.Page');
$footerServicePages = Page::model()
    ->published()
    ->service()
    ->findAll([
        'condition' => '(t.parent_id IS NULL OR t.parent_id = 0)',
        'order' => 't.`order` ASC, t.id DESC',
    ]);
foreach ($footerServicePages as $page):
    $pageUrl = Yii::app()->createUrl('/page/page/view', ['slug' => $page->slug]);
?>
                    <li><a itemprop="url" href="<?= CHtml::encode($pageUrl) ?>" title="<?= CHtml::encode($page->title) ?>"><?= CHtml::encode($page->title) ?></a></li>
<?php endforeach; ?>
                </ul>
            </div>
            <div class="col">
                <h4>Контакты :</h4>
                <?php if (!empty($yupe->companyDescription)): ?>
                <div class="footer-contact-description"><?= CHtml::encode($yupe->companyDescription) ?></div>
                <?php endif; ?>
                <?php if (!empty($yupe->companyPhone)): ?>
                <div class="footer-tel">
                    <span class="icon-phone"></span><a itemprop="telephone" href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
                    <?php if (!empty($yupe->companyWorkTime)): ?>
                    <span><?= CHtml::encode($yupe->companyWorkTime) ?></span>
                    <?php endif; ?>
                </div>
                <div class="footer-btn">
                    <a class="btn-wh" href="whatsapp://send?phone=<?= preg_replace('/[^0-9+]/', '', $yupe->companyPhone) ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                </div>
                <?php endif; ?>
                <?php if (!empty($yupe->companyPostalCode) || !empty($yupe->companyCountry) || !empty($yupe->companyCity) || !empty($yupe->companyStreet)): ?>
                <div class="adres" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                    <?php if (!empty($yupe->companyPostalCode)): ?><span itemprop="postalCode"><?= CHtml::encode($yupe->companyPostalCode) ?></span> <br><?php endif; ?>
                    <?php if (!empty($yupe->companyCountry)): ?><span itemprop="addressCountry"><?= CHtml::encode($yupe->companyCountry) ?></span><?php endif; ?>
                    <?php if (!empty($yupe->companyRegion)): ?>, <span itemprop="addressRegion"><?= CHtml::encode($yupe->companyRegion) ?></span><?php endif; ?>
                    <?php if (!empty($yupe->companyCity)): ?>, <span itemprop="addressLocality"><?= CHtml::encode($yupe->companyCity) ?></span><?php endif; ?>
                    <?php if (!empty($yupe->companyStreet)): ?>,<br> <span itemprop="streetAddress"><?= CHtml::encode($yupe->companyStreet) ?><?php if (!empty($yupe->companyOffice)): ?>, <?= CHtml::encode($yupe->companyOffice) ?><?php endif; ?></span><?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($yupe->companyEmail)): ?>
                <div class="footer-mail">
                    <a href="mailto:<?= CHtml::encode($yupe->companyEmail) ?>"><?= CHtml::encode($yupe->companyEmail) ?></a>
                </div>
                <?php endif; ?>
            </div>
            <div class="col">
                <h4>Информация :</h4>
                <?php if (!empty($yupe->footerDisclaimerText)): ?>
                <div class="prav-info">
                    <?= $yupe->footerDisclaimerText ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($yupe->footerWarningText)): ?>
                <div class="prav-info prav-info-warning">
                    <?= $yupe->footerWarningText ?>
                </div>
                <?php endif; ?>
                <?php
                $hasFooterApp = !empty($yupe->companyApplicationQR) || !empty($yupe->companyApplicationAppStore) || !empty($yupe->companyApplicationGooglePlay);
                if ($hasFooterApp):
                ?>
                <div class="footer-app-commercial-section">
                    <div class="footer-app-commercial-section-sub">
                        <span>Удобное приложение для наших клиентов</span>
                        <?php if (!empty($yupe->companyApplicationAppStore)): ?>
                        <a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" title="App Store" target="_blank" rel="nofollow"><img src="/images/AppStore.webp" alt="App Store"></a>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyApplicationGooglePlay)): ?>
                        <a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" title="Google Play" target="_blank" rel="nofollow"><img src="/images/GooglePlay.webp" alt="Google Play"></a>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($yupe->companyApplicationQR)): ?>
                    <div class="footer-qr-commercial-block">
                        <img src="/<?= ltrim($yupe->companyApplicationQR, '/') ?>" alt="qr-app">
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-dev">
        <div class="container by-site">
            <span>Разработка и SEO-Продвижение - <a href="https://zmweb.ru">zMWeb</a></span>
        </div>
    </div>
</footer>