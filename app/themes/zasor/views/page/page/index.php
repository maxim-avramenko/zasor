<?php

$this->title = Yii::app()->getModule('page')->metaTitle;
$this->description = Yii::app()->getModule('page')->metaDescription;
$this->keywords = Yii::app()->getModule('page')->metaKeywords;

$this->canonical = Yii::app()->createAbsoluteUrl('/page/page/index');
$this->breadcrumbs = [Yii::t('PageModule.page', 'Услуги')];

$this->pageH1 = 'Услуги';

?>
<div class="page services">
    <div class="caption caption-service">
        <div class="caption__text slide-left">
            <?php if (Yii::app()->hasModule('contentblock')): ?>
                <?php $this->widget(
                    'application.modules.contentblock.widgets.ContentBlockWidget',
                    ['code' => 'top_services_text']
                ); ?>
            <?php endif; ?>
        </div>
        <div data-fancybox="pic" class="caption__img">
            <img src="/web/img/about/1.png" alt="">
        </div>
    </div>

    <div class="page__wp services__wp">
        <?php
        $data = $dataProvider->getData();

        $itemCount = count($data);
        $i = 0;

        foreach ($data as $item) { ?>

            <?php if (count($data) != $i + 1) { ?>

                <div class="page__item services__item">
                     <a href="<?= Yii::app()->createUrl('page/page/view', ['slug' => $item->slug]) ?>">
                    <div class="service__nav">
                        <div class="service__title">
                            <?= $item->title ?>
                        </div>

                        <?php $this->widget(
                            'page.widgets.SubPageWidget',
                            ['id' => $item->id]
                        ); ?>

                    </div>
                </div>
            <?php } else { ?>
              <div class="page__item page__item-link services__item services__item-link">
                    <a href="<?= Yii::app()->createUrl('page/page/view', ['slug' => $item->slug]) ?>"
                       class="page__link">
                    <span class="service__title">
                        <?=  $item->title ?>
                    </span>
                        <span class="page__block services__block">
                    </span>
                    </a>
                </div>
                <div class="page__item services__item">
                    <a href="<?= Yii::app()->createUrl('page/page/view', ['slug' => $item->slug]) ?>">
                    <div class="service__nav">
                        <div class="service__title">
                            <?= $item->title ?>
                        </div>

                        <?php $this->widget(
                            'page.widgets.SubPageWidget',
                            ['id' => $item->id]
                        ); ?>

                    </div>
                </div>

            <?php }
            $i++;
        } ?>
    </div>

    <div class="start start-note slide-up">
        <a href="#modal" data-fancybox class="start__wp">
              <span class="start__note">
                Есть идея ?
            </span>
            <span class="start__icon">
                <img src="/web/img/icons/lamp.png" alt="">
            </span>
            <span class="icon-arrow-right"></span>
            <span class="start__text">
          Давайте поговорим
            </span>
        </a>
    </div>
    <div class="footing">
        <div class="footing__text slide-left">
            <?php if (Yii::app()->hasModule('contentblock')): ?>
                <?php $this->widget(
                    'application.modules.contentblock.widgets.ContentBlockWidget',
                    ['code' => 'bottom_services_text']
                ); ?>
            <?php endif; ?>
        </div>
        <div class="footing__info slide-right">
            <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
                ?>
                <a href="tel:<?= $cleanPhone ?>"
                   class="footing__tel"><?= Yii::app()->getModule('yupe')->companySpanPhone ?></a>
            <?php } ?>
            <div class="heading__item">
                <span class="icon icon-clock">
                </span>
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