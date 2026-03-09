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
                    <li><a itemprop="url" href="/gidrodinamicheskaya-promyvka-kanalizacii.html">Промывка канализации</a></li>
                    <li><a itemprop="url" href="/mehanicheskaya-chistka-kanalizacii.html">Прочистка канализации</a></li>
                    <li><a itemprop="url" href="/kombinirovannaya-kanalopromyvochnaya-mashina.html">Комбинированная каналопромывочная машина</a></li>
                    <li><a itemprop="url" href="/uslugi-ilososa.html">Услуги илососа</a></li>
                    <li><a itemprop="url" href="/uslugi-assenizatora.html">Услуги ассенизатора</a></li>
                    <li><a itemprop="url" href="/otkachka-avtomoek.html">Очистка автомоек</a></li>
                    <li><a itemprop="url" href="/parogenerator.html">Аренда парогенератора</a></li>
                    <li><a itemprop="url" href="/ochistka-chistka-zhiroulovitelya.html">Прочистка жироуловителей</a></li>
                    <li><a itemprop="url" href="/otkachka-vygrebnyh-yam.html">Откачка выгребных ям</a></li>
                    <li><a itemprop="url" href="/obsluzhivanie-kns.html">Обслуживание КНС и ЛОС</a></li>
                    <li><a itemprop="url" href="/obsledovanie-trub.html">Обследование канализации</a></li>
                    <li><a itemprop="url" href="/razmorozka-trub.html">Разморозка труб</a></li>
                    <li><a itemprop="url" href="/ruchnaya-chistka-kolodca.html">Ручная очистка канализационных колодцев</a></li>
                    <li><a itemprop="url" href="/vodovoz.html">Водовоз - Доставка воды</a></li>
                    <li><a itemprop="url" href="/polivomoechnaya-mashina-kdm.html">Услуга КДМ - поливомойка</a></li>
                    <li><a itemprop="url" href="/ispytaniya-truboprovodov-na-prochnost-plotnost-i-germetichnost.html">Испытания трубопроводов - опрессовка труб</a></li>
                    <li><a itemprop="url" href="/arenda-pnevmozaglushki-dlya-trub.html">Пневмозаглушки для канализационных труб</a></li>
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

<?php /* ?>
<footer class="footer slide-up">
    <div class="container">
        <a href="/" class="footer__logo">
            <span class="footer__logo_img">
                <img src="/web/img/icons/logo.png" alt="Рекламное агентство - Галерея стиля">
            </span>
            <span class="footer__logo_text">
                Рекламное агентство полного цикла
            </span>
        </a>
        <div class="footer__info">
            <div class="footer__block">
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
                <p>
                    <span>©</span>
                    2016 - <?php echo date('Y'); ?>
                </p>
            </div>
            <div class="footer__items">
                <meta itemprop="name" content="Разрабатываем рекламную продукцию & создаём Бренды с нуля">
                <div class="footer__item">
                <span class="icon icon-clock">
                </span>
                    <p>
                     <time>   
                        <?php if (Yii::app()->getModule('yupe')->companyWorkTime) { ?>
                            <?= Yii::app()->getModule('yupe')->companyWorkTime ?>
                        <?php } ?>
                    </time>
                        <?php if (Yii::app()->getModule('yupe')->companyEmail) { ?>
                            <a itemprop="email" href="mailto:<?= Yii::app()->getModule('yupe')->companyEmail ?>" target="_blank">
                                <?= Yii::app()->getModule('yupe')->companyEmail ?>
                            </a>
                        <?php } ?>
                    </p>
                </div>
                <div class="footer__item">
                <span class="icon icon-map">
                </span>
                    
                       <ul class="schema-ul-footer">
                            
                            <!-- <li itemprop="addressCountry"> --> <li> <?= Yii::app()->getModule('yupe')->companyCountry ?>,</li>
                            <li><?= Yii::app()->getModule('yupe')->companyRegion ?>,</li>
                            <li><?= Yii::app()->getModule('yupe')->companyCity ?>,</li>
                            <li><?= Yii::app()->getModule('yupe')->companyStreet ?>,</li>
                            <li><?= Yii::app()->getModule('yupe')->companyOffice ?></li>
                            <li><span class="url">url:<a href="https://gs-kzn.ru/">gs-kzn.ru</a></span></li>
                        </ul> 
                    
                </div>
            </div>

            <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
                ?>
                <a href="tel:<?= $cleanPhone ?>" class="footer__tel"><?= Yii::app()->getModule('yupe')->companyPhone ?></a>
            <?php } ?>

        </div>
        <div class="footer__wrap">
            <a href="#" class="footer__dwnld">
                <span>
                    <img src="/web/img/icons/pdf.png" alt="">
                </span>
                - Презентация агентства
            </a>

            <?php if (Yii::app()->hasModule('menu')): ?>
                <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'main-menu', 'view' => 'footer']); ?>
            <?php endif; ?>

            <a href="#modal" data-fancybox class="footer__callback">
                Заказать звонок
            </a>
        </div>
        <div class="footer__btm">
            <div class="footer__note">
                Разработано и продвигается в - <a href="https://zmweb.ru" target="_blank">zMWeb</a>
            </div>
            <div class="footer__ur">
                <span class="inn">ИНН 1659081677</span><br>
                <span class="ooo-ms">ООО "МС"</span>
            </div>
            <div class="footer__links">
                <a href="/informaciya-na-sayte-ne-yavlyaetsya-publichnoy-ofertoy">
                    Информация на сайте не является публичной офертой
                </a>
                <a href="/politika-konfidencialnosti" target="_blank">
                    Политика конфиденциальности
                </a>
            </div>
        </div>
    </div>
</footer>


<script>
document.addEventListener('DOMContentLoaded', function() {
  // Элементы мобильного меню
  const openNav = document.querySelector('.open-nav');
  const closeNav = document.querySelector('.close-nav');
  const wrapNav = document.querySelector('.header .wrap-nav');
  const overlay = document.querySelector('.overlay');
  const menuItemsWithChildren = document.querySelectorAll('.header .menu-item.has-child > .menu-link');

  // Открытие/закрытие мобильного меню
  if (openNav && wrapNav) {
    openNav.addEventListener('click', function() {
      wrapNav.classList.add('open');
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    });

    closeNav.addEventListener('click', function() {
      wrapNav.classList.remove('open');
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    });

    overlay.addEventListener('click', function() {
      wrapNav.classList.remove('open');
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    });
  }

  // Обработка кликов по пунктам меню с подменю на мобильных
  if (menuItemsWithChildren) {
    menuItemsWithChildren.forEach(item => {
      item.addEventListener('click', function(e) {
        if (window.innerWidth <= 1023) {
          e.preventDefault();
          const subMenu = this.parentNode.querySelector('.sub-menu');
          if (subMenu) {
            subMenu.classList.toggle('active');
          }
        }
      });
    });
  }

  // Закрытие меню при ресайзе на десктоп
  window.addEventListener('resize', function() {
    if (window.innerWidth > 1023 && wrapNav) {
      wrapNav.classList.remove('open');
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    }
  });
});
</script>

<?php */ ?>