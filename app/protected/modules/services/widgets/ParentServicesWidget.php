<?php

Yii::import('application.modules.services.models.*');

class ParentServicesWidget extends yupe\widgets\YWidget
{
    public $id = null;

    public $view = 'view';

    public function run()
    {

        $parent = Services::model()->findByPk($this->id);

        if (empty($parent->parent_id)) {

            $criteria = new CDbCriteria();
            $criteria->order = 'date DESC';
            $criteria->condition = 'parent_id=:parent_id';
            $criteria->params = [':parent_id' => $this->id];

            $data = Services::model()->published()->findAll($criteria);

        } else {
            $criteria = new CDbCriteria();
            $criteria->order = 'date DESC';
            $criteria->condition = 'parent_id=:parent_id';
            $criteria->params = [':parent_id' => $parent->parent_id];

            $parent = Services::model()->findByPk($parent->parent_id);
            $data = Services::model()->published()->findAll($criteria);
        }

        $this->render($this->view, ['models' => $data,'parent'=>$parent]);
    }
}
