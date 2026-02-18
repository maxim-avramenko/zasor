<?php
/** @var $dataProvider CActiveDataProvider */
if ($dataProvider->itemCount > 0) { ?>
<div class="gallery gallery-serves-page">
    <div class="container">
        <div class="about__gallery">
            <?php foreach ($dataProvider->items as $item) { ?>
                <a href="<?= Yii::app()->createUrl(
                    '/gallery/gallery/image',
                    ['id' => $item->image->id]); ?>" data-fancybox="gallery" class="about__pic">
                    <img src="<?= Yii::app()->createUrl(
                        '/gallery/gallery/image',
                        ['id' => $item->image->id]); ?>" alt="">
                </a>
            <?php }?>
        </div>
    </div>
</div>
<?php } ?>