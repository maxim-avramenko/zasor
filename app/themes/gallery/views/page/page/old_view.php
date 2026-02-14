<?php
/**
 * @var $this PageController
 * @var $model Page
 **/
?>

<?php

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description;
$this->keywords = $model->meta_keywords;

$this->canonical = Yii::app()->createAbsoluteUrl('page/page/view', ['slug' => $model->slug]);

$this->layout = "//layouts/yupe_svc";

?>

<?php

$this->breadcrumbs = array_merge(
    [Yii::t("PageModule.page", 'Услуги') => ['/page/page/index']],
    $model->parent ? $model->getBreadcrumbs(false) : $model->getBreadcrumbs(false)
);

?>
<div class="service">
    <h1><?= $model->title ?></h1>
    <div class="caption caption-service">
        <div class="caption__text slide-left">
            <?= $model->preamble ?>
        </div>
        <div class="caption__img">
            <img src="<?= $model->getImageUrl(500, 250, true); ?>" alt="<?= $model->title ?>">
        </div>
    </div>
    <div class="heading heading-service slide-up">
        <div class="heading__items">
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
            <div class="heading__item">
                <span class="icon icon-map">
                </span>
                <p>
                    <?= Yii::app()->getModule('yupe')->companyCountry ?>,
                    <?= Yii::app()->getModule('yupe')->companyRegion ?>,
                    <?= Yii::app()->getModule('yupe')->companyCity ?>,
                    <?= Yii::app()->getModule('yupe')->companyStreet ?>,
                    <?= Yii::app()->getModule('yupe')->companyOffice ?>
                </p>
            </div>
        </div>
        <div class="heading__contacts">

            <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
                ?>
                <a href="tel:<?= $cleanPhone ?>" class="heading__tel"> <span class="icon-phone">
                        </span><?= Yii::app()->getModule('yupe')->companyPhone ?></a>
            <?php } ?>

            <div class="socials">
                <?php if (Yii::app()->getModule('yupe')->companyEmail) { ?>
                    <a href="mailto:<?= Yii::app()->getModule('yupe')->companyEmail ?>" target="_blank">
                        <span class="icon-envelope"></span>
                    </a>
                <?php } ?>

                <?php if (Yii::app()->getModule('yupe')->companyInstagramm) { ?>
                    <a href="<?= Yii::app()->getModule('yupe')->companyInstagramm ?>" target="_blank">
                        <span class="icon-instagram"></span>
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
        <a href="#modal" data-fancybox class="heading__callback">
            Заказать звонок
        </a>
    </div>

    <div class="service__article">

        <?php $this->widget(
            'page.widgets.ParentPageWidget',
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