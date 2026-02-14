<html>
<head></head>
<body>
<h1><?= Yii::t('CallbackModule.callback', 'Callback request') ?>:<?= $model->getType() ?></h1>
    <table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
        <tr>
            <td style="padding:6px; width:170px; background-color:#f0f0f0; border:1px solid #e0e0e0;">
                <?= Yii::t('CallbackModule.callback', 'Name') ?>
            </td>
            <td style="padding:6px; width:330px; background-color:#ffffff; border:1px solid #e0e0e0;">
                <?= CHtml::encode($model->name); ?>
            </td>
        </tr>
        <tr>
            <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;">
                <?= Yii::t('CallbackModule.callback', 'Phone') ?>
            </td>
            <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;">
                <?= CHtml::encode($model->phone); ?>
            </td>
        </tr>

        <tr>
            <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;">
                <?= Yii::t('CallbackModule.callback', 'Comment') ?>
            </td>
            <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;">
                <?= CHtml::encode($model->comment); ?>
            </td>
        </tr>

    </table>
</body>
</html>