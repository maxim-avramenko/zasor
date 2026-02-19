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

$this->breadcrumbs = [
    'Главная' => ['/site/index'],
    'Услуги' => ['/page/page/index']
];

if ($model->parent) {
    $parent = $model->parent; // Дизайн логотипа
    
    // Если у родителя есть свой родитель (Дизайн), добавляем его
    if ($parent->parent) {
        $this->breadcrumbs[$parent->parent->title] = ['/page/page/view', 'slug' => $parent->parent->slug];
    }
    
    // Добавляем родителя (Дизайн логотипа)
    $this->breadcrumbs[$parent->title] = ['/page/page/view', 'slug' => $parent->slug];
}

// Добавляем текущую страницу
$this->breadcrumbs[] = $model->title;

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
                    <img src="<?= $model->getImageUrl(500, 500, true); ?>" alt="<?= $model->title ?>">
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
                                <img src="<?= $service->getImageUrl(300, 200, true); ?>" alt="<?php echo $service->title;?>">
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