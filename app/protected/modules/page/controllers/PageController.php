<?php

use yupe\components\controllers\FrontController;


class PageController extends FrontController
{
    public ?string $schema = '';

    public function actionIndex()
    {
        $dbCriteria = new CDbCriteria([
            'condition' => 't.status = :status',
            'params' => [
                ':status' => Page::STATUS_PUBLISHED,
            ],
            'order' => 't.order DESC',
            'with' => ['user'],
        ]);

        $dbCriteria->addCondition('parent_id IS NULL');
        $dbCriteria->addCondition('is_service = 1');

        $dataProvider = new CActiveDataProvider('Page', [
            'criteria' => $dbCriteria,
            'pagination' => [
                'pageSize' => 100
            ]
        ]);

        $this->render('index', ['dataProvider' => $dataProvider]);
    }



    public function actionView($slug)
    {

        $model = $this->getByAlias($slug);

        if (!$model) {
            throw new CHttpException(404, Yii::t('PageModule.page', 'Page article was not found!'));
        }


        $this->render($model->view ?: 'view', ['model' => $model]);

    }

    /**
     * @param $slug
     */
    public function getByAlias($slug)
    {
        return Page::model()->published()->find(
            'slug = :slug',
            [
                ':slug' => $slug,
            ]
        );
    }



}