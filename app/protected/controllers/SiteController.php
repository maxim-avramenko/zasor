<?php
/**
 * Дефолтный контроллер сайта:
 *
 * @category YupeController
 * @package  yupe.controllers
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD http://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_BSD
 * @version  0.5.3 (dev)
 * @link     https://yupe.ru
 *
 **/
namespace application\controllers;

use yupe\components\controllers\FrontController;

class SiteController extends FrontController
{
    public ?string $schema = null;

    /**
     * Отображение главной страницы
     *
     * @return void
     */
    public function actionIndex()
    {
        \Yii::import('application.components.UniversalAltHelper');
        \Yii::import('application.modules.gallery.models.ImageToGallery');
        \Yii::import('application.modules.gallery.models.Gallery');

        $yupe = \Yii::app()->getModule('yupe');
        $this->title = !empty($yupe->mainPageTitle) ? $yupe->mainPageTitle : $yupe->siteName;
        $this->description = !empty($yupe->mainPageDescription) ? $yupe->mainPageDescription : $yupe->siteDescription;
        $this->keywords = !empty($yupe->mainPageKeywords) ? $yupe->mainPageKeywords : $yupe->siteKeyWords;

        $servicePages = \Page::model()
            ->published()
            ->service()
            ->language(\Yii::app()->getLanguage())
            ->findAll(['order' => 't.order ASC, t.date DESC']);

        $portfolioPage = null;
        $portfolioGalleryImages = [];
        $homepageGallery2Images = [];
        if (\Yii::app()->hasModule('gallery')) {
            $portfolioPage = \Page::model()
                ->published()
                ->findByAttributes(['slug' => 'portfolio']);
            if ($portfolioPage && $portfolioPage->one_gallery_id) {
                $criteria = new \CDbCriteria([
                    'condition' => 't.gallery_id = :gallery_id',
                    'params' => [':gallery_id' => $portfolioPage->one_gallery_id],
                    'order' => 't.position DESC, t.id DESC',
                    'limit' => 5,
                    'with' => ['image'],
                ]);
                $portfolioGalleryImages = \ImageToGallery::model()->findAll($criteria);
            }

            $homepageGallery2 = \Gallery::model()->published()->findByAttributes(['name' => 'homepage-gallery-2']);
            if ($homepageGallery2) {
                $criteria2 = new \CDbCriteria([
                    'condition' => 't.gallery_id = :gallery_id',
                    'params' => [':gallery_id' => $homepageGallery2->id],
                    'order' => 't.position ASC, t.id ASC',
                    'limit' => 11,
                    'with' => ['image'],
                ]);
                $homepageGallery2Images = \ImageToGallery::model()->findAll($criteria2);
            }
        }

        $homepageDopContent = \Page::model()
            ->findByAttributes(['slug' => 'homepage-content']);

        $homepageImage1 = \Image::model()->findByAttributes(['name' => 'homepage-image-1']);
        $homepageImage2 = \Image::model()->findByAttributes(['name' => 'homepage-image-2']);

        $this->render('index', [
            'servicePages' => $servicePages,
            'portfolioPage' => $portfolioPage,
            'portfolioGalleryImages' => $portfolioGalleryImages,
            'homepageGallery2Images' => $homepageGallery2Images,
            'homepageDopContent' => $homepageDopContent,
            'homepageImage1' => $homepageImage1,
            'homepageImage2' => $homepageImage2,
        ]);
    }

    /**
     * Отображение для ошибок:
     *
     * @return void
     */
    public function actionError()
    {
        $error = \Yii::app()->errorHandler->error;

        if (empty($error) || !isset($error['code']) || !(isset($error['message']) || isset($error['msg']))) {
            $this->redirect(['index']);
        }

        if (!\Yii::app()->getRequest()->getIsAjaxRequest()) {

            $this->render(
                'error',
                [
                    'error' => $error
                ]
            );
        }
    }
}
