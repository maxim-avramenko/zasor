<?php
$this->breadcrumbs = [
    Yii::t('ServicesModule.services', 'Services') => ['/services/servicesBackend/index'],
    Yii::t('ServicesModule.services', 'Create'),
];

$this->pageTitle = Yii::t('ServicesModule.services', 'Services - create');

$this->menu = [
    [
        'icon' => 'fa fa-fw fa-list-alt',
        'label' => Yii::t('ServicesModule.services', 'Services management'),
        'url' => ['/services/servicesBackend/index'],
    ],
    [
        'icon' => 'fa fa-fw fa-plus-square',
        'label' => Yii::t('ServicesModule.services', 'Create services'),
        'url' => ['/services/servicesBackend/create'],
    ],
];
?>
<div class="page-header">
    <h1>
        <?= Yii::t('ServicesModule.services', 'Services'); ?>
        <small><?= Yii::t('ServicesModule.services', 'create'); ?></small>
    </h1>
</div>

<?= $this->renderPartial('_form', ['model' => $model, 'languages' => $languages, 'galleryList' => $galleryList]); ?>
