<div itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
<ul class="menu" itemscope itemtype="https://schema.org/ItemList">
    <?php foreach ($this->params['items'] as $item): ?>
        <?php if ($item['visible']): ?>
            <?php if ($item['items']) { ?>
                <li class="menu-item has-child">
                    <?= CHtml::link(CHtml::encode($item['label']), $item['url'], ['class' => 'menu-link', 'title' => $item['linkOptions']['title']]); ?>
                    
                    <?php if ($item['items']): ?>
                        <ul class="sub-menu">
                            <?php foreach ($item['items'] as $it): ?>
                                <li class="sub-item <?= ($it['items']) ? 'has-child' : '' ?>">
                                    <?= CHtml::link(CHtml::encode($it['label']), $it['url'], ['class' => 'sub-link', 'title' => $it['linkOptions']['title']]); ?>
                                    
                                    <?php if ($it['items']) { ?>
                                        <ul class="sub-sub-menu">
                                            <?php foreach ($it['items'] as $itt) { ?>
                                                <li class="sub-sub-item <?= ($itt['items']) ? 'has-child' : '' ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                                    <?= CHtml::link(CHtml::encode($itt['label']), $itt['url'], ['class' => 'sub-sub-link', 'title' => $itt['linkOptions']['title']]); ?>
                                                    
                                                    <?php if ($itt['items']) { ?>
                                                        <ul class="sub-sub-sub-menu">
                                                            <?php foreach ($itt['items'] as $ittt) { ?>
                                                                <li class="sub-sub-sub-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                                                    <?= CHtml::link(CHtml::encode($ittt['label']), $ittt['url'], ['class' => 'sub-sub-sub-link', 'title' => $ittt['linkOptions']['title']]); ?>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php } else { ?>
                <li class="menu-item" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                    <?= CHtml::link(CHtml::encode($item['label']), $item['url'], ['class' => 'menu-link', 'title' => $item['linkOptions']['title']]); ?>
                </li>
            <?php } ?>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
</div>