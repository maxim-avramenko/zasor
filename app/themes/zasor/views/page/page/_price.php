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

$this->schema = $model->json_head;

?>
<div class="price-page">
    <div class="container">
        <div class="price">
            <div class="col">
                <h1><?php echo $model->title; ?></h1>
                <?php echo $model->short_text; ?>
            </div>
        </div>
    </div>
</div>
<?php $this->widget(
        'gallery.widgets.GalleryWidget',
        [
            'galleryId' => $model->one_gallery_id,
            'view' => 'about_us', 'limit' => 3
        ]
); ?>
<div class="price-block">
    <div class="container">
        <?php echo $model->full_text; ?>
    </div>
</div>