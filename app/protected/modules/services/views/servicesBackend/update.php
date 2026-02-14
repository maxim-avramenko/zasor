<?php
$this->breadcrumbs = [
    Yii::t('ServicesModule.services', 'Services') => ['/services/servicesBackend/index'],
    $model->title => ['/services/servicesBackend/view', 'id' => $model->id],
    Yii::t('ServicesModule.services', 'Edit'),
];

$this->pageTitle = Yii::t('ServicesModule.services', 'Services - edit');

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
    ['label' => Yii::t('ServicesModule.services', 'Services Article') . ' «' . mb_substr($model->title, 0, 32) . '»'],
    [
        'icon' => 'fa fa-fw fa-pencil',
        'label' => Yii::t('ServicesModule.services', 'Edit services'),
        'url' => [
            '/services/servicesBackend/update/',
            'id' => $model->id,
        ],
    ],
    [
        'icon' => 'fa fa-fw fa-eye',
        'label' => Yii::t('ServicesModule.services', 'View services article'),
        'url' => [
            '/services/servicesBackend/view',
            'id' => $model->id,
        ],
    ],
    [
        'icon' => 'fa fa-fw fa-trash-o',
        'label' => Yii::t('ServicesModule.services', 'Removing services'),
        'url' => '#',
        'linkOptions' => [
            'submit' => ['/services/servicesBackend/delete', 'id' => $model->id],
            'params' => [Yii::app()->getRequest()->csrfTokenName => Yii::app()->getRequest()->csrfToken],
            'confirm' => Yii::t('ServicesModule.services', 'Do you really want to remove the article?'),
            'csrf' => true,
        ],
    ],
];
?>
<div class="page-header">
    <h1>
        <?= Yii::t('ServicesModule.services', 'Edit services article'); ?><br/>
        <small>&laquo;<?= $model->title; ?>&raquo;</small>
    </h1>
</div>

<?= $this->renderPartial(
    '_form',
    ['model' => $model, 'languages' => $languages, 'langModels' => $langModels, 'galleryList' => $galleryList]
); ?>
