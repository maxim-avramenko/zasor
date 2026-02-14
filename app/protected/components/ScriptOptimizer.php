<?php
// components/ScriptOptimizer.php
class ScriptOptimizer extends CComponent
{
    public static function registerDeferScript($path, $position = CClientScript::POS_END)
    {
        Yii::app()->clientScript->registerScriptFile($path, $position, [
            'defer' => 'defer'
        ]);
    }
    
    public static function registerAsyncScript($path, $position = CClientScript::POS_END)
    {
        Yii::app()->clientScript->registerScriptFile($path, $position, [
            'async' => 'async'
        ]);
    }
    
    public static function addPreload($url, $type = 'script')
    {
        Yii::app()->clientScript->registerLinkTag('preload', null, $url, null, [
            'as' => $type
        ]);
    }
}
?>