<?php $yupe = Yii::app()->getModule('yupe'); ?>
<!-- Кнопка звонка внизу по центру -->
<div class="fixed-call-button">
    <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><span class="icon-phone"></span>
        <?= CHtml::encode($yupe->companyPhone) ?>
    </a>
</div>
<footer>
    <div class="container">
        <div class="footer">
            <div class="col">
                <?php if (!empty($yupe->logo)): ?>
                <div class="footer-logo">
                    <div class="footer-logo-box">
                        <img src="/images/logo-zasor-w.webp" alt="<?= CHtml::encode($yupe->siteName) ?>">
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
                    <span class="icon-phone"></span><a itemprop="telephone" href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
                    <?php if (!empty($yupe->companyWorkTime)): ?>
                    <span><?= CHtml::encode($yupe->companyWorkTime) ?></span>
                    <?php endif; ?>
                </div>
                <div class="footer-btn">
                    <a class="btn-wh" href="<?php echo $yupe->companyTelegram;?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span>Написать в Telegram</a>
                </div>
                <?php endif; ?>
                <?php if (!empty($yupe->companyPostalCode) || !empty($yupe->companyCountry) || !empty($yupe->companyCity) || !empty($yupe->companyStreet)): ?>
                <div class="adres" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                    <?php if (!empty($yupe->companyPostalCode)): ?><span itemprop="postalCode"><?= CHtml::encode($yupe->companyPostalCode) ?></span> <br><?php endif; ?>
                    <?php if (!empty($yupe->companyCountry)): ?><span itemprop="addressCountry"><?= CHtml::encode($yupe->companyCountry) ?></span><?php endif; ?>
                    <?php if (!empty($yupe->companyRegion)): ?><span itemprop="addressRegion"><?= CHtml::encode($yupe->companyRegion) ?></span><?php endif; ?>
                    <?php if (!empty($yupe->companyCity)): ?><span itemprop="addressLocality"><?= CHtml::encode($yupe->companyCity) ?></span><?php endif; ?>
                    <?php if (!empty($yupe->companyStreet)): ?><br> <span itemprop="streetAddress"><?= CHtml::encode($yupe->companyStreet) ?><?php if (!empty($yupe->companyOffice)): ?><?= CHtml::encode($yupe->companyOffice) ?><?php endif; ?></span><?php endif; ?>
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
                    <div class="prav-info-box">
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
                    </div>
                <?php
                $hasFooterApp = !empty($yupe->companyApplicationQR) || !empty($yupe->companyApplicationAppStore) || !empty($yupe->companyApplicationGooglePlay);
                if ($hasFooterApp):
                ?>
                <div class="footer-app-commercial-section">
                    <div class="footer-app-commercial-section-sub">
                        <span>Удобное приложение для наших клиентов</span>
                        <?php if (!empty($yupe->companyApplicationAppStore)): ?>
                        <a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" title="App Store" target="_blank" rel="nofollow"><img src="/images/app-store-download.svg" width="100" alt="App Store"></a>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyApplicationGooglePlay)): ?>
                        <a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" title="Google Play" target="_blank" rel="nofollow"><img src="/images/google-play-app.png" width="100" alt="Google Play"></a>
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
<!-- Cookie Consent Banner -->
<div id="cookieConsent" class="cookie-consent" data-nosnippet>
    <div class="cookie-content">
        <div class="cookie-icon">
            <span class="icon-bubbles2"></span>
        </div>
        <div class="cookie-text">
            <h4>🍪 Мы используем cookies</h4>
            <p>Продолжая использовать наш сайт, вы даете согласие на обработку файлов cookie и пользовательских данных в соответствии с <a href="/politika-konfidencialnosti" rel="nofollow">политикой конфиденциальности</a>.</p>
        </div>
        <div class="cookie-buttons">
            <button id="acceptCookies" class="cookie-btn cookie-btn-accept">Принять</button>
        </div>
    </div>
</div>
<!-- Cookie Consent Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cookieConsent = document.getElementById('cookieConsent');
    const acceptBtn = document.getElementById('acceptCookies');
    const declineBtn = document.getElementById('declineCookies');
    
    // Проверяем, есть ли уже сохраненное согласие
    function checkCookieConsent() {
        const consent = localStorage.getItem('cookieConsent');
        return consent !== null;
    }
    
    // Показываем баннер, если согласия еще нет
    if (!checkCookieConsent()) {
        // Небольшая задержка для более плавного появления
        setTimeout(() => {
            cookieConsent.classList.remove('hidden');
        }, 500);
    } else {
        cookieConsent.classList.add('hidden');
    }
    
    // Обработчик для кнопки "Принять"
    acceptBtn.addEventListener('click', function() {
        localStorage.setItem('cookieConsent', 'accepted');
        cookieConsent.classList.add('hidden');
        
        // Здесь можно включить аналитику, если нужно
        console.log('Cookies accepted');
        
        // Можно отправить событие в Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'granted'
            });
        }
    });
    
    // Обработчик для кнопки "Отклонить"
    declineBtn.addEventListener('click', function() {
        localStorage.setItem('cookieConsent', 'declined');
        cookieConsent.classList.add('hidden');
        
        // Здесь можно отключить аналитику
        console.log('Cookies declined');
        
        // Можно отправить событие в Google Analytics
        if (typeof gtag !== 'undefined') {
            gtag('consent', 'update', {
                'analytics_storage': 'denied'
            });
        }
    });
    
    // Закрытие по клику вне баннера (опционально)
    document.addEventListener('click', function(event) {
        if (!cookieConsent.contains(event.target) && !cookieConsent.classList.contains('hidden')) {
            // Не закрываем, чтобы пользователь точно сделал выбор
            // Можно добавить легкое покачивание для привлечения внимания
            cookieConsent.style.animation = 'shake 0.3s ease';
            setTimeout(() => {
                cookieConsent.style.animation = '';
            }, 300);
        }
    });
    
    // Анимация для привлечения внимания (опционально)
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    `;
    document.head.appendChild(style);
});
</script>
<!-- Скрипт для открытия подменю без перехода на страницу -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Только для мобильных устройств
    if (window.innerWidth <= 1024) {
        
        // Функция для закрытия всех открытых подменю
        function closeAllSubMenus(exceptThis = null) {
            const allSubMenus = document.querySelectorAll('.sub-menu.active, .sub-sub-menu.active');
            
            allSubMenus.forEach(menu => {
                if (menu !== exceptThis) {
                    menu.classList.remove('active');
                    
                    // Находим родительскую ссылку и убираем класс open
                    const parentLi = menu.closest('li.has-child');
                    if (parentLi) {
                        const parentLink = parentLi.querySelector('a');
                        if (parentLink) parentLink.classList.remove('open');
                    }
                }
            });
        }
        
        // Находим ВСЕ пункты с подменю (не только "Услуги")
        const allParentItems = document.querySelectorAll('.has-child > a');
        
        allParentItems.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Отменяем переход по ссылке
                
                // Находим родительский li и подменю
                const parentLi = this.closest('li.has-child');
                const subMenu = parentLi.querySelector('.sub-menu, .sub-sub-menu');
                
                if (subMenu) {
                    // Проверяем, открыто ли сейчас подменю
                    const isOpen = subMenu.classList.contains('active');
                    
                    if (isOpen) {
                        // Если открыто - закрываем
                        subMenu.classList.remove('active');
                        this.classList.remove('open');
                    } else {
                        // Если закрыто - закрываем все другие и открываем текущее
                        closeAllSubMenus(subMenu);
                        subMenu.classList.add('active');
                        this.classList.add('open');
                    }
                }
            });
        });
        
        // Закрытие меню при клике вне его
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.has-child')) {
                closeAllSubMenus();
            }
        });
    }
});
</script>
<script>
    // Этот код выполняется ДО загрузки DOM
    (function() {
        // Проверяем наличие согласия в localStorage
        window.hasCookieConsent = localStorage.getItem('cookieConsent');
        
        // Если согласие уже есть, сразу скрываем баннер (если он вдруг появится)
        if (window.hasCookieConsent) {
            var style = document.createElement('style');
            style.innerHTML = '#cookieConsent { display: none !important; }';
            document.head.appendChild(style);
        }
    })();
</script>