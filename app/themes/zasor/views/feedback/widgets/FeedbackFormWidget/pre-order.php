



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
                'beforeValidate' => 'js:function(form){
                    $("#preOrderF input[type=submit]").prop("disabled", true);
                    return true;
                }',
                'afterValidate'=>'js:function(form,data,hasError){
                $("#preOrderF input[type=submit]").prop("disabled", false);
                console.log(data);
                console.log(hasError);
								if(!hasError){
								var data = $("#preOrderF").serialize();
                                $.ajax({
                                    url: "/feedadd",
                                    type: "post",
                                    data: data,
                                    dataType: "json",
                                    success: function (data) {
                                        console.log(data);
                                        $("form#preOrderF")[0].reset();
                                        $(".pre-order-form .success-bg").addClass("open");
                                    }
                                });



								}
							}'
            ),
            'htmlOptions' => array(
                'class' => 'pre-order-form',
                'onsubmit'=>"return false;",
                'autocomplete'=> "off",
            )
        )
    ); ?>
    <div style="position: relative;">
        <div class="success-bg "></div>
            <div class="modal-header">

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
            <?php echo $form->textFieldGroup($model, 'name', ['widgetOptions' => ['htmlOptions' => ['autocomplete' => 'off']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'email', ['widgetOptions' => ['htmlOptions' => ['autocomplete' => 'off']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'phone', ['widgetOptions' => ['htmlOptions' => ['autocomplete' => 'off']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup(
                $model,
                'text',
                ['widgetOptions' => ['htmlOptions' => ['autocomplete' => 'off']]]
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
        <div class="success-bg "><?=Yii::t('app', 'Feedback success message');?></div>
    <?php  echo CHtml::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-lg', 'onsubmit' => '$(this).prop("disabled", true); return false;']); ?>

    <?php $this->endWidget(); ?>
    </div>

</div>

    <script>
        $(document).ready(function(){

            var top;

            $('.pre-order').click(function(){
                $('#preOrderForm').modal('show');

            });
            $('#preOrderForm').on('show.bs.modal', function (e) {
                console.log(window.isIPhone);
                if( navigator.userAgent.match(/iPhone|iPad|iPod/i) ) {
                    top = $(window).scrollTop();
                    $('.global-wrap').css({marginTop: '-' + top + 'px'});
                    //$('.modal-backdrop.in').css({top: winTop + 'px'});

                }
            });
            $('#preOrderForm').on('hidden.bs.modal', function (e) {
                $('.pre-order-form .success-bg').removeClass('open');
                $('.pre-order-form .success-text').removeClass('open');
                if( navigator.userAgent.match(/iPhone|iPad|iPod/i) ) {
                    $('.global-wrap').css({marginTop: ''});
                    console.log(top);
                    $(window).scrollTop(top);
                }
                $("form#preOrderF")[0].reset();
            });

        });

    </script>
