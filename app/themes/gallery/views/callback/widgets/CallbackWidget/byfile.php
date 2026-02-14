<?php
/**
 * @var Callback $model
 * @var CActiveForm $form
 */
?>

<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'callback-file',
    'action' => Yii::app()->createUrl('/callback/callback/send'),
    'enableClientValidation' => true,
    'clientOptions' => [
        'validateOnSubmit' => true,
        'afterValidate' => 'js:callbackFileSendForm',
    ],
    'htmlOptions' => ['enctype' => 'multipart/form-data'],
]); ?>

<?= $form->hiddenField($model, 'type',
    [
        'value' => Callback::TYPE_FILEBACK,
    ]
); ?>

<div class="form__heading slide-left">
    <div class="title title-line">
        Оставьте заявку
    </div>
    <p>
        Чтобы оставить заявку, напишите нам или позвоните
        по номеру <a href="tel:+7 843 240 53 00">+7 843 240 53 00</a>, и мы сами все заполним
    </p>
</div>
<!-- <div class="form__title">
    Несколько слов о вашей задаче
</div> -->
<!-- <div class="form-group slide-up">
    <?= $form->textArea($model, 'comment',
        [
            'placeholder' => 'Несколько слов о вашей задаче',
            'onfocus' => 'placeholder="";',
            'onblur' => 'placeholder="Несколько слов о вашей задаче";',
            'id' => 'callback-file-comment-input',
            'class' => 'form-control'
        ]
    ) ?></div> -->
<div class="fl_upld">
    <label>
        <?= $form->fileField($model, 'attach'); ?>
        Прикрепить файл
    </label>

    <div class="fl_nm"></div>
</div>
<!-- <div class="form__title">
    Контактные данные
</div> -->
<div class="form__wrapper slide-up">
  <!--  <div class="form-group">
        <label class="form-label">
            Имя
        </label> -->

            <?= $form->hiddenField($model, 'name',
            [
                'placeholder' => 'Ваше имя',
                'class'=>'form-control',
                'onfocus' => 'placeholder="";',
                'id' => 'calback-form-name-input',
                'onblur' => 'placeholder="Ваше имя";',
                'value' => 'Любое_имя'
            ]); ?>
        <?= $form->error($model, 'name',
            [
                'class' => 'error-text'
            ]
        ) ?>
   <!-- </div> -->
    <!-- <div class="form-group">
        <label class="form-label">
            E-mail
        </label>
        <?= $form->hiddenField($model, 'email',
            [
                'placeholder' => '',
                'class'=>'form-control',
                'onfocus' => 'placeholder="";',
                'id' => 'callback-file-email-input',
                'onblur' => 'placeholder="email";',
                'value' => 'email'
            ]); ?>
        <?= $form->error($model, 'email',
            [
                'class' => 'error-text'
            ]
        ) ?>
    </div> -->
    <div class="form-group">
        <label class="form-label">
            Телефон
        </label>
        <?= $form->telField($model, 'phone',
            [
                'placeholder' => '',
                'onfocus' => 'placeholder="";',
                'onblur' => 'placeholder="Ваш номер телефона";',
                'id' => 'callback-file-phone-input',
                'class' => 'form-control'
            ]
        ) ?>

        <?= $form->error($model, 'phone',
            [
                'inputID' => 'callback-form-phone-input',
            ]
        ) ?>
</div>
<div class="form__footer">
    <button type="submit" id="callback-file-send">
        ОТПРАВИТЬ <!-- open -->
    </button>
    <p>
        Нажимая на кнопку, вы даете согласие на обработку
        персональных данных и соглашаетесь с <a href="/politika-konfidencialnosti">политикой
            конфиденциальности.</a>
    </p>
</div>
<?php $this->endWidget(); ?>
