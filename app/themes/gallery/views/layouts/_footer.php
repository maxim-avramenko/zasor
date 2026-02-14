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
