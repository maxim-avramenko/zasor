<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;

$this->canonical = Yii::app()->createAbsoluteUrl('/page/page/view', ['slug' => $model->slug]);

$this->pageH1 = $model->title;

$this->breadcrumbs = [Yii::t('PageModule.page', $model->title)];

?>
<div class="page-contacts">
    <div class="container">
        <div class="contacts">
            <h1><?php echo CHtml::encode($model->title);?></h1>
            <div class="contacts-block">
                <?php if (!empty($yupe->companyWorkTime)): ?><img src="/images/24_7.webp" alt="<?= CHtml::encode($yupe->companyWorkTime) ?>"><?php endif; ?>
                <?php if (!empty($yupe->companyPostalCode) || !empty($yupe->companyCountry) || !empty($yupe->companyCity) || !empty($yupe->companyStreet)): ?>
                    <div class="contacts-adres">
                        <span class="icon-location"></span>
                        <?php
                        $addrParts = array_filter([
                                $yupe->companyPostalCode,
                                $yupe->companyCountry,
                                $yupe->companyRegion,
                                $yupe->companyCity,
                                $yupe->companyStreet,
                                $yupe->companyOffice,
                        ]);
                        echo nl2br(CHtml::encode(implode(' ', $addrParts)));
                        ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<div class="portfolio">
    <div class="container">
    <div class="footing">
        <div class="footing__text  slide-left">
            <p>
                <?= $this->decodeWidgets($model->full_text); ?>
            </p>
        </div>
    </div>
    </div>
</div>