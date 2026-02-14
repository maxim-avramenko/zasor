<?php

use yupe\components\controllers\FrontController;


class ServicesController extends FrontController
{

    public function actionView($slug)
    {

        switch ($slug) {
            case 'contacts':
                $criteria = [
                    'condition' => 'slug = :slug AND (lang = :lang OR (lang = :deflang))',
                    'params' => [
                        ':slug' => $slug,
                        ':lang' => Yii::app()->getLanguage(),
                        ':deflang' => $this->yupe->defaultLanguage,
                    ],
                    'order' => 'FIELD(lang, "' . Yii::app()->getLanguage() . '", "' . $this->yupe->defaultLanguage . '")'
                ];
                $model = Page::model()->published()->find($criteria);


                if (null === $model) {
                    throw new CHttpException(404, Yii::t('PageModule.page', 'Page was not found'));
                }

                $this->render('_contacts', ['model' => $model]);

                break;
            case 'about':
                $criteria = [
                    'condition' => 'slug = :slug AND (lang = :lang OR (lang = :deflang))',
                    'params' => [
                        ':slug' => $slug,
                        ':lang' => Yii::app()->getLanguage(),
                        ':deflang' => $this->yupe->defaultLanguage,
                    ],
                    'order' => 'FIELD(lang, "' . Yii::app()->getLanguage() . '", "' . $this->yupe->defaultLanguage . '")'
                ];
                $model = Page::model()->published()->find($criteria);


                if (null === $model) {
                    throw new CHttpException(404, Yii::t('PageModule.page', 'Page was not found'));
                }

                $this->render('_about', ['model' => $model]);

                break;

            default:

                $model = $this->getByAlias($slug);

                if (!$model) {
                    throw new CHttpException(404, Yii::t('ServicesModule.services', 'Services article was not found!'));
                }


                $this->render(
                    'view',
                    [
                        'model' => $model,
                    ]
                );

        }

    }


    public function actionIndex()
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

        $dataProvider = new CActiveDataProvider('Services', [
            'criteria' => $dbCriteria,
            'pagination' => [
                'pageSize' => $this->getModule()->perPage
            ]
        ]);

        $this->render('index', ['dataProvider' => $dataProvider]);
    }


    /**
     * @param $slug
     */
    public function getByAlias($slug)
    {
        return Services::model()->published()->find(
            'slug = :slug',
            [
                ':slug' => $slug,
            ]
        );
    }

}