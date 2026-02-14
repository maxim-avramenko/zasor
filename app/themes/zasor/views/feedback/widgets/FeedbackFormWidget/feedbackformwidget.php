    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Отправьте свой вопрос</h4>
    </div>

    <div class="modal-body">
        <p>Заполнив форму обратной связи на сайте, Вы обязательно получите ответ в течение 24 часов.</p>

<div class="form">
    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id'          => 'feedback-form2',
            'type'        => 'vertical',
        	'action'      => '/feedadd',
            'enableAjaxValidation' => false,
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange' => true,

        		),
            'htmlOptions' => array(

            )
        )
    ); ?>

    <input type="hidden" name="type_modal" id="type_modal" value="feedback"/>

    <?php echo $form->errorSummary($model); ?>

    <?php if ($model->type): ?>
        <div class='row'>
            <div class="col-sm-12">
                <?php echo $form->dropDownListGroup(
                    $model,
                    'type',
                    array(
                        'widgetOptions' => array(
                            'data' => $module->getTypes(),
                        ),
                    )
                ); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'name'); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'email'); ?>
        </div>
    </div>


   <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'phone'); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">

            <?php echo $form->dropDownListGroup(
            $model,
            'theme',
            [
                'widgetOptions' => [
                    'data' => $model->getThemeList(),
                ],
            ]
        ); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textAreaGroup(
                $model,
                'text',
                array('widgetOptions' => array('htmlOptions' => array('rows' => 10)))
            ); ?>
        </div>
    </div>

    <?php if ($module->showCaptcha && !Yii::app()->user->isAuthenticated()): ?>
        <?php if (CCaptcha::checkRequirements()): ?>
            <?php $this->widget(
                'CCaptcha',
                array(
                    'showRefreshButton' => true,
                    'imageOptions'      => array(
                        'width' => '150',
                    ),
                    'buttonOptions'     => array(
                        'class' => 'btn btn-info',
                    ),
                    'buttonLabel'       => '<i class="glyphicon glyphicon-repeat"></i>',
                )
            ); ?>
            <div class='row'>
                <div class="col-sm-12">
                    <?php echo $form->textFieldGroup(
                        $model,
                        'verifyCode',
                        array(
                            'widgetOptions' => array(
                                'htmlOptions' => array(
                                    'placeholder' => Yii::t(
                                            'FeedbackModule.feedback',
                                            'Insert symbols you see on image'
                                        )
                                ),
                            ),
                        )
                    ); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php  echo CHtml::submitButton(Yii::t('FeedbackModule.feedback', 'Send message'), ['class' => 'btn btn-lg']); ?>

    <?php $this->endWidget(); ?>
</div>

</div>

<script>
$(document).ready(function(){
	$('.modal-body form#feedback-form2 input[type="submit"]').click(function(){

		var button = $(this);
		var form = button.parents('form');
        button.attr('disabled', 'disabled');

        $.ajax({
            type:"POST",
            url: form.attr('action'),
            data: form.serialize(),
            success:function(data){
                if(data.data.result == 'success'){
                    $('.modal-body form')[0].reset();
                    button.parents('.modal').modal('hide');
                }
                button.removeAttr('disabled');
                console.log(data);
                alert(data.data.message);
            },
        });

		/*$.post(form.attr('action'), form.serialize(), function (response) {
            console.log(response.data);
			if(response.data.result == 'success'){
				$('.modal-body form')[0].reset();
				button.parents('.modal').modal('hide');
			}
            button.removeAttr('disabled');
			alert(response.data.message);



			});*/
		return false;
		});
});
</script>
