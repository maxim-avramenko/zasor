<?php
$this->title = [Yii::t('UserModule.user', 'Вакансии'), Yii::app()->getModule('yupe')->siteName];
?>

<section class="vacancies-page">
    <div class="vacancies">
        <div class="wrap">

            <div class="col">
                <?php $form = $this->beginWidget(
                    'bootstrap.widgets.TbActiveForm',
                    [
                        'id'          => 'feedback-form',
                        'type'        => 'vertical',
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => true,
                        'clientOptions' => [
                            'validateOnSubmit' => true,
                            'validateOnChange' => true,
                            'validateOnType' => false,
                        ],
                        'htmlOptions' => [
                            'enctype' => 'multipart/form-data'
                        ]
                    ]
                ); ?>
                    <div class="row">
                        <h3>Отправьте нам заявку</h3>
                        <?= $form->errorSummary($model); ?>
                    </div>

                    <?php if ($model->type): ?>
                    <div class="row dropdown">
                        <?= $form->dropDownListGroup(
                            $model,
                            'type',
                            [
                                'widgetOptions' => [
                                    'data' => $module->getTypes(),
                                ],
                            ]
                        ); ?>
                    </div>
                    <?php endif; ?>
                    <div class="row text">
                        <?= $form->textField($model, 'name', ['placeholder' => 'Ваше имя']); ?>
                    </div>
                    <div class="row text">
                        <?= $form->textField($model, 'email', ['placeholder' => 'Email']); ?>
                    </div>
                    <div class="row text">
                        <?= $form->textField($model, 'phone', ['placeholder' => 'Телефон']); ?>
                    </div>

                    <div class="row text">
                        <?= $form->textArea($model, 'text', ['placeholder' => 'Расскажите о себе']); ?>
                    </div>
                   <div class="row file">
                        <label>
                            Прикрепить файл
                            <?= $form->fileField($model, 'attach'); ?>
                        </label>
                        <div class="attach"></div>
                    </div>

                    <div class="row submit">
                        <button type="submit" id="callback-file-send">
                            ОТПРАВИТЬ
                        </button>
                    </div>
                <?php $this->endWidget(); ?>
            </div>

        </div>
    </div>

</section>


<script>
    (function ($) {
        $(function () {
            var $form = $('#feedback-form');
            $form.on('click', '.add-file-trigger', function () {
                $form.find('input[type="file"]').click();
            });
            $form.on('change', 'input[type="file"]', function () {
                var arr = $(this).val().split(/[\\\/]/);
                var str = arr[arr.length - 1];
                //console.log(str);
                $form.find('.attach').html('<span>' + str + '<span class="del"><i class="fa fa-times" aria-hidden="true"></i></span></span>');
            });

            $form.on('click', '.del', function () {
                $form.find('input[type="file"]').val('');
                $(this).parent().remove();
            });

        });
    })(jQuery);

</script>