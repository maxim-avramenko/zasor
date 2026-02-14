<?php

Yii::import('application.modules.page.models.*');

class DeepMenuWidget extends yupe\widgets\YWidget
{
    public $id = null;
    public $view = 'deep_menu';

    public function run()
    {
        $menuItems = $this->getMenuItems($this->id);
        
        // Явно указываем путь к представлению в теме
        $viewPath = Yii::app()->theme->basePath . '/views/page/widgets/' . $this->view . '.php';
        $this->renderFile($viewPath, ['items' => $menuItems]);
    }
    
    protected function getMenuItems($parentId = null)
    {
        $criteria = new CDbCriteria([
            'condition' => 't.status = :status AND t.parent_id = :parent_id',
            'params' => [
                ':status' => Page::STATUS_PUBLISHED,
                ':parent_id' => $parentId ?: 0
            ],
            'order' => 't.order ASC',
        ]);
        
        $pages = Page::model()->published()->findAll($criteria);
        $items = [];
        
        foreach ($pages as $page) {
            $item = [
                'label' => $page->title,
                'url' => Yii::app()->createUrl('page/page/view', ['slug' => $page->slug]),
                'items' => $this->getMenuItems($page->id),
                'visible' => true,
            ];
            $items[] = $item;
        }
        
        return $items;
    }
}