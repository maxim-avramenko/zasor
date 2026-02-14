<?php
/**
 * @var $this GalleryController
 * @var $model Gallery
 */

$this->title = Yii::t('GalleryModule.gallery', 'Gallery');

$this->breadcrumbs = [
    $model->name
];
?>

<div class="portfolio">
    <div class="portfolio__block">

        <?php $this->widget(
            'gallery.widgets.GalleryWidget',
            ['galleryId' => 1,
                'view' => 'doc','limit'=>9]
        ); ?>

    </div>
    <div class="footing">
        <div class="footing__text  slide-left">
            <h2>
                <?= CHtml::encode($model->name); ?>
            </h2>
            <p>
                <?= $model->description; ?>
            </p>
        </div>
        <div class="footing__info slide-right">

            <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
                ?>
                <a href="tel:<?= $cleanPhone ?>" class="footing__tel"><?= Yii::app()->getModule('yupe')->companySpanPhone ?></a>
            <?php } ?>
            <div class="heading__item">
                <span class="icon icon-clock"></span>
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