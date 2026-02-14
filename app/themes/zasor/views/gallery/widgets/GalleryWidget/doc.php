<?php
$this->widget(
    'zii.widgets.CListView',
    [
        'dataProvider' => $dataProvider,
        'itemView' => '_image',
        'template' => "{items}",
        'itemsCssClass' => 'portfolio__wp',
        'enableHistory' => true,
        'cssFile' => false,
    ]
); ?>

<?php
$dataProvider->getData();
$pages = $dataProvider->getPagination();

$this->widget('CLinkPager', array(
    'pages' => $pages,
    'firstPageLabel' => false,
    'header' => false,
    'prevPageLabel' => '<span class="icon-arrow-right"></span>',
    'nextPageLabel' => '<span class="icon-arrow-right"></span>',
    'lastPageLabel' => false,
    'maxButtonCount' => 5,
    'selectedPageCssClass' => 'active',
    'htmlOptions' => [
        'class' => 'pagination',
    ]
))
?>