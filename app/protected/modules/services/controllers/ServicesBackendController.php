<?php

/**
 * ServicesBackendController контроллер для работы с новостями в панели управления
 *
 * @author    yupe team <team@yupe.ru>
 * @link      http://yupe.ru
 * @copyright 2009-2015 amyLabs && Yupe! team
 * @package   yupe.modules.services.controllers
 * @version   0.6
 *
 */
class ServicesBackendController extends yupe\components\controllers\BackController
{
    public function accessRules()
    {
        return [
            ['allow', 'roles' => ['admin']],
            ['allow', 'actions' => ['index'], 'roles' => ['Services.ServicesBackend.Index']],
            ['allow', 'actions' => ['view'], 'roles' => ['Services.ServicesBackend.View']],
            ['allow', 'actions' => ['create'], 'roles' => ['Services.ServicesBackend.Create']],
            ['allow', 'actions' => ['update', 'inline'], 'roles' => ['Services.ServicesBackend.Update']],
            ['allow', 'actions' => ['delete', 'multiaction'], 'roles' => ['Services.ServicesBackend.Delete']],
            ['deny']
        ];
    }

    public function actions()
    {
        return [
            'inline' => [
                'class' => 'yupe\components\actions\YInLineEditAction',
                'model' => 'Services',
                'validAttributes' => ['title', 'slug', 'date', 'status']
            ]
        ];
    }

    /**
     * Displays a particular model.
     *
     * @param integer $id the ID of the model to be displayed
     *
     * @return void
     */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return void
     */
    public function actionCreate()
    {
        $model = new Services();

        $galleryList = Gallery::model()->published()->findAll();
        $galleryList = CHtml::listData($galleryList, 'id', 'name');

        if (($data = Yii::app()->getRequest()->getPost('Services')) !== null) {

            $model->setAttributes($data);

            if ($model->save()) {

                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('ServicesModule.services', 'Services article was created!')
                );

                $this->redirect(
                    (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        ['create']
                    )
                );
            }
        }

        $languages = $this->yupe->getLanguagesList();

        //если добавляем перевод
        $id = (int)Yii::app()->getRequest()->getQuery('id');
        $lang = Yii::app()->getRequest()->getQuery('lang');

        if (!empty($id) && !empty($lang)) {
            $services = Services::model()->findByPk($id);

            if (null === $services) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::ERROR_MESSAGE,
                    Yii::t('ServicesModule.services', 'Targeting services was not found!')
                );

                $this->redirect(['/services/servicesBackend/create']);
            }

            if (!array_key_exists($lang, $languages)) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::ERROR_MESSAGE,
                    Yii::t('ServicesModule.services', 'Language was not found!')
                );

                $this->redirect(['/services/servicesBackend/create']);
            }

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t(
                    'ServicesModule.services',
                    'You inserting translation for {lang} language',
                    [
                        '{lang}' => $languages[$lang]
                    ]
                )
            );

            $model->lang = $lang;
            $model->slug = $services->slug;
            $model->date = $services->date;
            $model->category_id = $services->category_id;
            $model->title = $services->title;
            $model->parent_id = $services->parent_id;
        } else {
            $model->date = date('d-m-Y');
            $model->lang = Yii::app()->language;
        }

        $this->render(
            'create',
            [
                'model' => $model,
                'pages' => Services::model()->getFormattedList(),
                'languages' => $languages,
                'galleryList' => $galleryList
            ]
        );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param null $slug
     * @param integer $id the ID of the model to be updated
     *
     * @throws CHttpException
     *
     * @return void
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        $galleryList = Gallery::model()->published()->findAll();
        $galleryList = CHtml::listData($galleryList, 'id', 'name');

        if (($data = Yii::app()->getRequest()->getPost('Services')) !== null) {

            $model->setAttributes($data);

            if ($model->save()) {

                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('ServicesModule.services', 'Services article was updated!')
                );

                $this->redirect(
                    Yii::app()->getRequest()->getIsPostRequest()
                        ? (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        ['update', 'id' => $model->id]
                    )
                        : ['view', 'id' => $model->id]
                );
            }
        }

        // найти по slug страницы на других языках
        $langModels = Services::model()->findAll(
            'slug = :slug AND id != :id',
            [
                ':slug' => $model->slug,
                ':id' => $model->id
            ]
        );

        $this->render(
            'update',
            [
                'langModels' => CHtml::listData($langModels, 'lang', 'id'),
                'model' => $model,
                'languages' => $this->yupe->getLanguagesList(),
                'pages' => Services::model()->getFormattedList(),
                'galleryList' => $galleryList
            ]
        );
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param null $slug
     * @param integer $id the ID of the model to be deleted
     *
     * @throws CHttpException
     *
     * @return void
     */
    public function actionDelete($id = null)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {

            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('ServicesModule.services', 'Record was removed!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            Yii::app()->getRequest()->getParam('ajax') !== null || $this->redirect(
                (array)Yii::app()->getRequest()->getPost('returnUrl', 'index')
            );
        } else {
            throw new CHttpException(
                400,
                Yii::t('ServicesModule.services', 'Bad raquest. Please don\'t use similar requests anymore!')
            );
        }
    }

    /**
     * Manages all models.
     *
     * @return void
     */
    public function actionIndex()
    {
        $model = new Services('search');

        $model->unsetAttributes(); // clear any default values

        $model->setAttributes(
            Yii::app()->getRequest()->getParam(
                'Services',
                []
            )
        );

        $this->render('index', ['model' => $model]);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     *
     * @param integer the ID of the model to be loaded
     *
     * @return void
     *
     * @throws CHttpException If record not found
     */
    public function loadModel($id)
    {
        if (($model = Services::model()->findByPk($id)) === null) {
            throw new CHttpException(
                404,
                Yii::t('ServicesModule.services', 'Requested page was not found!')
            );
        }

        return $model;
    }
}
