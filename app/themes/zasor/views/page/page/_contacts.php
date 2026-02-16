<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;

$this->canonical = Yii::app()->createAbsoluteUrl('/page/page/view', ['slug' => $model->slug]);;

$this->pageH1 = $model->title;

$this->breadcrumbs = [Yii::t('PageModule.page', $model->title)];

?>
<div class="page-contacts">
    <div class="container">
        <div class="contacts">
            <h1>Контакты</h1>
            <div class="contacts-block">
                <img src="/images/24_7.webp" alt="Круглосуточно">
                <div class="contacts-adres">
                    <span class="icon-location"></span>420061 <br>Россия, Республика Татарстан, Казань,<br> ул. Николая Ершова, 27И
                </div>
                <div class="contacts-connection">
                    <div class="contacts-phone"><span class="icon-phone"></span><a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a></div>
                    <a class="mail" href="mailto:zasor116@mail.ru">zasor116@mail.ru</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sector-work">
    <div class="container">
        <h2>Область обслуживания</h2>
        <div class="position-work">Набережных Челнах, Нижнекамске,Альметевске, Лениногорске, Менделеевске А также города: Зеленодольск, Айша, Столбище, Высокая Гора, Арск, Ореховка, Загородный клуб, Базарные матаки, Залесный, Нагорный, Дербышки, Рыбная слобода, Мирный, Куюки, Большие клыки, Малые клыки, Самосырово, Орловка, Осиново, Верхний Услон, Васильево, Пестрецы, Волжск, Лаишево, Богатые Сабы, Займище, Набережные Моркваши, Богородское, Салмычи, Алтан, Константиновка, Усады, Бор. Матюшино, Борисково, Вознесение
        </div>
    </div>
</div>
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
            <div class="col">
                <h4>Специальные условиядля УК и ТСЖ</h4>
                <a href="tel:+79172612455" title="контактный телефон">Подробности - 8 (917) 261 24 55</a>
            </div>
            <div class="col">
                <div class="footer-app-commercial-section">
                    <div class="footer-app-commercial-section-sub">
                        <img src="/images/AppStore.webp" alt="">
                        <img src="/images/GooglePlay.webp" alt="">
                    </div>
                    <div class="footer-qr-commercial-block">
                        <img src="/images/qr.webp" alt="qr-app">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-12">
    <div class="container">
        <div class="question">
            Остались вопросы ?
            <span>Спросите <img src="/images/24_7.webp" alt=""> <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a></span>
        </div>
    </div>
</div>
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