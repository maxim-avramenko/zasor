<?php
/**
 * This is the model class for table "Page".
 *
 * The followings are the available columns in table 'Page':
 * @property integer $id
 * @property string $parent_id
 * @property string $create_time
 * @property string $update_time
 * @property string $date
 * @property string $title
 * @property string $title_short
 * @property string $slug
 * @property string $short_text
 * @property string $full_text
 * @property integer $user_id
 * @property integer $status
 * @property integer $is_protected
 * @property integer $is_service
 * @property string $link
 * @property string $image
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $meta_title
 *
 * @property string $preamble
 * @property string $body
 * @property string $text_3
 * @property string $text_4
 * @property string $text_5
 * @property Gallery $gallery *
 * @property-read Page $parent
 *
 *
 * @property string $view
 * @property string $layout
 */

Yii::import('application.modules.gallery.models.Gallery');

class Page extends yupe\models\YModel
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_MODERATION = 2;

    const PROTECTED_NO = 0;
    const PROTECTED_YES = 1;


    const SERVICE_NO = 0;
    const SERVICE_YES = 1;


    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{page_page}}';
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className
     * @return Page   the static model class
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
            ['title, title_short, slug, body, text_3,text_4, text_5, short_text, full_text, preamble, meta_keywords, meta_description', 'filter', 'filter' => 'trim'],
            ['title, title_short, slug, meta_keywords, meta_title, meta_description', 'filter', 'filter' => [new CHtmlPurifier(), 'purify']],
            ['date, title, slug, full_text', 'required', 'on' => ['update', 'insert']],
            ['status, is_protected, is_service, category_id, parent_id', 'numerical', 'integerOnly' => true],
            ['parent_id, category_id, one_gallery_id, two_gallery_id', 'default', 'setOnEmpty' => true, 'value' => null],
            ['title, title_short, slug, meta_keywords, view, layout', 'length', 'max' => 1024],
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
                'message' => Yii::t('PageModule.page', 'Bad characters in {attribute} field')
            ],
            ['category_id, one_gallery_id, two_gallery_id', 'default', 'setOnEmpty' => true, 'value' => null],
            [
                'id, parent_id, meta_keywords, meta_title, meta_description, create_time, update_time, date, title, title_short, slug, short_text, body, text_3,text_4, text_5, full_text, user_id, status, is_service, is_protected, lang, preamble',
                'safe',
                'on' => 'search'
            ],
        ];
    }

    public function behaviors()
    {
        $module = Yii::app()->getModule('page');

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
                'class' => 'page\components\behaviors\DCategoryTreeBehavior',
                'aliasAttribute' => 'slug',
                'requestPathAttribute' => 'path',
                'parentAttribute' => 'parent_id',
                'parentRelation' => 'parent',
                'titleAttribute' => 'title',
                'useCache' => false,
            ],

            'sortable' => [
                'class' => 'yupe\components\behaviors\SortableBehavior',
                'attributeName' => 'order',
            ],

        ];

    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [
            'childPages' => [self::HAS_MANY, 'Page', 'parent_id'],
            'parent' => [self::BELONGS_TO, 'Page', 'parent_id'],
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
            ],
            'service' => [
                'condition' => 't.is_service = :is_service',
                'params' => [':is_service' => self::PROTECTED_YES],
            ],
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
            'id' => Yii::t('PageModule.page', 'Id'),
            'parent_id' => Yii::t('PageModule.page', 'Parent'),
            'category_id' => Yii::t('PageModule.page', 'Category'),
            'create_time' => Yii::t('PageModule.page', 'Created at'),
            'update_time' => Yii::t('PageModule.page', 'Updated at'),
            'date' => Yii::t('PageModule.page', 'Date'),
            'title' => Yii::t('PageModule.page', 'Title'),
            'title_short' => Yii::t('PageModule.page', 'Title Short'),
            'slug' => Yii::t('PageModule.page', 'Alias'),
            'image' => Yii::t('PageModule.page', 'Image'),
            'link' => Yii::t('PageModule.page', 'Link'),
            'lang' => Yii::t('PageModule.page', 'Language'),
            'short_text' => Yii::t('PageModule.page', 'Short text'),
            'full_text' => Yii::t('PageModule.page', 'Full text'),
            'user_id' => Yii::t('PageModule.page', 'Author'),
            'status' => Yii::t('PageModule.page', 'Status'),
            'is_protected' => Yii::t('PageModule.page', 'Access only for authorized'),

            'is_service' => Yii::t('PageModule.page', 'Это услуга'),
            'meta_title' => Yii::t('PageModule.page', 'Заголовок для title'),
            'meta_keywords' => Yii::t('PageModule.page', 'Keywords (SEO)'),
            'meta_description' => Yii::t('PageModule.page', 'Description (SEO)'),

            'preamble' => Yii::t('PageModule.page', 'Преамбула'),
            'view' => Yii::t('PageModule.page', 'View'),
            'layout' => Yii::t('PageModule.page', 'Layout'),
            'one_gallery_id' => Yii::t('PageModule.service', 'Верхняя галлерея'),
            'two_gallery_id' => Yii::t('PageModule.service', 'Нижняя галлерея'),

            'body' => Yii::t('PageModule.page', 'Body'),
            'text_3' => Yii::t('PageModule.page', 'Третий текст'),
            'text_4' => Yii::t('PageModule.page', 'Четвертый текст'),
            'text_5' => Yii::t('PageModule.page', 'Пятый текст'),
            'order' => Yii::t('PageModule.page', 'Порядок сортировки'),

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

            $this->order = Yii::app()->db->createCommand()
                ->select('MAX(`order`) + 1')
                ->from($this->tableName())
                ->queryScalar();

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
        $criteria->compare('title_short', $this->title_short, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('short_text', $this->short_text, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('text_3', $this->text_3, true);
        $criteria->compare('text_4', $this->text_4, true);
        $criteria->compare('text_5', $this->text_5, true);
        $criteria->compare('full_text', $this->full_text, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('category_id', $this->category_id, true);
        $criteria->compare('is_protected', $this->is_protected);
        $criteria->compare('is_service', $this->is_service);
        $criteria->compare('t.lang', $this->lang);
        $criteria->with = ['category'];

        return new CActiveDataProvider(get_class($this), [
            'criteria' => $criteria,
            'sort' => ['defaultOrder' => 't.order DESC, t.date DESC'],

        ]);
    }

    public function getStatusList()
    {
        return [
            self::STATUS_DRAFT => Yii::t('PageModule.page', 'Draft'),
            self::STATUS_PUBLISHED => Yii::t('PageModule.page', 'Published'),
            self::STATUS_MODERATION => Yii::t('PageModule.page', 'On moderation'),
        ];
    }

    public function getStatus()
    {
        $data = $this->getStatusList();

        return isset($data[$this->status]) ? $data[$this->status] : Yii::t('PageModule.page', '*unknown*');
    }

    public function getProtectedStatusList()
    {
        return [
            self::PROTECTED_NO => Yii::t('PageModule.page', 'no'),
            self::PROTECTED_YES => Yii::t('PageModule.page', 'yes'),
        ];
    }


    public function getServiceStatusList()
    {
        return [
            self::SERVICE_NO => Yii::t('PageModule.page', 'no'),
            self::SERVICE_YES => Yii::t('PageModule.page', 'yes'),
        ];
    }

    public function getProtectedStatus()
    {
        $data = $this->getProtectedStatusList();

        return isset($data[$this->is_protected]) ? $data[$this->is_protected] : Yii::t('PageModule.page', '*unknown*');
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
