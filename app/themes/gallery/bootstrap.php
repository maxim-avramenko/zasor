<?php
/**
 * Theme bootstrap file.
 */
Yii::app()->getClientScript()->registerScript('baseUrl', "var baseUrl = '" . Yii::app()->getBaseUrl(true) . "';", CClientScript::POS_HEAD);

Yii::import('themes.'.Yii::app()->theme->name.'.GalleryThemeEvents');
