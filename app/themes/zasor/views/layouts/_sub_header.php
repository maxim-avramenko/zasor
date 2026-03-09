<?php $yupe = Yii::app()->getModule('yupe'); ?>
<div class="heading slide-up">
    <h1><?= $this->pageH1 ?></h1>
    <div class="heading__items">
        <?php if (!empty($yupe->companyWorkTime) || !empty($yupe->companyEmail)): ?>
        <div class="heading__item">
                <span class="icon icon-clock">
                </span>
            <p>
                <?php if (!empty($yupe->companyWorkTime)): ?>
                    <?= CHtml::encode($yupe->companyWorkTime) ?>
                <?php endif; ?>
                <?php if (!empty($yupe->companyEmail)): ?>
                    <a href="mailto:<?= CHtml::encode($yupe->companyEmail) ?>" target="_blank">
                        <?= CHtml::encode($yupe->companyEmail) ?>
                    </a>
                <?php endif; ?>
            </p>
        </div>
        <?php endif; ?>
        <?php if (!empty($yupe->companyCountry) || !empty($yupe->companyRegion) || !empty($yupe->companyCity) || !empty($yupe->companyStreet) || !empty($yupe->companyOffice)): ?>
        <div class="heading__item">
                <span class="icon icon-map">
                </span>
            <p>
                <?php
                $addrParts = array_filter([
                    $yupe->companyCountry,
                    $yupe->companyRegion,
                    $yupe->companyCity,
                    $yupe->companyStreet,
                    $yupe->companyOffice,
                ]);
                echo CHtml::encode(implode(', ', $addrParts));
                ?>
            </p>
        </div>
        <?php endif; ?>
    </div>
    <div class="heading__contacts">
        <?php if (!empty($yupe->companyPhone)): ?>
            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyPhone) ?>" class="heading__tel"><span class="icon-phone"></span> <?= CHtml::encode($yupe->companyPhone) ?></a>
        <?php endif; ?>

        <?php
        $hasSocial = !empty($yupe->companyEmail) || !empty($yupe->companyInstagramm) || !empty($yupe->companyVk) || !empty($yupe->companyYoutube) || !empty($yupe->companyTelegram) || !empty($yupe->companyIMO);
        if ($hasSocial):
        ?>
        <div class="socials">
            <?php if (!empty($yupe->companyEmail)): ?>
                <a href="mailto:<?= CHtml::encode($yupe->companyEmail) ?>" target="_blank">
                    <span class="icon-mail4"></span>
                </a>
            <?php endif; ?>

            <?php if (!empty($yupe->companyInstagramm)): ?>
                <a href="<?= CHtml::encode($yupe->companyInstagramm) ?>" target="_blank" rel="nofollow">
                    <span class="icon-instagram"></span>
                </a>
            <?php endif; ?>

            <?php if (!empty($yupe->companyVk)): ?>
                <a href="<?= CHtml::encode($yupe->companyVk) ?>" target="_blank" rel="nofollow">
                    <span class="icon-vk"></span>
                </a>
            <?php endif; ?>

            <?php if (!empty($yupe->companyYoutube)): ?>
                <a href="<?= CHtml::encode($yupe->companyYoutube) ?>" target="_blank" rel="nofollow">
                    <span class="icon-youtube"></span>
                </a>
            <?php endif; ?>

            <?php if (!empty($yupe->companyTelegram)): ?>
                <a href="<?= CHtml::encode($yupe->companyTelegram) ?>" target="_blank" rel="nofollow">
                    <span class="icon-telegram"></span>
                </a>
            <?php endif; ?>

            <?php if (!empty($yupe->companyIMO)): ?>
                <a href="<?= CHtml::encode($yupe->companyIMO) ?>" target="_blank" rel="nofollow">
                    <span class="icon-imo"></span>
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>