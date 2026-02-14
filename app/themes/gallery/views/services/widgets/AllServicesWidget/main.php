<div class="services-block__wp">
    <div class="services-block__list slide-left">

        <?php foreach ($models as $model) {
            $url = Yii::app()->createUrl('services/services/view', ['slug' => $model->slug]);

            ?>
            <div class="services-block__item">
                <div class="services-block__subtitle"><?= $model->title ?></div>
                <div class="services-block__img">
                    <img src="<?= $model->getImageUrl(365, 142, false) ?>" alt="">
                </div>
                <div class="services-block__text">
                    <a href="<?= $url ?>" class="btn-border">
                        Подробнее
                    </a>
                   <?=$model->short_text?>
                </div>
            </div>

        <?php } ?>


    </div>
    <div class="services-block__article slide-right">

        <?php if (Yii::app()->hasModule('contentblock')): ?>
            <?php $this->widget(
                'application.modules.contentblock.widgets.ContentBlockWidget',
                ['code' =>'services-block__article']
            ); ?>
        <?php endif; ?>

    </div>

</div>
