<?php $this->widget(
    'yupe.widgets.YBreadcrumbs',
    [
        'links' => isset($breadcrumbs) ? $breadcrumbs : $this->breadcrumbs,
        'tagName' => 'div',
        'htmlOptions' => ['class' => 'breadcrumbs'],
        'separator' => '',
        'activeLinkTemplate' => '
                    <span>
                        <a href="{url}" title="{label}" >{label}</a>
                    </span> ',
        'inactiveLinkTemplate' => '<span>{label}</span>',
        'encodeLabel' => false
    ]
); ?>
