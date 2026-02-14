<div class="service__list slide-up">
    <div class="title title-line">
        Наши услуги
    </div>
    <div class="service__slider">
        <div class="service-slider">
            <div class="swiper-wrapper">

                <?php foreach ($models as $model) { ?>
                    <div class="swiper-slide">
                        <div class="service__nav">
                            <div class="service__title">
                                <?= $model->title ?>
                            </div>

                            <?php $this->widget(
                                'page.widgets.SubPageWidget',
                                ['id' => $model->id]
                            ); ?>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
        <div class="swiper-button-next service-slider-btn">
            <img src="/web/img/icons/arrow.png" alt="">
        </div>
    </div>
</div>