



<a class="close" data-dismiss="modal"></a>
<div class="form">

    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id'          => 'preOrderF',
            'type'        => 'vertical',
        	'action'      => '/feedadd',
            'enableAjaxValidation' => true,
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange' => true,
                'beforeValidate'=>'js:function(form) {
                    $("form#preOrderF  input[type=\"submit\"]").attr("disabled", "disabled");
                    return true;
                    }',

                'afterValidate'=>'js:function(form,data,hasError){
                console.log(form);
								if(!hasError){
								    var button = $("form#preOrderF  input[type=\"submit\"]");
                                    var form = $("form#preOrderF");
                                    button.attr("disabled", "disabled");
                                    $.ajax({
                                        type:"POST",
                                        url: form.attr("action"),
                                        data: form.serialize(),
                                        success:function(data){
                                            if(data.data.result == "success"){
                                                $("form#preOrderF")[0].reset();
                                                $(".pre-order-form .success-bg").addClass("open");
                                                $(".pre-order-form .success-text").addClass("open");
                                            }
                                            //button.removeAttr("disabled");
                                            console.log(data);
                                            //alert(data.data.message);
                                            },
                                        });

								}
							}'
            ),
            'htmlOptions' => array(
                'class' => 'pre-order-form',
                'onsubmit'=>"return false;"
            )
        )
    ); ?>
    <div style="position: relative;">
        <div class="success-bg "></div>
            <div class="modal-header">


            Please enter your details to pre-order
            </div>
    <div class="modal-body">
    <input type="hidden" name="type_modal" id="type_modal" value="pre-order"/>

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
            <?php echo $form->textFieldGroup($model, 'name', ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'email', ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'phone', ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textAreaGroup(
                $model,
                'text',
                ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]
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
    </div>
    </div>
    <div class="modal-footer">
        <div class="success-text">
            <div>Thanks for your application!</div><p>We will contact you by mail<br>as soon as possible</p>
        </div>
    <?php  echo CHtml::submitButton(Yii::t('FeedbackModule.feedback', 'Submit'), ['class' => 'btn btn-lg']); ?>
        <?php /*echo CHtml::ajaxSubmitButton('Save','/feedadd',
            array(

                'type'=>'post',
                'success'=>'function(data) {
                                            if(data.data.result == "success"){
                                                $("form#preOrderF")[0].reset();
                                                $(".pre-order-form .success-bg").addClass("open");
                                                $(".pre-order-form .success-text").addClass("open");
                                            }
                                            //button.removeAttr("disabled");
                                            console.log(data);
                                            //alert(data.data.message);
                    }',

            ),array('id'=>'mybtn','class'=>'btn btn-lg')); */?>

    <?php $this->endWidget(); ?>
    </div>

</div>

    <script>
        $(document).ready(function(){
            $('.pre-order').click(function(){
                $('#preOrderForm').modal('show');
            });
            /*$('#preOrderForm').on('show.bs.modal', function (e) {
                disableScroll();
            });*/
            $('#preOrderForm').on('hidden.bs.modal', function (e) {
                $('.pre-order-form .success-bg').removeClass('open');
                $('.pre-order-form .success-text').removeClass('open');
                $("form#preOrderF")[0].reset();
            });

           /* $('form#preOrderF  input[type="submit"]').click(function(){
                $(this).attr("disabled", "disabled");
                //return false;
            });*/

        });

    </script>
