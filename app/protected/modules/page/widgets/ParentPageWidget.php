<?php

Yii::import('application.modules.page.models.*');

class ParentPageWidget extends yupe\widgets\YWidget
{
    public $id = null;

    public $view = 'view';

    public function run()
    {

        $parent = Page::model()->findByPk($this->id);

        if (empty($parent->parent_id)) {

            $criteria = new CDbCriteria();
            $criteria->order = 't.order DESC';
            $criteria->condition = 'parent_id=:parent_id';
            $criteria->params = [':parent_id' => $this->id];

            $data = Page::model()->published()->findAll($criteria);

        } else {
            $criteria = new CDbCriteria();
            $criteria->order = 't.order DESC';
            $criteria->condition = 'parent_id=:parent_id';
            $criteria->params = [':parent_id' => $parent->parent_id];

            $parent = Page::model()->findByPk($parent->parent_id);
            $data = Page::model()->published()->findAll($criteria);
        }

        $this->render($this->view, ['models' => $data,'parent'=>$parent]);
    }
}
