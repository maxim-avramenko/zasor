<?php
/**
 * @var $this PageController
 * @var $model Page
 * @var $allServices array<Page>
 **/
?>

<?php

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description;
$this->keywords = $model->meta_keywords;

$this->canonical = Yii::app()->createAbsoluteUrl('page/page/view', ['slug' => $model->slug]);

$this->layout = "//layouts/yupe";

$this->schema = $model->json_head;
?>

<?php
$breadcrumbs = isset($breadcrumbs) ? $breadcrumbs : [];
$this->breadcrumbs = $breadcrumbs;
?>

<div class="serves-page">
    <div class="container">
        <div class="block-flex">
            <div class="block-one-serves-page">
                <h1><?= $model->title ?></h1>
                <div class="box-text-one-serves-page">
                    <?= $model->preamble ?>
                </div>
                <div class="price-page-serves">
                    Цена от:<div class="price-view"><?php echo $model->price; ?></div>руб.
                </div>
                <div class="txt-call-serves-page"><span>Звоните</span> <img src="/images/hd-24_7.webp" alt=""></div>
                <div class="phone-call-serves-page">
                    <a class="btn-phone-serves-page" href="tel:+<?php echo \Yii::app()->getModule('yupe')->companyPhone; ?>" title="контактный телефон"><?php echo \Yii::app()->getModule('yupe')->companyPhone; ?></a>
                    <a class="btn-wh-serves-page" href="whatsapp://send?phone=<?php echo \Yii::app()->getModule('yupe')->companyPhone; ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                </div>
            </div>
            <div class="block-two-serves-page">
                <div class="image-block-two-serves-page">
                    <img src="<?= $model->getImageUrl(); ?>" alt="<?= $model->title ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($model->one_gallery_id && Yii::app()->hasModule('gallery')) : ?>

    <?php $this->widget(
            'gallery.widgets.GalleryWidget',
            [
                    'galleryId' => $model->one_gallery_id,
                    'limit' => 9,
                    'view' => 'service'
            ]
    ); ?>

<?php endif; ?>

<div class="technical-specifications">
    <div class="container">
        <?php echo $model->full_text; ?>
    </div>
</div>

<div class="serves-page-content-1">
    <div class="container">
        <?php echo $model->text_3; ?>
    </div>
</div>
<div class="advantage-serves-page">
        <div class="container">
            <div class="block-flex">
                <!-- 1 -->
                <div class="advantage-serves-page-box">
                    <div class="advantage-clock">
						<span class="ico-clock">
							<img src="/images/time.webp" alt="">
						</span>
                    </div>
                    <div class="advantage-content">
                        <h2>Удобно и быстро</h2>
                        <p>У нас есть возможность записать вас на удобный день и время.</p>
                    </div>
                </div>
                <!-- 2 -->
                <div class="advantage-serves-page-box">
                    <div class="advantage-clock">
						<span class="ico-fsat-track">
							<img src="/images/fast track.webp" alt="">
						</span>
                    </div>
                    <div class="advantage-content">
                        <h2>Срочно</h2>
                        <p>Выполняем экстренные/срочные вызовы</p>
                    </div>
                </div>
                <!-- 3 -->
                <div class="advantage-serves-page-box">
                    <div class="advantage-clock">
						<span class="ico-rub">
							<img src="/images/icon-rub.webp" alt="">
						</span>
                    </div>
                    <div class="advantage-content">
                        <h2>Честные цены</h2>
                        <p>Никаких скрытых доплат. Все необходимо работы, определят мастера аварийной бригады на месте.</p>
                    </div>
                </div>
                <!-- 4 -->
                <div class="advantage-serves-page-box">
                    <div class="advantage-clock">
						<span class="ico-m-r">
							<img src="/images/m-r.webp" alt="">
						</span>
                    </div>
                    <div class="advantage-content">
                        <h2>Оплата за результат</h2>
                        <p>Все процедуры проводятся у вас на глазах.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="list-serves">
    <div class="container">
        <div class="block-flex">
            <div class="list-serves-text">
                <h3><?php echo $model->title; ?></h3>
                <div class="list-serves-slist">
                    <?php echo $model->text_4; ?>
                </div>
                <div class="list-serves-contacts">
                    <div class="ls-box-contacts">
                        <div class="ls-contacts"><a href="tel:<?php echo \Yii::app()->getModule('yupe')->companyPhone; ?>" title="контактный телефон"><?php echo \Yii::app()->getModule('yupe')->companyPhone; ?></a></div>
                        <time>Круглосуточно 24 / 7</time>
                    </div>
                    <div class="ls-wh">
                        <a class="btn-wh-serves-page" href="whatsapp://send?phone=<?php echo \Yii::app()->getModule('yupe')->companyPhone; ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                    </div>
                </div>
            </div>
            <div class="list-serves-images">
                <div class="sl-img">
                    <img src="/images/content-images.webp" alt=""> <!-- upload -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-block-price">
    <div class="container">
        <div class="block-flex">
            <!-- 1 -->
            <div class="block-sr-price-one">
                <h2><?php echo $model->title; ?></h2>
                <div class="whats-the-price-block">
                    <?php echo $model->text_5; ?>
                </div>
                <div class="block-sr-oplata-nds">
                    Работаем с
                    <div class="box-sr-oplata-nds">
                        <strong>НДС <span>и без</span> НДС</strong>
                        <ul>
                            <li>Возможен наличныйи безналичный расчет.</li>
                            <li>Заключаем договор на обслуживание.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 2 -->
            <div class="block-sr-price-two">
                <div class="ring-box">
                    <div class="ring-box-logo">
                        <img src="images/logo.webp" alt="Logo zasorunet">
                        <div class="header-logo-description">
                            Устранение засоров в Казани
                        </div>
                    </div>
                    <div class="ring-box-phone">
                        <a href="tel:<?php echo '+'.preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" title="контактный телефон"><?php echo \Yii::app()->getModule('yupe')->companyPhone; ?></a>
                        <div class="work-24">
                            <img src="images/24_7.webp" alt="">
                            <time><b>Круглосуточно</b></time>
                        </div>
                    </div>
                    <div class="ring-box-content">
                        Все подробности узнавайте по телефону.
                        Оказываем бесплатную подробную консультацию.
                    </div>
                    <div class="ring-box-wh-btn">
                        <a class="btn-wh-serves-page" href="whatsapp://send?phone=<?php echo preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container">
        <div class="btn-work-area-time">
            <div class="btn-work-area-time-item">
                <a class="btn-wh" href="whatsapp://send?phone=<?php echo preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                <div class="section-10-block-tel">Остались вопросы ? - <a class="tel-light" href="tel:<?php echo '+'.preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" title="контактный телефон"><?php echo \Yii::app()->getModule('yupe')->companyPhone; ?></a></div>
            </div>
        </div>
    </div>
</div>

    <div class="menu-serves">
        <div class="container">
            <div class="service__list">
                <div class="title title-line">
                    Наши услуги
                </div>
                <div class="service__slider">
                    <div class="service-slider swiper-container-initialized swiper-container-horizontal" style="cursor: grab;">
                        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1815px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="10" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/kombinirovannaya-kanalopromyvochnaya-mashina.html">Кoмбиниpoвaнная каналопромывочная машина</a>
                                    </div>
                                    <ul>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-azs-avtomojki.html">Комбинированная каналопромывочная машина для АЗС и автомоек</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-chastnyj-sektor.html">Комбинированная каналопромывочная машина для частного сектора</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-dorozhnaya-infrastruktura.html">Комбинированная каналопромывочная машина для дорожной инфраструктуры</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-kommunalnoe-hozyajstvo.html">Комбинированная каналопромывочная машина для коммунального хозяйства</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-promyshlennye-predpriyatiya.html">Комбинированная каналопромывочная машина для промышленных предприятий</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-stroitelstvo-i-remont-setej.html">Комбинированная каналопромывочная машина для строительства и ремонта сетей</a></li>
                                    </ul>
                                </div>
                            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="11" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/polivomoechnaya-mashina-kdm.html">Поливомоечная машина</a>
                                    </div>
                                    <ul>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-dorozhnogo-stroitelstva.html">Аренда поливомоечной машины для дорожного строительства</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-kommunalnogo-hozyajstva.html">Аренда поливомоечной машины для коммунального хозяйства</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-promyshlennyh-i-skladskih-territorij.html">Аренда поливомоечной машины для промышленных и складских территорий</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-stroitelnoj-ploshhadki.html">Аренда поливомоечной машины для строительной площадки</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-zimnego-soderzhaniya-dorog.html">Аренда поливомоечной машины для зимнего содержания дорог</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/spetc-primenenie-polivomoechnoi-mashiny-kdm.html">Спецприменение поливомоечной машины КДМ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="0" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/gidrodinamicheskaya-promyvka-kanalizacii.html">Промывка канализации</a>
                                    </div>
                                    <ul>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-chastnom-dome.html">Промывка канализации в частном доме</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-kvartire.html">Промывка канализации в квартире</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-kottedzhe.html">Промывка канализации в коттедже</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-taunxause.html">Промывка канализации в таунхаусе</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-na-azs.html">Промывка канализации на АЗС</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-na-predpriyatii.html">Промывка канализации на предприятии</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-mnogokvartirnom-dome.html">Промывка канализации в многоквартирном доме</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="1" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/mehanicheskaya-chistka-kanalizacii.html">Прочистка канализации</a>
                                    </div>
                                    <ul>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-chastnom-dome.html">Прочистка канализации в частном доме</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-kvartire.html">Прочистка канализации в квартире</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-kottedzhe.html">Прочистка канализации в коттедже</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-taunhause.html">Прочистка канализации в таунхаусе</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-na-azs.html">Прочистка канализации на АЗС</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-na-predpriyatii.html">Прочистка канализации на предприятии</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-mnogokvartirnom-dome.html">Прочистка канализации в многоквартирном доме</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="2" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/obsledovanie-trub.html">Обследование канализации</a>
                                    </div>
                                    <ul>
                                        <li><a href="/obsledovanie-trub/obsledovanie-kanalizacii-v-chastnom-dome.html">Обследование канализации в частном доме</a></li>
                                        <li><a href="/obsledovanie-trub/obsledovanie-kanalizacii-v-kvartire.html">Обследование канализации в квартире</a></li>
                                        <li><a href="/obsledovanie-trub/obsledovanie-kanalizacii-v-kottedzhe.html">Обследование канализации в коттедже</a></li>
                                        <li><a href="/obsledovanie-trub/obsledovanie-kanalizacii-v-taunhause.html">Обследование канализации в таунхаусе</a></li>
                                        <li><a href="/obsledovanie-trub/obsledovanie-kanalizacii-na-azs.html">Обследование канализации на АЗС</a></li>
                                        <li><a href="/obsledovanie-trub/obsledovanie-kanalizacii-na-predpriyatii.html">Обследование канализации на предприятии</a></li>
                                        <li><a href="/obsledovanie-trub/obsledovanie-livnevoi-kanalizacii.html">Обследование ливневой канализации</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="3" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/otkachka-vygrebnyh-yam.html">Откачка выгребных ям</a>
                                    </div>
                                    <ul>
                                        <li><a href="/otkachka-vygrebnyh-yam/otkachka-vygrebnoj-yamy-v-chastnom-dome.html">Откачка выгребной ямы в частном доме</a></li>
                                        <li><a href="/otkachka-vygrebnyh-yam/otkachka-vygrebnoj-yamy-v-chastnom-sektore.html">Откачка выгребной ямы в частном секторе</a></li>
                                        <li><a href="/otkachka-vygrebnyh-yam/otkachka-vygrebnoj-yamy-v-kottedzhe.html">Откачка выгребной ямы в коттедже</a></li>
                                        <li><a href="/otkachka-vygrebnyh-yam/otkachka-vygrebnoj-yamy-v-taunhause.html">Откачка выгребной ямы в таунхаусе</a></li>
                                        <li><a href="/otkachka-vygrebnyh-yam/otkachka-vygrebnoj-yamy-na-azs.html">Откачка выгребной ямы на АЗС</a></li>
                                        <li><a href="/otkachka-vygrebnyh-yam/otkachka-vygrebnoj-yamy-na-predpriyatii.html">Откачка выгребной ямы на предприятии</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="4" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/obsluzhivanie-kns.html">Обслуживание КНС</a>
                                    </div>
                                    <ul>
                                        <li><a href="/obsluzhivanie-kns/obsluzhivanie-kns-i-los-dlya-kottedzhnykh-poselkov.html">Обслуживание КНС для коттеджных поселков</a></li>
                                        <li><a href="/obsluzhivanie-kns/obsluzhivanie-kns-i-los-dlya-promyshlennykh-predpriyatij.html">Обслуживание КНС для промышленных предприятий</a></li>
                                        <li><a href="/obsluzhivanie-kns/obsluzhivanie-kns-i-los-dlya-selskogo-khozyajstva.html">Обслуживание КНС для сельского хозяйства</a></li>
                                        <li><a href="/obsluzhivanie-kns/obsluzhivanie-kns-i-los-dlya-tc-otelej-restoranov.html">Обслуживание КНС для ТЦ, отелей, ресторанов</a></li>
                                        <li><a href="/obsluzhivanie-kns/obsluzhivanie-kns-i-los-dlya-zhkh.html">Обслуживание КНС для ЖКХ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="5" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/uslugi-assenizatora.html">Услуги ассенизатора</a>
                                    </div>
                                    <ul>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-v-chastnom-dome.html">Услуги ассенизатора в частном доме</a></li>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-v-chastnom-sektore.html">Услуги ассенизатора в частном секторе</a></li>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-v-kottedzhe.html">Услуги ассенизатора в коттедже</a></li>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-v-taunhause.html">Услуги ассенизатора в таунхаусе</a></li>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-na-azs.html">Услуги ассенизатора на АЗС</a></li>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-na-predpriyatii.html">Услуги ассенизатора на предприятии</a></li>
                                        <li><a href="/uslugi-assenizatora/uslugi-assenizatora-v-mnogokvartirnom-dome.html">Услуги ассенизатора в многоквартирном доме</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="6" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/razmorozka-trub.html">Разморозка труб</a>
                                    </div>
                                    <ul>
                                        <li><a href="/razmorozka-trub/razmorozka-trub-v-chastnom-dome.html">Разморозка труб в частном доме</a></li>
                                        <li><a href="/razmorozka-trub/razmorozka-trub-v-kottedzhe.html">Разморозка труб в коттедже</a></li>
                                        <li><a href="/razmorozka-trub/razmorozka-trub-v-taunhause.html">Разморозка труб в таунхаусе</a></li>
                                        <li><a href="/razmorozka-trub/razmorozka-trub-na-predpriyatii.html">Разморозка труб на предприятии</a></li>
                                        <li><a href="/razmorozka-trub/razmorozka-trub-na-stroyke.html">Разморозка труб на стройке</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="7" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/otkachka-avtomoek.html">Очистка автомоек</a>
                                    </div>
                                    <ul>
                                        <li><a href="javascript:void(0)">Очистка автомоек самообслуживания</a></li>
                                        <li><a href="javascript:void(0)">Очистка автоматизированных автомоек</a></li>
                                        <li><a href="javascript:void(0)">Очистка портальных автомоек</a></li>
                                        <li><a href="javascript:void(0)">Очистка конвейерных автомоек</a></li>
                                        <li><a href="javascript:void(0)">Очистка детейлинг центров</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="8" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/uslugi-ilososa.html">Услуги илососа</a>
                                    </div>
                                    <ul>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-v-chastnom-dome.html">Услуги илососа в частном доме</a></li>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-v-chastnom-sektore.html">Услуги илососа в частном секторе</a></li>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-v-kottedzhe.html">Услуги илососа в коттедже</a></li>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-v-taunxause.html">Услуги илососа в таунхаусе</a></li>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-na-azs.html">Услуги илососа на АЗС</a></li>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-na-predpriyatii.html">Услуги илососа на предприятии</a></li>
                                        <li><a href="/uslugi-ilososa/uslugi-ilososa-v-mnogokvartirnom-dome.html">Услуги илососа в многоквартирном доме</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="9" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/parogenerator.html">Аренда парогенератора</a>
                                    </div>
                                    <ul>
                                        <li><a href="/parogenerator/proparka-avtotsistern.html">Пропарка автоцистерн</a></li>
                                        <li><a href="/parogenerator/proparka-benzovozov.html">Пропарка бензовозов</a></li>
                                        <li><a href="/parogenerator/proparka-fundamenta.html">Пропарка фундамента</a></li>
                                        <li><a href="/parogenerator/proparka-oborudovaniya.html">Пропарка оборудования</a></li>
                                        <li><a href="/parogenerator/proparka-truboprovodov.html">Пропарка трубопроводов</a></li>
                                        <li><a href="/parogenerator/razmorozka-kanalizacii-parom.html">Разморозка канализации паром</a></li>
                                        <li><a href="/parogenerator/razmorozka-otopleniya-otogrev-trub.html">Разморозка отопления, отогрев труб</a></li>
                                        <li><a href="/parogenerator/razmorozka-trub-parom.html">Разморозка труб паром</a></li>
                                        <li><a href="/parogenerator/udalenie-bituma-parogeneratorom.html">Удаление битума парогенератором</a></li>
                                        <li><a href="/parogenerator/udalenie-snega-i-lda-parogeneratorom.html">Удаление снега и льда парогенератором</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="10" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/kombinirovannaya-kanalopromyvochnaya-mashina.html">Кoмбиниpoвaнная каналопромывочная машина</a>
                                    </div>
                                    <ul>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-azs-avtomojki.html">Комбинированная каналопромывочная машина для АЗС и автомоек</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-chastnyj-sektor.html">Комбинированная каналопромывочная машина для частного сектора</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-dorozhnaya-infrastruktura.html">Комбинированная каналопромывочная машина для дорожной инфраструктуры</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-kommunalnoe-hozyajstvo.html">Комбинированная каналопромывочная машина для коммунального хозяйства</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-promyshlennye-predpriyatiya.html">Комбинированная каналопромывочная машина для промышленных предприятий</a></li>
                                        <li><a href="/kombinirovannaya-kanalopromyvochnaya-mashina/kombinirovannaya-kanalopromyvochnaya-mashina-stroitelstvo-i-remont-setej.html">Комбинированная каналопромывочная машина для строительства и ремонта сетей</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="11" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/polivomoechnaya-mashina-kdm.html">Поливомоечная машина</a>
                                    </div>
                                    <ul>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-dorozhnogo-stroitelstva.html">Аренда поливомоечной машины для дорожного строительства</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-kommunalnogo-hozyajstva.html">Аренда поливомоечной машины для коммунального хозяйства</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-promyshlennyh-i-skladskih-territorij.html">Аренда поливомоечной машины для промышленных и складских территорий</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-stroitelnoj-ploshhadki.html">Аренда поливомоечной машины для строительной площадки</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/arenda-polivomoechnoi-mashiny-dlya-zimnego-soderzhaniya-dorog.html">Аренда поливомоечной машины для зимнего содержания дорог</a></li>
                                        <li><a href="/polivomoechnaya-mashina-kdm/spetc-primenenie-polivomoechnoi-mashiny-kdm.html">Спецприменение поливомоечной машины КДМ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/gidrodinamicheskaya-promyvka-kanalizacii.html">Промывка канализации</a>
                                    </div>
                                    <ul>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-chastnom-dome.html">Промывка канализации в частном доме</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-kvartire.html">Промывка канализации в квартире</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-kottedzhe.html">Промывка канализации в коттедже</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-taunxause.html">Промывка канализации в таунхаусе</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-na-azs.html">Промывка канализации на АЗС</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-na-predpriyatii.html">Промывка канализации на предприятии</a></li>
                                        <li><a href="/gidrodinamicheskaya-promyvka-kanalizacii/promyvka-kanalizacii-v-mnogokvartirnom-dome.html">Промывка канализации в многоквартирном доме</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1" style="width: 287.5px; margin-right: 15px;">
                                <div class="service__nav">
                                    <div class="service__title">
                                        <a href="/mehanicheskaya-chistka-kanalizacii.html">Прочистка канализации</a>
                                    </div>
                                    <ul>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-chastnom-dome.html">Прочистка канализации в частном доме</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-kvartire.html">Прочистка канализации в квартире</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-kottedzhe.html">Прочистка канализации в коттедже</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-taunhause.html">Прочистка канализации в таунхаусе</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-na-azs.html">Прочистка канализации на АЗС</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-na-predpriyatii.html">Прочистка канализации на предприятии</a></li>
                                        <li><a href="/mehanicheskaya-chistka-kanalizacii/elektromehanicheskaya-prochistka-kanalizacii-v-mnogokvartirnom-dome.html">Прочистка канализации в многоквартирном доме</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    <div class="swiper-button-next service-slider-btn" tabindex="0" role="button" aria-label="Next slide">
                        <img src="/images/icons/arrow.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="serves-map">
    <div class="container">
        <h3>Область нашей деятельности</h3>
        <div class="serves-map-inner">
            <img src="images/mapserv.jpg" alt="">
        </div>
        <div class="serves-map-content-box">
            <div class="serves-map-content">
                Агрыз, Арск, Бавлы. Заинск, Болгар, Азнакаево, Нижнекамск, Бугульма, Елабуга, Менделеевск, Буинск, Мензелинск, Альметьевск, Сарманово,
                Заинск, Чистополь, Зеленодольск, Бугульма, Иннополис, Кукмор, Лаишево, Лениногорск, Мамадыш, Мензелинск.
            </div>
            <div class="serves-map-contacts">
                <a class="" href="tel:<?php echo '+'.preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" title="контактный телефон"><span class="icon-phone"></span><?php echo \Yii::app()->getModule('yupe')->companyPhone; ?></a>
                <strong>Круглосуточно</strong>
                <div class="btn-serves-map">
                    <a class="btn-wh-serves-page" href="whatsapp://send?phone=<?php echo preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="serves-seo">
        <div class="container">
            <div class="serves-content block-flex">
                <div class="serves-content-seo">
                    <?php echo $model->text_6; ?>
                </div>
                <div class="serves-content-images">
                    <div class="ring-box-serves-content">
                        <div class="ring-box-logo">
                            <img src="images/logo.webp" alt="Logo zasorunet">
                            <div class="header-logo-description">
                                <?php echo $model->title; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="serves-content serves-content-seo">
                <?php echo $model->text_7; ?>
            </div>
        </div>
    </div>

<?php if ($allServices) { ?>
    <div class="list-serves-page-serves">
        <div class="container">
            <ul>
                <?php foreach ($allServices as $service) { ?>
                    <li>
                        <div class="heading-serves">
                            <h3><?php echo $service->title;?></h3>
                        </div>

                        <div class="description-serves">
                            <?php echo $service->preamble?>
                        </div>
                        <div class="list-serves-page-serves-box">
                            <div class="images-serves">
                                <img src="<?= $service->getImageUrl(500, 500, true); ?>" alt="<?php echo $service->title;?>">
                            </div>
                            <div class="btn-serves">
                                <a href="/<?php echo $service->slug; ?>">Подробнее</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>
<div class="vopros-section">
    <div class="container">
        <div class="question">
            Остались вопросы ?
            <span>Спросите <img src="/images/24_7.webp" alt=""> <a href="tel:<?php echo '+'.preg_replace('/\D+/', '', \Yii::app()->getModule('yupe')->companyPhone); ?>" title="контактный телефон"><?php echo \Yii::app()->getModule('yupe')->companyPhone; ?></a></span>
        </div>
    </div>
</div>

<?php /* ?>
<div class="service">

    <div class="service__article">

        <?php $this->widget(
            'page.widgets.DeepMenuWidget',
            ['id' => $model->id]
        ); ?>

        <div class="service__text slide-right">
            <?= $model->full_text ?>
        </div>
    </div>

    <?php if ($model->one_gallery_id && Yii::app()->hasModule('gallery')) : ?>

        <?php $this->widget(
            'gallery.widgets.GalleryWidget',
            [
                'galleryId' => $model->one_gallery_id,
                'limit' => 1000,
                'view' => 'service'
            ]
        ); ?>

    <?php endif; ?>

    <div class="caption caption-logo">
        <div class="caption__text slide-left">
            <?= $model->text_3 ?>
        </div>
        <div class="caption__img">
            <img src="/web/img/service/2.png" alt="">
        </div>
    </div>

    <?php $this->widget(
        'page.widgets.AllPageWidget'
    ); ?>

    <div class="caption caption-logo">
        <div class="caption__text slide-left">
            <?= $model->text_4 ?>

        </div>
        <div class="caption__img">
            <img src="/web/img/service/2.png" alt="">
        </div>
    </div>
    <?php if ($model->one_gallery_id && Yii::app()->hasModule('gallery')) : ?>

        <?php $this->widget(
            'gallery.widgets.GalleryWidget',
            [
                'galleryId' => $model->two_gallery_id,
                'limit' => 1000,
                'view' => 'service'
            ]
        ); ?>

    <?php endif; ?>
    <div class="footing">
        <div class="footing__text slide-left">
            <?= $model->text_5 ?>
        </div>
        <div class="footing__info slide-right">

            <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
                ?>
                <a href="tel:<?= $cleanPhone ?>"
                   class="footing__tel"><?= Yii::app()->getModule('yupe')->companySpanPhone ?></a>
            <?php } ?>

            <div class="heading__item">
                <span class="icon icon-clock">
                </span>
                <p>
                    <?php if (Yii::app()->getModule('yupe')->companyWorkTime) { ?>
                        <?= Yii::app()->getModule('yupe')->companyWorkTime ?>
                    <?php } ?>
                    <?php if (Yii::app()->getModule('yupe')->companyEmail) { ?>
                        <a href="mailto:<?= Yii::app()->getModule('yupe')->companyEmail ?>" target="_blank">
                            <?= Yii::app()->getModule('yupe')->companyEmail ?>
                        </a>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
    <div class="map-yandex">
        <div style="width:760px;height:500px;overflow:hidden;position:relative;margin: 0 auto;">
            <iframe style="width:100%;max-width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/1073138182?comments"></iframe>
            <a href="https://yandex.ru/maps/org/galereya_stilya/1073138182/" target="_blank" style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Галерея стиля — Яндекс Карты</a>
        </div>
    </div>
</div>
<?php */ ?>