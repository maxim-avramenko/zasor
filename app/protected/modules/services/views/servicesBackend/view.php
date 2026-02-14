<?php
$this->breadcrumbs = [
    Yii::t('ServicesModule.services', 'Services') => ['/services/servicesBackend/index'],
    $model->title,
];

$this->pageTitle = Yii::t('ServicesModule.services', 'Services - show');

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
            '/services/servicesBackend/update',
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
        'label' => Yii::t('ServicesModule.services', 'Remove services'),
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
        <?= Yii::t('ServicesModule.services', 'Show services article'); ?><br/>
        <small>&laquo;<?= $model->title; ?>&raquo;</small>
    </h1>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a href="#anounce" data-toggle="tab"><?= Yii::t(
                'ServicesModule.services',
                'Short services article example'
            ); ?></a></li>
    <li><a href="#full" data-toggle="tab"><?= Yii::t('ServicesModule.services', 'Full services article example'); ?></a></li>
</ul>
<div class="tab-content">
    <div id="anounce" class="tab-pane fade active in">
        <div style="margin-bottom: 20px;">
            <h6>
                <span class="label label-info"><?= $model->date; ?></span>
                <?= CHtml::link($model->title, ['/services/services/view', 'slug' => $model->slug]); ?>
            </h6>

            <p>
                <?= $model->short_text; ?>
            </p>
            <i class="fa fa-fw fa-globe"></i><?= CHtml::link(
                Yii::app()->createAbsoluteUrl('/services/services/view', ['slug' => $model->slug]),
                Yii::app()->createAbsoluteUrl('/services/services/view', ['slug' => $model->slug])
            ); ?>
        </div>
    </div>
    <div id="full" class="tab-pane fade">
        <div style="margin-bottom: 20px;">
            <h3><?= CHtml::link(CHtml::encode($model->title), ['/services/services/view', 'slug' => $model->slug]); ?></h3>
            <?php if ($model->image): ?>
                <?= CHtml::image($model->getImageUrl(), $model->title); ?>
            <?php endif; ?>
            <p><?= $model->full_text; ?></p>
            <span class="label label-info"><?= $model->date; ?></span>
            <i class="fa fa-fw fa-user"></i><?= CHtml::link(
                $model->user->fullName,
                ['/user/people/' . $model->user->nick_name]
            ); ?>
            <i class="fa fa-fw fa-globe"></i><?= CHtml::link(
                Yii::app()->createAbsoluteUrl('/services/services/view', ['slug' => $model->slug]),
                Yii::app()->createAbsoluteUrl('/services/services/view', ['slug' => $model->slug])
            ); ?>
        </div>
    </div>
</div>
