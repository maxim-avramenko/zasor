<?php
class DeepMenuWidget extends CWidget
{
    public $id;
    
    public function run()
    {
        $menuItems = $this->getMenuItems($this->id);
        $this->render('deep_menu', ['items' => $menuItems]);
    }
    
    protected function getMenuItems($parentId = null)
    {
        $criteria = new CDbCriteria([
            'condition' => 't.status = :status AND t.parent_id = :parent_id',
            'params' => [
                ':status' => Page::STATUS_PUBLISHED,
                ':parent_id' => $parentId ?: 0
            ],
            'order' => 't.position ASC',
        ]);
        
        $pages = Page::model()->findAll($criteria);
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