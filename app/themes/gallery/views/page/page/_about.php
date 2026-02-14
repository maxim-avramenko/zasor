<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
//    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;

$this->canonical = Yii::app()->createAbsoluteUrl('/page/page/view', ['slug' => $model->slug]);;

$this->pageH1 = $model->title;

$this->breadcrumbs = [Yii::t('PageModule.page', $model->title)];

?>

<div class="about">
    <div class="caption">
        <div class="caption__text slide-left">
            <?= $model->preamble ?>
        </div>
        <div class="caption__img slide-right">
            <img src="<?= $model->getImageUrl(500, 250, true); ?>" alt="<?= $model->title ?>">
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


    <article class="about__article slide-up">
        <?= $model->full_text ?>
    </article>
    <div class="start slide-up">
        <a href="#modal" data-fancybox=""  class="start__wp">
                    <span class="start__icon">
                        <img src="img/icons/lamp.png" alt="">
                    </span>
            <span class="icon-arrow-right"></span>
            <span class="start__text">
                        Начать проект
                        </span>
        </a>


    </div>
    <div class="footing">
        <div class="footing__text  slide-left">
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


