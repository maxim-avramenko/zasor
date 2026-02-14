<?php

/**
 * ServicesModule основной класс модуля services
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2015 amyLabs && Yupe! team
 * @package yupe.modules.services
 * @since 0.1
 *
 */

use yupe\components\WebModule;

/**
 * Class ServicesModule
 */
class ServicesModule extends WebModule
{
    /**
     *
     */
    const VERSION = '1.0';

    /**
     * @var string
     */
    public $uploadPath = 'services';
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
                    'ServicesModule.services',
                    'Directory "{dir}" is not accessible for write! {link}',
                    [
                        '{dir}' => $uploadPath,
                        '{link}' => CHtml::link(
                            Yii::t('ServicesModule.services', 'Change settings'),
                            [
                                '/yupe/backend/modulesettings/',
                                'module' => 'services',
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
            'mainCategory' => Yii::t('ServicesModule.services', 'Main services category'),
            'editor' => Yii::t('ServicesModule.services', 'Visual Editor'),
            'uploadPath' => Yii::t(
                'ServicesModule.services',
                'Uploading files catalog (relatively {path})',
                [
                    '{path}' => Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.Yii::app()->getModule(
                            "yupe"
                        )->uploadPath,
                ]
            ),
            'allowedExtensions' => Yii::t('ServicesModule.services', 'Accepted extensions (separated by comma)'),
            'minSize' => Yii::t('ServicesModule.services', 'Minimum size (in bytes)'),
            'maxSize' => Yii::t('ServicesModule.services', 'Maximum size (in bytes)'),
            'rssCount' => Yii::t('ServicesModule.services', 'RSS records'),
            'perPage' => Yii::t('ServicesModule.services', 'Services per page'),
            'metaKeywords' => Yii::t('ServicesModule.services', 'metaKeywords'),
            'metaDescription' => Yii::t('ServicesModule.services', 'metaDescription'),
            'metaTitle' => Yii::t('ServicesModule.services', 'metaTitle'),
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
                'label' => Yii::t('ServicesModule.services', 'General module settings'),
                'items' => [
                    'editor',
                    'mainCategory',
                ],
            ],
            'images' => [
                'label' => Yii::t('ServicesModule.services', 'Images settings'),
                'items' => [
                    'uploadPath',
                    'allowedExtensions',
                    'minSize',
                    'maxSize',
                ],
            ],
            'list' => [
                'label' => Yii::t('ServicesModule.services', 'Services lists'),
                'items' => [
                    'rssCount',
                    'perPage',
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
        return Yii::t('ServicesModule.services', 'Content');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Yii::t('ServicesModule.services', 'Services');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return Yii::t('ServicesModule.services', 'Module for creating and management services');
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return Yii::t('ServicesModule.services', 'yupe team');
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return Yii::t('ServicesModule.services', 'team@yupe.ru');
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return Yii::t('ServicesModule.services', 'http://yupe.ru');
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
        return '/services/servicesBackend/index';
    }

    /**
     * @return array
     */
    public function getNavigation()
    {
        return [
            [
                'icon' => 'fa fa-fw fa-list-alt',
                'label' => Yii::t('ServicesModule.services', 'Services list'),
                'url' => ['/services/servicesBackend/index'],
            ],
            [
                'icon' => 'fa fa-fw fa-plus-square',
                'label' => Yii::t('ServicesModule.services', 'Create services'),
                'url' => ['/services/servicesBackend/create'],
            ],
            [
                'icon' => 'fa fa-fw fa-folder-open',
                'label' => Yii::t('ServicesModule.services', 'Services categories'),
                'url' => ['/category/categoryBackend/index', 'Category[parent_id]' => (int)$this->mainCategory],
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
                'services.models.*',
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
                'name' => 'Services.ServicesManager',
                'description' => Yii::t('ServicesModule.services', 'Manage services'),
                'type' => AuthItem::TYPE_TASK,
                'items' => [
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Services.ServicesBackend.Create',
                        'description' => Yii::t('ServicesModule.services', 'Creating services'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Services.ServicesBackend.Delete',
                        'description' => Yii::t('ServicesModule.services', 'Removing services'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Services.ServicesBackend.Index',
                        'description' => Yii::t('ServicesModule.services', 'List of services'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Services.ServicesBackend.Update',
                        'description' => Yii::t('ServicesModule.services', 'Editing services'),
                    ],
                    [
                        'type' => AuthItem::TYPE_OPERATION,
                        'name' => 'Services.ServicesBackend.View',
                        'description' => Yii::t('ServicesModule.services', 'Viewing services'),
                    ],
                ],
            ],
        ];
    }
}
