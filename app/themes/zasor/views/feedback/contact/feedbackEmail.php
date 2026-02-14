<html>
<head>
    <title><?= Yii::t('FeedbackModule.feedback', 'New message from site'); ?> <?= CHtml::encode(
            Yii::app()->name
        ); ?>!</title>
</head>
<body>


<?= Yii::t('FeedbackModule.feedback', 'Author:'); ?> <?= $model->name ?> - <?= $model->email; ?>
<br/>
<?= Yii::t('FeedbackModule.feedback', 'Topic:'); ?> <?= $model->theme; ?><br/>
<?= Yii::t('FeedbackModule.feedback', 'Text:'); ?> <?= $model->text; ?><br/>
<?php if($model->phone != ''){ ?>
<?= Yii::t('FeedbackModule.feedback', 'Номер телефона:'); ?> <?= $model->phone; ?><br/>
<?php } ?>
<?php if($model->city != ''){ ?>
    <?= Yii::t('FeedbackModule.feedback', 'Город:'); ?> <?= $model->city; ?><br/>
<?php } ?>
<?php if($model->attach != ''){ ?>
    <?= Yii::t('FeedbackModule.feedback', 'Прикрепленный файл:'); ?> <?= $model->getFileUrl(); ?><br/>
<?php } ?>
<br/><br/>



<br/><br/>

</body>
</html>
