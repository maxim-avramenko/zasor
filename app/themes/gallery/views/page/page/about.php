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
</div>