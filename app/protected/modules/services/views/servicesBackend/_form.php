<?php
/**
 * @var $this ServicesBackendController
 * @var $model Services
 * @var $form \yupe\widgets\ActiveForm
 */

?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#common" data-toggle="tab"><?= Yii::t("ServicesModule.services", "Common"); ?></a></li>
    <li ><a href="#gallery" data-toggle="tab"><?= Yii::t("ServicesModule.services", "Gallery"); ?></a></li>
    <li><a href="#seo" data-toggle="tab"><?= Yii::t("ServicesModule.services", "SEO"); ?></a></li>
</ul>
<?php $form = $this->beginWidget(
    '\yupe\widgets\ActiveForm',
    [
        'id' => 'services-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'type' => 'vertical',
        'htmlOptions' => ['class' => 'well', 'enctype' => 'multipart/form-data'],
    ]
); ?>
<div class="tab-content">

    <div class="tab-pane active" id="common">

        <div class="alert alert-info">
            <?= Yii::t('ServicesModule.services', 'Fields with'); ?>
            <span class="required">*</span>
            <?= Yii::t('ServicesModule.services', 'are required'); ?>
        </div>

        <?= $form->errorSummary($model); ?>

        <div class="row">

            <div class="col-sm-4">
                <?= $form->datePickerGroup(
                    $model,
                    'date',
                    [
                        'widgetOptions' => [
                            'options' => [
                                'format' => 'dd-mm-yyyy',
                                'weekStart' => 1,
                                'autoclose' => true,
                            ],
                        ],
                        'prepend' => '<i class="fa fa-calendar"></i>',
                    ]
                );
                ?>
            </div>

            <div class="col-sm-2">
                <?= $form->dropDownListGroup(
                    $model,
                    'status',
                    [
                        'widgetOptions' => [
                            'data' => $model->getStatusList(),
                        ],
                    ]
                ); ?>
            </div>

            <div class="col-sm-2">
                <?php if (count($languages) > 1): { ?>
                    <?= $form->dropDownListGroup(
                        $model,
                        'lang',
                        [
                            'widgetOptions' => [
                                'data' => $languages,
                                'htmlOptions' => [
                                    'empty' => Yii::t('ServicesModule.services', '-no matter-'),
                                ],
                            ],
                        ]
                    ); ?>
                    <?php if (!$model->isNewRecord): { ?>
                        <?php foreach ($languages as $k => $v): { ?>
                            <?php if ($k !== $model->lang): { ?>
                                <?php if (empty($langModels[$k])): { ?>
                                    <a href="<?= $this->createUrl(
                                        '/services/servicesBackend/create',
                                        ['id' => $model->id, 'lang' => $k]
                                    ); ?>"><i class="iconflags iconflags-<?= $k; ?>" title="<?= Yii::t(
                                            'ServicesModule.services',
                                            'Add translation for {lang} language',
                                            ['{lang}' => $v]
                                        ) ?>"></i></a>
                                <?php } else: { ?>
                                    <a href="<?= $this->createUrl(
                                        '/services/servicesBackend/update',
                                        ['id' => $langModels[$k]]
                                    ); ?>"><i class="iconflags iconflags-<?= $k; ?>" title="<?= Yii::t(
                                            'ServicesModule.services',
                                            'Edit translation in to {lang} language',
                                            ['{lang}' => $v]
                                        ) ?>"></i></a>
                                <?php } endif; ?>
                            <?php } endif; ?>
                        <?php } endforeach; ?>
                    <?php } endif; ?>
                <?php } else: { ?>
                    <?= $form->hiddenField($model, 'lang'); ?>
                <?php } endif; ?>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4">
                <?= $form->dropDownListGroup(
                    $model,
                    'parent_id',
                    [
                        'widgetOptions' => [
                            'data' => Services::model()->getFormattedList(),
                            'htmlOptions' => [
                                'class' => 'popover-help',
                                'empty' => Yii::t('ServicesModule.services', '--choose--'),
                                'encode' => false,
                            ],
                        ],
                    ]
                ); ?>
            </div>

<!--            <div class="col-sm-4">-->
<!--                --><?//= $form->dropDownListGroup(
//                    $model,
//                    'category_id',
//                    [
//                        'widgetOptions' => [
//                            'data' => Category::model()->getFormattedList(
//                                (int)Yii::app()->getModule('services')->mainCategory
//                            ),
//                            'htmlOptions' => [
//                                'empty' => Yii::t('ServicesModule.services', '--choose--'),
//                                'encode' => false,
//                            ],
//                        ],
//                    ]
//                ); ?>
<!--            </div>-->
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'title'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?= $form->slugFieldGroup($model, 'slug', ['sourceAttribute' => 'title']); ?>
            </div>
        </div>

        <div class='row'>
            <div class="col-sm-7">
                <?php
                echo CHtml::image(
                    !$model->isNewRecord && $model->image ? $model->getImageUrl() : '#',
                    $model->title,
                    [
                        'class' => 'preview-image img-responsive',
                        'style' => !$model->isNewRecord && $model->image ? '' : 'display:none',
                    ]
                ); ?>

                <?php if (!$model->isNewRecord && $model->image): ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   name="delete-file"> <?= Yii::t('YupeModule.yupe', 'Delete the file') ?>
                        </label>
                    </div>
                <?php endif; ?>

                <?= $form->fileFieldGroup(
                    $model,
                    'image',
                    [
                        'widgetOptions' => [
                            'htmlOptions' => [
                                'onchange' => 'readURL(this);',
                                'style' => 'background-color: inherit;',
                            ],
                        ],
                    ]
                ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <?= $form->labelEx($model, 'short_text'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'short_text',
                    ]
                ); ?>
                <?= $form->error($model, 'short_text'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 <?= $model->hasErrors('preamble') ? 'has-error' : ''; ?>">
                <?= $form->labelEx($model, 'preamble'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'preamble',
                    ]
                ); ?>
                <?= $form->error($model, 'preamble'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 <?= $model->hasErrors('full_text') ? 'has-error' : ''; ?>">
                <?= $form->labelEx($model, 'full_text'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'full_text',
                    ]
                ); ?>
                <?= $form->error($model, 'full_text'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <?= $form->labelEx($model, 'text_3'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'text_3',
                    ]
                ); ?>
                <?= $form->error($model, 'text_3'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <?= $form->labelEx($model, 'text_4'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'text_4',
                    ]
                ); ?>
                <?= $form->error($model, 'text_4'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <?= $form->labelEx($model, 'text_5'); ?>
                <?php $this->widget(
                    $this->module->getVisualEditor(),
                    [
                        'model' => $model,
                        'attribute' => 'text_5',
                    ]
                ); ?>
                <?= $form->error($model, 'text_5'); ?>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup(
                    $model,
                    'view'
                ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?= $form->checkBoxGroup($model, 'is_protected', $model->getProtectedStatusList()); ?>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="gallery">

        <div class="row">
            <div class="col-sm-4">
                <?= $form->dropDownListGroup(
                    $model,
                    'one_gallery_id',
                    [
                        'widgetOptions' => [
                            'data' => $galleryList,
                            'htmlOptions' => [
                                'empty' => '---',
                                'encode' => false,
                            ],
                        ],
                    ]
                ); ?>
                <a href="<?= Yii::app()->createUrl('/gallery/galleryBackend/index') ?>" target="_blank">
                    <i class="fa fa-fw fa-camera"></i> Галереи
                </a>
                <br>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <?= $form->dropDownListGroup(
                    $model,
                    'two_gallery_id',
                    [
                        'widgetOptions' => [
                            'data' => $galleryList,
                            'htmlOptions' => [
                                'empty' => '---',
                                'encode' => false,
                            ],
                        ],
                    ]
                ); ?>
                <a href="<?= Yii::app()->createUrl('/gallery/galleryBackend/index') ?>" target="_blank">
                    <i class="fa fa-fw fa-camera"></i> Галереи
                </a>
                <br>
                <br>
            </div>
        </div>

    </div>
    <div class="tab-pane" id="seo">

        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'meta_title'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <?= $form->textFieldGroup($model, 'meta_keywords'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <?= $form->textAreaGroup($model, 'meta_description'); ?>
            </div>
        </div>
    </div>
</div>

<br/>

<br/>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    [
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? Yii::t('ServicesModule.services', 'Create article and continue') : Yii::t(
            'ServicesModule.services',
            'Save services article and continue'
        ),
    ]
); ?>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    [
        'buttonType' => 'submit',
        'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
        'label' => $model->isNewRecord ? Yii::t('ServicesModule.services', 'Create article and close') : Yii::t(
            'ServicesModule.services',
            'Save services article and close'
        ),
    ]
); ?>

<?php $this->endWidget(); ?>
