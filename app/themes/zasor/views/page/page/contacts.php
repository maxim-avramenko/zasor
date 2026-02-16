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