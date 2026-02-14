<?php
/**
 * Services основная моделька для новостей
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2013 amyLabs && Yupe! team
 * @package yupe.modules.services.models
 * @since 0.1
 *
 */

/**
 * This is the model class for table "Services".
 *
 * The followings are the available columns in table 'Services':
 * @property integer $id
 * @property string $parent_id
 * @property string $create_time
 * @property string $update_time
 * @property string $date
 * @property string $title
 * @property string $slug
 * @property string $short_text
 * @property string $full_text
 * @property integer $user_id
 * @property integer $status
 * @property integer $is_protected
 * @property string $link
 * @property string $image
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $meta_title
 *
 * @property string $preamble
 * @property string $text_3
 * @property string $text_4
 * @property string $text_5

 *
 * @property Gallery $gallery *
 * @property-read Services $parent
 *
 *
 * @property string $view
 */

Yii::import('application.modules.gallery.models.Gallery');

class Services extends yupe\models\YModel
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_MODERATION = 2;

    const PROTECTED_NO = 0;
    const PROTECTED_YES = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{services_services}}';
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className
     * @return Services   the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return [
            ['title, slug, text_3,text_4, text_5, short_text, full_text, preamble, meta_keywords, meta_description', 'filter', 'filter' => 'trim'],
            ['title, slug, meta_keywords, meta_title, meta_description', 'filter', 'filter' => [new CHtmlPurifier(), 'purify']],
            ['date, title, slug, full_text', 'required', 'on' => ['update', 'insert']],
            ['status, is_protected, category_id, parent_id', 'numerical', 'integerOnly' => true],
            ['parent_id, category_id, one_gallery_id, two_gallery_id', 'default', 'setOnEmpty' => true, 'value' => null],
            ['title, slug, meta_keywords, view', 'length', 'max' => 1024],
            ['lang', 'length', 'max' => 2],
            ['lang', 'default', 'value' => Yii::app()->sourceLanguage],
            ['lang', 'in', 'range' => array_keys(Yii::app()->getModule('yupe')->getLanguagesList())],
            ['status', 'in', 'range' => array_keys($this->getStatusList())],
            ['slug', 'yupe\components\validators\YUniqueSlugValidator'],
            ['meta_description', 'length', 'max' => 1024],
            ['link', 'length', 'max' => 250],
            ['link', 'yupe\components\validators\YUrlValidator'],
            [
                'slug',
                'yupe\components\validators\YSLugValidator',
                'message' => Yii::t('ServicesModule.services', 'Bad characters in {attribute} field')
            ],
            ['category_id, one_gallery_id, two_gallery_id', 'default', 'setOnEmpty' => true, 'value' => null],
            [
                'id, parent_id, meta_keywords, meta_title, meta_description, create_time, update_time, date, title, slug, short_text, text_3,text_4, text_5, full_text, user_id, status, is_protected, lang, preamble',
                'safe',
                'on' => 'search'
            ],
        ];
    }

    public function behaviors()
    {
        $module = Yii::app()->getModule('services');

        return [
            'imageUpload' => [
                'class' => 'yupe\components\behaviors\ImageUploadBehavior',
                'attributeName' => 'image',
                'minSize' => $module->minSize,
                'maxSize' => $module->maxSize,
                'types' => $module->allowedExtensions,
                'uploadPath' => $module->uploadPath,
            ],
            'tree' => [
                'class' => 'services\components\behaviors\DCategoryTreeBehavior',
                'aliasAttribute' => 'slug',
                'requestPathAttribute' => 'path',
                'parentAttribute' => 'parent_id',
                'parentRelation' => 'parent',
                'titleAttribute' => 'title',
                'useCache' => false,
            ],
        ];

    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [
            'childPages' => [self::HAS_MANY, 'Services', 'parent_id'],
            'parent' => [self::BELONGS_TO, 'Services', 'parent_id'],
            'category' => [self::BELONGS_TO, 'Category', 'category_id'],
            'user' => [self::BELONGS_TO, 'User', 'user_id'],
        ];
    }

    public function scopes()
    {
        return [
            'published' => [
                'condition' => 't.status = :status',
                'params' => [':status' => self::STATUS_PUBLISHED],
            ],
            'protected' => [
                'condition' => 't.is_protected = :is_protected',
                'params' => [':is_protected' => self::PROTECTED_YES],
            ],
            'public' => [
                'condition' => 't.is_protected = :is_protected',
                'params' => [':is_protected' => self::PROTECTED_NO],
            ],
            'recent' => [
                'order' => 'create_time DESC',
                'limit' => 5,
            ]
        ];
    }

    public function last($num)
    {
        $this->getDbCriteria()->mergeWith(
            [
                'order' => 'date DESC',
                'limit' => $num,
            ]
        );

        return $this;
    }

    public function language($lang)
    {
        $this->getDbCriteria()->mergeWith(
            [
                'condition' => 'lang = :lang',
                'params' => [':lang' => $lang],
            ]
        );

        return $this;
    }

    public function category($category_id)
    {
        $this->getDbCriteria()->mergeWith(
            [
                'condition' => 'category_id = :category_id',
                'params' => [':category_id' => $category_id],
            ]
        );

        return $this;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ServicesModule.services', 'Id'),
            'parent_id' => Yii::t('ServicesModule.services', 'Parent'),
            'category_id' => Yii::t('ServicesModule.services', 'Category'),
            'create_time' => Yii::t('ServicesModule.services', 'Created at'),
            'update_time' => Yii::t('ServicesModule.services', 'Updated at'),
            'date' => Yii::t('ServicesModule.services', 'Date'),
            'title' => Yii::t('ServicesModule.services', 'Title'),
            'slug' => Yii::t('ServicesModule.services', 'Alias'),
            'image' => Yii::t('ServicesModule.services', 'Image'),
            'link' => Yii::t('ServicesModule.services', 'Link'),
            'lang' => Yii::t('ServicesModule.services', 'Language'),
            'short_text' => Yii::t('ServicesModule.services', 'Short text'),
            'full_text' => Yii::t('ServicesModule.services', 'Full text'),
            'user_id' => Yii::t('ServicesModule.services', 'Author'),
            'status' => Yii::t('ServicesModule.services', 'Status'),
            'is_protected' => Yii::t('ServicesModule.services', 'Access only for authorized'),
            'meta_title' => Yii::t('ServicesModule.services', 'Заголовок для title'),
            'meta_keywords' => Yii::t('ServicesModule.services', 'Keywords (SEO)'),
            'meta_description' => Yii::t('ServicesModule.services', 'Description (SEO)'),

            'preamble' => Yii::t('ServicesModule.services', 'Преамбула'),
            'view' => Yii::t('ServicesModule.services', 'View'),
            'one_gallery_id' => Yii::t('ServicesModule.service', 'Верхняя галлерея'),
            'two_gallery_id' => Yii::t('ServicesModule.service', 'Нижняя галлерея'),

            'text_3' => Yii::t('ServicesModule.services', 'Третий текст'),
            'text_4' => Yii::t('ServicesModule.services', 'Четвертый текст'),
            'text_5' => Yii::t('ServicesModule.services', 'Пятый текст'),

        ];
    }

    public function beforeValidate()
    {
        if (!$this->slug) {
            $this->slug = yupe\helpers\YText::translit($this->title);
        }

        if (!$this->lang) {
            $this->lang = Yii::app()->getLanguage();
        }

        return parent::beforeValidate();
    }

    public function beforeSave()
    {
        $this->update_time = new CDbExpression('NOW()');
        $this->date = date('Y-m-d', strtotime($this->date));

        if ($this->isNewRecord) {
            $this->create_time = $this->update_time;
            $this->user_id = Yii::app()->getUser()->getId();
        }

        return parent::beforeSave();
    }

    public function afterFind()
    {
        $this->date = date('d-m-Y', strtotime($this->date));

        return parent::afterFind();
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria();

        $criteria->compare('t.id', $this->id);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        if ($this->date) {
            $criteria->compare('date', date('Y-m-d', strtotime($this->date)));
        }
        $criteria->compare('title', $this->title, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('short_text', $this->short_text, true);
        $criteria->compare('text_3', $this->text_3, true);
        $criteria->compare('text_4', $this->text_4, true);
        $criteria->compare('text_5', $this->text_5, true);
        $criteria->compare('full_text', $this->full_text, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('is_protected', $this->is_protected);
        $criteria->compare('t.lang', $this->lang);
        $criteria->with = ['category'];

        return new CActiveDataProvider(get_class($this), [
            'criteria' => $criteria,
            'sort' => ['defaultOrder' => 'date DESC'],
        ]);
    }

    public function getStatusList()
    {
        return [
            self::STATUS_DRAFT => Yii::t('ServicesModule.services', 'Draft'),
            self::STATUS_PUBLISHED => Yii::t('ServicesModule.services', 'Published'),
            self::STATUS_MODERATION => Yii::t('ServicesModule.services', 'On moderation'),
        ];
    }

    public function getStatus()
    {
        $data = $this->getStatusList();

        return isset($data[$this->status]) ? $data[$this->status] : Yii::t('ServicesModule.services', '*unknown*');
    }

    public function getProtectedStatusList()
    {
        return [
            self::PROTECTED_NO => Yii::t('ServicesModule.services', 'no'),
            self::PROTECTED_YES => Yii::t('ServicesModule.services', 'yes'),
        ];
    }

    public function getProtectedStatus()
    {
        $data = $this->getProtectedStatusList();

        return isset($data[$this->is_protected]) ? $data[$this->is_protected] : Yii::t('ServicesModule.services', '*unknown*');
    }

    public function getCategoryName()
    {
        return ($this->category === null) ? '---' : $this->category->name;
    }

    public function getFlag()
    {
        return yupe\helpers\YText::langToflag($this->lang);
    }

    /**
     * @return mixed
     * @deprecated
     */
    public function getPermaLink()
    {
        return $this->getUrl();
    }


    public function getFormattedList($parentId = null, $level = 0, $criteria = null)
    {
        if (empty($parentId)) {
            $parentId = null;
        }

        $models = $this->findAllByAttributes(['parent_id' => $parentId], $criteria);

        $list = [];

        foreach ($models as $model) {

            $model->title = str_repeat('&emsp;', $level) . $model->title;

            $list[$model->id] = $model->title;

            $list = CMap::mergeArray($list, $this->getFormattedList($model->id, $level + 1, $criteria));
        }

        return $list;
    }


    public function getParentName()
    {
        return ($this->parent === null) ? '---' : $this->parent->title;
    }

}
