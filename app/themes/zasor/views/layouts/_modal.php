<?php if (Yii::app()->hasModule('callback')): ?>
    <?php $this->widget('application.modules.callback.widgets.CallbackWidget', ['view' => 'view']); ?>
<?php endif; ?>