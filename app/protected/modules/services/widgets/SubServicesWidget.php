<?php

/**
 * Виджет вывода последних новостей
 *
 * @category YupeWidget
 * @package  yupe.modules.news.widgets
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD http://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_BSD
 * @version  0.5.3
 * @link     http://yupe.ru
 *
 **/
Yii::import('application.modules.services.models.*');

class SubServicesWidget extends yupe\widgets\YWidget
{
    public $id = null;

    public $view = 'view';

    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->limit = 50;
        $criteria->order = 'date DESC';

        $criteria->condition = 'parent_id=:parent_id';
        $criteria->params=array(':parent_id'=>$this->id);

        $data = Services::model()->published()->findAll($criteria);

        $this->render($this->view, ['models' => $data]);
    }
}
