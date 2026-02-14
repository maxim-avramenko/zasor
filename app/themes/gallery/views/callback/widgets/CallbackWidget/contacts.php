<?php
/**
 * @var Callback $model
 * @var CActiveForm $form
 */
?>

<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'callback-contacts',
    'action' => Yii::app()->createUrl('/callback/callback/send'),
    'enableClientValidation' => true,
    'clientOptions' => [
        'validateOnSubmit' => true,
        'afterValidate' => 'js:callbackContactsSendForm',
    ],
]); ?>

<div class="form__heading slide-left">
    <div class="title title-line">
        Оставьте заявку
    </div>
    <p>
        Чтобы оставить заявку, напишите нам или позвоните
        по номеру <a href="tel:+7 843 240 53 00">+7 843 240 53 00</a>, и мы сами все заполним
    </p>
</div>
<div class="form__wrapper">
   <!-- <div class="form-group">
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
    <div class="form-group">
        <label class="form-label">
            Телефон
        </label>
        <?= $form->telField($model, 'phone',
            [
                'placeholder' => '',
                'onfocus' => 'placeholder="";',
                'onblur' => 'placeholder="";',
                'id' => 'callback-contacts-phone-input',
                'class' => 'form-control'
            ]
        ) ?>

        <?= $form->error($model, 'phone',
            [
                'inputID' => 'callback-contacts-phone-input',
            ]
        ) ?>
    </div>
    <button type="submit" id="callback-contacts">
        ОТПРАВИТЬ <!-- page contacts -->
    </button>
</div>
<div class="form__footer">
    <p>
        Нажимая на кнопку отправить, соглашаетесь с <a href="/politika-konfidencialnosti">политикой
                конфиденциальности.</a>
    </p>
</div>

<?php $this->endWidget(); ?>

