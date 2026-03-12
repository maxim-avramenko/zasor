<?php
/** @var $dataProvider CActiveDataProvider */
if ($dataProvider->itemCount > 0) { ?>
    <div class="gallery">
        <div class="container">
            <div class="about__gallery">
                <?php foreach ($dataProvider->getData() as $item) { ?>
                    <a href="<?= $item->image->getImageUrl(); ?>" data-fancybox="gallery" class="about__pic">
                        <img src="<?= $item->image->getImageUrl(490, 245, true) ?>"/>

                    </a>
                <?php }?>
            </div>
        </div>
    </div>
<?php } ?>
