<?php

/**
 * @var $model Page
 * @var $this PageBackendController
 */

$this->breadcrumbs = [
    Yii::t('PageModule.page', 'Page') => ['/page/pageBackend/index'],
    Yii::t('PageModule.page', 'Управление'),
];

$this->pageTitle = Yii::t('PageModule.page', 'Страницы - Управление');

$this->menu = [
    [
        'icon' => 'fa fa-fw fa-list-alt',
        'label' => Yii::t('PageModule.page', 'Страницы - Управление'),
        'url' => ['/page/pageBackend/index'],
    ],
    [
        'icon' => 'fa fa-fw fa-plus-square',
        'label' => Yii::t('PageModule.page', 'Create page'),
        'url' => ['/page/pageBackend/create'],
    ],
];
?>
<div class="page-header">
    <h1>
        <?= Yii::t('PageModule.page', 'Page'); ?>
        <small><?= Yii::t('PageModule.page', 'Управление'); ?></small>
    </h1>
</div>

<?php $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id' => 'page-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'sortableRows'      => true,
        'sortableAjaxSave'  => true,
        'sortableAttribute' => 'order',
        'sortableAction' => '/page/pageBackend/sortable',
        'columns' => [
            [
                'class' => 'bootstrap.widgets.TbEditableColumn',
                'name' => 'title',
                'editable' => [
                    'url' => $this->createUrl('/page/pageBackend/inline'),
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
                    'url' => $this->createUrl('/page/pageBackend/inline'),
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
                'url' => $this->createUrl('/page/pageBackend/inline'),
                'source' => $model->getStatusList(),
                'options' => [
                    Page::STATUS_PUBLISHED => ['class' => 'label-success'],
                    Page::STATUS_MODERATION => ['class' => 'label-warning'],
                    Page::STATUS_DRAFT => ['class' => 'label-default'],
                ],
            ],

            [
                'class' => 'yupe\widgets\CustomButtonColumn',
                'frontViewButtonUrl' => function($data){
                    return Yii::app()->createUrl('/page/page/view', ['slug' => $data->slug]);
                },
                'buttons' => [
                    'front_view' => [
                        'visible' => function ($row, $data) {
                            return $data->status == Page::STATUS_PUBLISHED;
                        }
                    ]
                ]
            ],
        ],
    ]
); ?>
