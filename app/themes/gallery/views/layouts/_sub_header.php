<div class="heading slide-up">
    <h1><?= $this->pageH1 ?></h1>
    <div class="heading__items">
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
        <div class="heading__item">
                <span class="icon icon-map">
                </span>
            <p>
                <?= Yii::app()->getModule('yupe')->companyCountry ?>,
                <?= Yii::app()->getModule('yupe')->companyRegion ?>,
                <?= Yii::app()->getModule('yupe')->companyCity ?>,
                <?= Yii::app()->getModule('yupe')->companyStreet ?>,
                <?= Yii::app()->getModule('yupe')->companyOffice ?>
            </p>
        </div>
    </div>
    <div class="heading__contacts">
        <?php if (Yii::app()->getModule('yupe')->companyPhone) {
            $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
            ?>
            <a href="tel:<?= $cleanPhone ?>" class="heading__tel"><span class="icon-phone">
                        </span> <?= Yii::app()->getModule('yupe')->companyPhone ?></a>
        <?php } ?>

        <div class="socials">
            <?php if (Yii::app()->getModule('yupe')->companyEmail) { ?>
                <a href="mailto:<?= Yii::app()->getModule('yupe')->companyEmail ?>" target="_blank">
                    <span class="icon-mail4"></span>
                </a>
            <?php } ?>

            <?php if (Yii::app()->getModule('yupe')->companyInstagramm) { ?>
                <a href="<?= Yii::app()->getModule('yupe')->companyInstagramm ?>" target="_blank">
                    <span class="icon-instagram"></span>
                </a>
            <?php } ?>

            <?php if (Yii::app()->getModule('yupe')->companyVk) { ?>
                <a href="<?= Yii::app()->getModule('yupe')->companyVk ?>" target="_blank">
                    <span class="icon-vk"></span>
                </a>
            <?php } ?>

            <?php if (Yii::app()->getModule('yupe')->companyYoutube) { ?>
                <a href="<?= Yii::app()->getModule('yupe')->companyYoutube ?>" target="_blank">
                    <span class="icon-youtube"></span>
                </a>
            <?php } ?>
        </div>
    </div>
</div>