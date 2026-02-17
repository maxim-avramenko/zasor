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
<div class="about-us">
    <div class="container">
        <div class="about-us-block">
            <div class="col">
                <?php echo $model->short_text; ?>
            </div>
            <div class="col">
                <!-- <img src="images/about-us.png" alt="about-us"> -->
                <img src="/images/uslugi/o-nas/2.webp" alt="about-us">
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
<div class="content-about-us">
    <div class="container">
        <?php echo $model->full_text; ?>
    </div>
</div>