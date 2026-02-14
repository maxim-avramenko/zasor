<?php

/**
 * PageModule основной класс модуля page
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2015 amyLabs && Yupe! team
 * @package yupe.modules.page
 * @since 0.1
 *
 */

use yupe\components\WebModule;

/**
 * Class PageModule
 */
class PageModule extends WebModule
{
    /**
     *
     */
    const VERSION = '1.0';

    /**
     * @var string
     */
    public $uploadPath = 'page';
    /**
     * @var string
     */
    public $allowedExtensions = 'jpg,jpeg,png,gif';
    /**
     * @var int
     */
    public $minSize = 0;
    /**
     * @var int
     */
    public $maxSize = 5368709120;
    /**
     * @var int
     */
    public $maxFiles = 1;
    /**
     * @var int
     */
    public $rssCount = 10;

    public $metaKeywords = '';

    public $metaDescription = '';
    public $metaTitle = '';
    /**
     * @var int
     */
    public $perPage = 10;

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [
            'user',
            'category',
        ];
    }

    /**
     * @return bool
     */
    public function getInstall()
    {
        if (parent::getInstall()) {
            @mkdir(Yii::app()->uploadManager->getBasePath().DIRECTORY_SEPARATOR.$this->uploadPath, 0755);
        }

        return false;
    }

    /**
     * @return array|bool
     */
    public function checkSelf()
    {
        $messages = [];

        $uploadPath = Yii::app()->uploadManager->getBasePath().DIRECTORY_SEPARATOR.$this->uploadPath;

        if (!is_writable($uploadPath)) {
            $messages[WebModule::CHECK_ERROR][] = [
                'type' => WebModule::CHECK_ERROR,
                'message' => Yii::t(
                    'PageModule.page',
                    'Directory "{dir}" is not accessible for write! {link}',
                    [
                        '{dir}' => $uploadPath,
                        '{link}' => CHtml::link(
                            Yii::t('PageModule.page', 'Change settings'),
                            [
                                '/yupe/backend/modulesettings/',
                                'module' => 'page',
                            ]
                        ),
                    ]
                ),
            ];
        }

        return (isset($messages[WebModule::CHECK_ERROR])) ? $messages : true;
    }

    /**
     * @return array
     */
    public function getParamsLabels()
    {
        return [
            'mainCategory' => Yii::t('PageModule.page', 'Main page category'),
            'editor' => Yii::t('PageModule.page', 'Visual Editor'),
            'uploadPath' => Yii::t(
                'PageModule.page',
                'Uploading files catalog (relatively {path})',
                [
                    '{path}' => Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.Yii::app()->getModule(
                            "yupe"
                        )->uploadPath,
                ]
            ),
            'allowedExtensions' => Yii::t('PageModule.page', 'Accepted extensions (separated by comma)'),
            'minSize' => Yii::t('PageModule.page', 'Minimum size (in bytes)'),
            'maxSize' => Yii::t('PageModule.page', 'Maximum size (in bytes)'),
            'rssCount' => Yii::t('PageModule.page', 'RSS records'),
            'perPage' => Yii::t('PageModule.page', 'Page per page'),
            'metaKeywords' => Yii::t('PageModule.page', 'metaKeywords'),
            'metaDescription' => Yii::t('PageModule.page', 'metaDescription'),
            'metaTitle' => Yii::t('PageModule.page', 'metaTitle'),
        ];
    }

    /**
     * @return array
     */
    public function getEditableParams()
    {
        return [
            'editor' => Yii::app()->getModule('yupe')->getEditors(),
            'mainCategory' => CHtml::listData($this->getCategoryList(), 'id', 'name'),
            'uploadPath',
            'allowedExtensions',
            'minSize',
            'maxSize',
            'rssCount',
            'perPage',
            'metaKeywords',
            'metaDescription',
            'metaTitle',
        ];
    }

    /**
     * @return array
     */
    public function getEditableParamsGroups()
    {
        return [
            'main' => [
                'label' => Yii::t('PageModule.page', 'General module settings'),
                'items' => [
                    'editor',
                    'mainCategory',
                ],
            ],
            'images' => [
                'label' => Yii::t('PageModule.page', 'Images settings'),
                'items' => [
                    'uploadPath',
                    'allowedExtensions',
                    'minSize',
                    'maxSize',
                ],
            ],
            'list' => [
                'label' => Yii::t('PageModule.page', 'Page lists'),
                'items' => [
                    'rssCount',
                    'perPage',
                ],
            ],
            'seo' => [
                'label' => Yii::t('PageModule.page', 'Мета данные для страницы /service'),
                'items' => [
                    'metaTitle',
                    'metaDescription',
                    'metaKeywords',
                ],
            ],

        ];
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::VERSION;
    }

    /**
     * @return bool
     */
    public function getIsInstallDefault()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return Yii::t('PageModule.page', 'Content');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Yii::t('PageModule.page', 'Page');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return Yii::t('PageModule.page', 'Module for creating and management page');
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return Yii::t('PageModule.page', 'yupe team');
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return Yii::t('PageModule.page', 'team@yupe.ru');
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return Yii::t('PageModule.page', 'http://yupe.ru');
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-fw fa-bullhorn';
    }

    /**
     * @return string
     */
    public function getAdminPageLink()
    {
        return '/page/pageBackend/index';
    }

    /**
     * @return array
     */
    public function getNavigation()
    {
        return [
            [
                'icon' => 'fa fa-fw fa-list-alt',
                'label' => Yii::t('PageModule.page', 'Список страниц'),
                'url' => ['/page/pageBackend/index'],
            ],
            [
                'icon' => 'fa fa-fw fa-plus-square',
                'label' => Yii::t('PageModule.page', 'Create page'),
                'url' => ['/page/pageBackend/create'],
            ],

        ];
    }

    /**
     * @return bool
     */
    public function isMultiLang()
    {
        return true;
    }

    /**
     *
     */
    public function init()
    {
        parent::init();

        $this->setImport(
            [
                'page.models.*',
            ]
        );
    }

    /**
     * @return array
     */
    public function getAuthItems()
    {
        return [
            [
                'name' => 'Page.PageManager',
                'description' => Yii::t('PageModule.page', 'Manage page'),
                'type' => AuthItem::TYPE_TASK,
                'items' => [
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Page.PageBackend.Create',
                        'description' => Yii::t('PageModule.page', 'Creating page'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Page.PageBackend.Delete',
                        'description' => Yii::t('PageModule.page', 'Removing page'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Page.PageBackend.Index',
                        'description' => Yii::t('PageModule.page', 'List of page'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Page.PageBackend.Update',
                        'description' => Yii::t('PageModule.page', 'Editing page'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Page.PageBackend.View',
                        'description' => Yii::t('PageModule.page', 'Viewing page'),
                    ],
                ],
            ],
        ];
    }
}
