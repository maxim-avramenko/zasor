<div class="form-wrap">
    <?php $randId = rand();?>
    <?php $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm',
        [
            'id'          => 'preOrderF'.$randId,
            'type'        => 'vertical',
        	'action'      => '/feedadd',
            'enableAjaxValidation' => true,
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'validateOnChange' => true,
                'afterValidate'=>'js:function(form,data,hasError){
                console.log(form);
					if(!hasError){
                        $("form#preOrderF' . $randId . '")[0].reset();
                        $(".form-wrap .success-bg#bg' . $randId . '").addClass("open");
					}
				}'
            ),
            'htmlOptions' => [
                'class' => 'pre-order-form',
                'onsubmit'=>"return false;"
            ]
        ]
    ); ?>

        <input type="hidden" name="type_modal" id="type_modal" value="pre-order-landing"/>
        <?php echo $form->errorSummary($model); ?>
        <div>
            <?php echo $form->textFieldGroup($model, 'email', ['widgetOptions' => ['htmlOptions' => ['placeholder' => 'YOUR EMAIL']]]); ?>
            <?php  echo CHtml::submitButton(Yii::t('FeedbackModule.feedback', 'Sign up'), ['class' => 'btn btn-lg']); ?>
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

    <?php $this->endWidget(); ?>
    <div class="clear"></div>
    <div class="success-bg" id="bg<?=$randId;?>">
        <div>Thanks for your application!</div>
        <p>Wait an email with the best offer</p>
    </div>
</div>

    <script>
        $(document).ready(function(){

            /*var top;

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
            });*/

        });

    </script>
