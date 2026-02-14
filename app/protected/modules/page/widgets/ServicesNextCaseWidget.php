<?php
/**
 * Created by PhpStorm.
 * User: Marat
 * Date: 24.12.2015
 * Time: 18:24
 */

Yii::import('application.modules.page.*');

class PageNextCaseWidget extends yupe\widgets\YWidget
{

    public $decision_id;

    public $view = 'view';

    public function run()
    {

        $criteria = new CDbCriteria();
        $criteria->compare('status', 1);
        $criteria->order = 'create_time DESC';

        $decisions = Page::model()->findAll($criteria);
        $this->render($this->view, ['models' => $decisions, 'decision_id' => $this->decision_id]);
    }
}
