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

class AllServicesWidget extends yupe\widgets\YWidget
{
    public $id = null;

    public $view = 'view';

    public function run()
    {

        $dbCriteria = new CDbCriteria([
            'condition' => 't.status = :status',
            'params' => [
                ':status' => Services::STATUS_PUBLISHED,
            ],
            'order' => 't.date DESC',
            'with' => ['user'],
        ]);

        $dbCriteria->addCondition('parent_id IS NULL');
        $dbCriteria->limit = (int)$this->limit;

        $data = Services::model()->published()->findAll($dbCriteria);

        $this->render($this->view, ['models' => $data]);
    }
}
