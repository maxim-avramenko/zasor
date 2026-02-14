

<a class="close" data-dismiss="modal"></a>

<div class="form">
    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        array(
            'id'          => 'preOrderAnotherF',
            'type'        => 'vertical',
        	'action'      => '/feedadd',
            'enableAjaxValidation' => true,
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange' => true,
                'afterValidate'=>'js:function(form,data,hasError){
								if(!hasError){

                                                $("form#preOrderAnotherF")[0].reset();
                                                $(".pre-order-form .success-bg").addClass("open");
                                                $(".pre-order-form .success-text").addClass("open");

								}
							}'
            ),

            'htmlOptions' => array(
                'class' => 'pre-order-form'
            )
        )
    ); ?>
    <div style="position: relative;">
        <div class="success-bg"></div>
    <div class="modal-header">

        Please just drop a line which you want
    </div>
    <div class="modal-body">
    <input type="hidden" name="type_modal" id="type_modal" value="another-pre-order"/>

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
            <?php echo $form->textAreaGroup($model, 'name', ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textAreaGroup($model, 'email', ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textAreaGroup($model, 'phone', ['widgetOptions' => ['htmlOptions' => ['placeholder' => '']]]); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup(
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
    <div class="modal-footer button-wrap">
        <div class="success-text">
            <div>Thanks for your application!</div><p>Stay in touch</p>
        </div>
    <?php  echo CHtml::submitButton(Yii::t('FeedbackModule.feedback', 'Submit'), ['class' => 'btn btn-lg']); ?>
    <p>When we get a sufficient number of requests, we will produce it.</p>
    </div>
    <div class="modal-footer">
        <p>You can also order the design of a new product. Contact us to <b>order@jsouv.com</b> for it.</p>

        <p>The example of one made-to-order: <b>Tromsø souvenir</b></p>
    <?php $this->endWidget(); ?>
    </div>

</div>



<script>
    $(document).ready(function(){

        var top;

        $('.another-pre-order').click(function(){
            $('#preOrderAnotherForm').modal('show');

        });
        $('#preOrderAnotherForm').on('show.bs.modal', function (e) {
            console.log(window.isIPhone);
            if( navigator.userAgent.match(/iPhone|iPad|iPod/i) ) {
                top = $(window).scrollTop();
                $('.global-wrap').css({marginTop: '-' + top + 'px'});
                //$('.modal-backdrop.in').css({top: winTop + 'px'});

            }
        });
        $('#preOrderAnotherForm').on('hidden.bs.modal', function (e) {
            $('.pre-order-form .success-bg').removeClass('open');
            $('.pre-order-form .success-text').removeClass('open');
            if( navigator.userAgent.match(/iPhone|iPad|iPod/i) ) {
                $('.global-wrap').css({marginTop: ''});
                console.log(top);
                $(window).scrollTop(top);
            }
            $("form#preOrderAnotherF")[0].reset();
        });

    });

</script>