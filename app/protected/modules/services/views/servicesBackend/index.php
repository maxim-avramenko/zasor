<?php

/**
 * @var $model Services
 * @var $this ServicesBackendController
 */

$this->breadcrumbs = [
    Yii::t('ServicesModule.services', 'Services') => ['/services/servicesBackend/index'],
    Yii::t('ServicesModule.services', 'Management'),
];

$this->pageTitle = Yii::t('ServicesModule.services', 'Services - management');

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
        <small><?= Yii::t('ServicesModule.services', 'management'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?= Yii::t('ServicesModule.services', 'Find services'); ?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php
    Yii::app()->clientScript->registerScript(
        'search',
        "
    $('.search-form form').submit(function () {
        $.fn.yiiGridView.update('services-grid', {
            data: $(this).serialize()
        });

        return false;
    });
"
    );
    $this->renderPartial('_search', ['model' => $model]);
    ?>
</div>

<?php $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id' => 'services-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => [
            [
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'title',
                'editable' => [
                    'url' => $this->createUrl('/services/servicesBackend/inline'),
                    'mode' => 'inline',
                    'params' => [
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                    ],
                ],
                'filter' => CHtml::activeTextField($model, 'title', ['class' => 'form-control']),
            ],
            [
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'slug',
                'editable' => [
                    'url' => $this->createUrl('/services/servicesBackend/inline'),
                    'mode' => 'inline',
                    'params' => [
                        Yii::app()->request->csrfTokenName => Yii::app()->request->csrfToken,
                    ],
                ],
                'filter' => CHtml::activeTextField($model, 'slug', ['class' => 'form-control']),
            ],
            'date',
            [
                'name'   => 'parent_id',
                'value'  => '$data->getParentName()',
                'filter' => CHtml::listData(Page::model()->findAll(), 'id', 'title')
            ],

            [
                'class' => 'yupe\widgets\EditableStatusColumn',
                'name' => 'status',
                'url' => $this->createUrl('/services/servicesBackend/inline'),
                'source' => $model->getStatusList(),
                'options' => [
                    Services::STATUS_PUBLISHED => ['class' => 'label-success'],
                    Services::STATUS_MODERATION => ['class' => 'label-warning'],
                    Services::STATUS_DRAFT => ['class' => 'label-default'],
                ],
            ],
            [
                'name' => 'lang',
                'value' => '$data->getFlag()',
                'filter' => $this->yupe->getLanguagesList(),
                'type' => 'html',
            ],
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
                'frontViewButtonUrl' => function($data){
                    return Yii::app()->createUrl('/services/services/view', ['path' => $data->path]);
                },
                'buttons' => [
                    'front_view' => [
                        'visible' => function ($row, $data) {
                            return $data->status == Services::STATUS_PUBLISHED;
                        }
                    ]
                ]
            ],
        ],
    ]
); ?>
