<?php
/**
 * @var Callback $model
 * @var CActiveForm $form
 */
?>

<div class="modal" id="modal">

    <?php $form = $this->beginWidget('CActiveForm', [
        'id' => 'callback-form',
        'action' => Yii::app()->createUrl('/callback/callback/send'),
        'enableClientValidation' => true,
        'clientOptions' => [
            'validateOnSubmit' => true,
            'afterValidate' => 'js:callbackSendForm',
        ],
    ]); ?>

    <?= $form->hiddenField($model, 'type',
        [
            'value' => Callback::TYPE_CALLBACK,
        ]
    ); ?>

    <!-- Скрытые поля БЕЗ мусорных значений -->
    <?= $form->hiddenField($model, 'name', ['value' => '']); ?>
    <?= $form->hiddenField($model, 'email', ['value' => '']); ?>

    <!-- <div class="title title-line">
        Оставьте заявку
    </div> -->
    
    <div class="form-group">
        <label class="form-label">
            Телефон *
        </label>

        <?= $form->telField($model, 'phone',
            [
                'placeholder' => 'Ваш номер телефона',
                'onfocus' => 'placeholder="";',
                'onblur' => 'placeholder="Ваш номер телефона";',
                'id' => 'calback-form-phone-input',
                'class' => 'form-control',
                'required' => true
            ]
        ) ?>

        <?= $form->error($model, 'phone',
            [
                'inputID' => 'callback-form-phone-input',
            ]
        ) ?>
    </div>

    <!-- <div class="form__title">
        Несколько слов о вашей задаче
    </div> -->
    <!-- <div class="form-group form-group-textarea">
        <?= $form->textArea($model, 'comment',
            [
                'placeholder' => 'Несколько слов о вашей задаче',
                'onfocus' => 'placeholder="";',
                'onblur' => 'placeholder="Несколько слов о вашей задаче";',
                'id' => 'calback-form-comment-input',
                'class' => 'form-control'
            ]
        ) ?>
    </div> -->
    
    <div class="form__footer">
        <button type="submit" id="callback-send">
            ОТПРАВИТЬ
        </button>
        <p>
            Нажимая на кнопку, вы даете согласие на обработку
            персональных данных и соглашаетесь с <a href="/politika-konfidencialnosti">политикой
                конфиденциальности.</a>
        </p>
    </div>
    <?php $this->endWidget(); ?>

</div>