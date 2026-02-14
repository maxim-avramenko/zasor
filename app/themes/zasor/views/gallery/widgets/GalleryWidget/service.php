<?php if ($dataProvider->itemCount): ?>
    <div class="about__gallery slide-up">
        <?php foreach ($dataProvider->getData() as $data): ?>


            <a href="<?= $data->image->getImageUrl() ?>" data-fancybox="gallery" class="about__pic">
                <img src="<?= $data->image->getImageUrl(490, 245, true) ?>"/>
            </a>

        <?php endforeach; ?>
    </div>
<?php endif; ?>

