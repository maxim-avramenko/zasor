<?php
$yupe = Yii::app()->getModule('yupe');

$this->title = $model->meta_title ?: $model->title;
$this->description = $model->meta_description;
$this->keywords = $model->meta_keywords;

$this->canonical = Yii::app()->createAbsoluteUrl('page/page/view', ['slug' => $model->slug]);

$this->layout = "//layouts/yupe";

$this->schema = $model->json_head;
?>

<?php
$breadcrumbs = isset($breadcrumbs) ? $breadcrumbs : [];
$this->breadcrumbs = $breadcrumbs;
?>
<div class="services-page">
    <div class="container">
        <h1><?= CHtml::encode($model->title) ?></h1>
        <div class="services-page-content">
            <?php
            $serviceNavItems = isset($serviceNavItems) ? $serviceNavItems : [];
            foreach ($serviceNavItems as $parentPage) :
                $parentUrl = Yii::app()->createUrl('/page/page/view', ['slug' => $parentPage->slug]);
                $childPages = isset($parentPage->childPages) ? $parentPage->childPages : [];
            ?>
            <div class="box-menu-sp-item">
                <h2><a href="<?= CHtml::encode($parentUrl) ?>" title="<?= CHtml::encode($parentPage->title) ?>"><?= CHtml::encode($parentPage->title) ?></a></h2>
                <ul>
                    <?php foreach ($childPages as $childPage) :
                        $childUrl = Yii::app()->createUrl('/page/page/view', ['slug' => $childPage->slug]);
                    ?>
                    <li><a href="<?= CHtml::encode($childUrl) ?>" title="<?= CHtml::encode($childPage->title) ?>"><?= CHtml::encode($childPage->title) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php if (empty($childPages)): ?>
                <div class="temporarily-say">подразделы в разработке</div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($yupe->companyPhone)): ?>
        <div class="container">
            <div class="btn-work-area-time">
                <div class="btn-work-area-time-item">
                    <a class="btn-wh" href="<?php echo $yupe->companyTelegram;?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span>Написать в Telegram</a>
                    <div class="section-10-block-tel">Остались вопросы ? - <a class="tel-light" href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="serves-content-uslugi">
    <div class="container">
        <div class="serves-content block-flex">
            <div class="serves-content-seo-uslugi">
                <?php echo $model->text_6; ?>
            </div>
           <!-- <div class="serves-content-images">
                <div class="ring-box-serves-content">
                    <?php if (!empty($yupe->logo)): ?>
                        <div class="ring-box-logo">
                            <img src="<?= CHtml::encode($yupe->getLogo()) ?>" alt="<?= CHtml::encode($yupe->siteName) ?>">
                            <div class="header-logo-description">
                                <?= CHtml::encode($model->title) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div> -->
        </div>
        <div class="serves-content serves-content-seo-uslugi7">
            <?php echo $model->text_7; ?>
        </div>
        <div class="serves-content serves-content-seo-uslugi8">
            <?php echo $model->text_8; ?>
        </div>
    </div>
</div>