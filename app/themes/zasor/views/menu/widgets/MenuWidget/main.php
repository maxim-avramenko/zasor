<menu class="menu">
    <div class="container">
        <nav class="wrap-nav">
            <div class="close-nav">
                <span class="icon-close"></span>
            </div>
            <?php if ($this->params['items']) { ?>
                <ul class="menu topmenu">
                    <?php foreach ($this->params['items'] as $item): ?>
                        <?php if ($item['visible']): ?>
                            <?php if ($item['items']) { ?>
                                <li class="menu-item has-child">
                                    <?= CHtml::link(CHtml::encode($item['label']), $item['url'], ['class' => 'menu-link', 'title' => '']); ?>

                                    <?php if ($item['items']): ?>
                                        <ul class="sub-menu">
                                            <?php foreach ($item['items'] as $it): ?>
                                                <li class="sub-item <?= ($it['items']) ? 'has-child' : '' ?>">
                                                    <?= CHtml::link(CHtml::encode($it['label']), $it['url'], ['class' => 'sub-link', 'title' => '']); ?>

                                                    <?php if ($it['items']) { ?>
                                                        <ul class="sub-sub-menu">
                                                            <?php foreach ($it['items'] as $itt) { ?>
                                                                <li class="sub-sub-item <?= ($itt['items']) ? 'has-child' : '' ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                                                    <?= CHtml::link(CHtml::encode($itt['label']), $itt['url'], ['class' => 'sub-sub-link', 'title' => '']); ?>

                                                                    <?php if ($itt['items']) { ?>
                                                                        <ul class="sub-sub-sub-menu">
                                                                            <?php foreach ($itt['items'] as $ittt) { ?>
                                                                                <li class="sub-sub-sub-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                                                                    <?= CHtml::link(CHtml::encode($ittt['label']), $ittt['url'], ['class' => 'sub-sub-sub-link', 'title' => '']); ?>
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
                                <li class="menu-item">
                                    <?= CHtml::link(CHtml::encode($item['label']), $item['url'], ['class' => 'menu-link', 'title' => '']); ?>
                                </li>
                            <?php } ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php } ?>
        </nav>
        <div class="open-nav">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
        <div class="overlay"></div>
    </div>
</menu>


<?php /* ?>
<ul class="menu" itemscope itemtype="https://schema.org/ItemList">
    <?php foreach ($this->params['items'] as $item): ?>
        <?php if ($item['visible']): ?>
            <?php if ($item['items']) { ?>
                <li class="menu-item has-child">
                    <?= CHtml::link(CHtml::encode($item['label']), $item['url'], ['class' => 'menu-link', 'title' => '']); ?>
                    
                    <?php if ($item['items']): ?>
                        <ul class="sub-menu">
                            <?php foreach ($item['items'] as $it): ?>
                                <li class="sub-item <?= ($it['items']) ? 'has-child' : '' ?>">
                                    <?= CHtml::link(CHtml::encode($it['label']), $it['url'], ['class' => 'sub-link', 'title' => '']); ?>
                                    
                                    <?php if ($it['items']) { ?>
                                        <ul class="sub-sub-menu">
                                            <?php foreach ($it['items'] as $itt) { ?>
                                                <li class="sub-sub-item <?= ($itt['items']) ? 'has-child' : '' ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                                    <?= CHtml::link(CHtml::encode($itt['label']), $itt['url'], ['class' => 'sub-sub-link', 'title' => '']); ?>
                                                    
                                                    <?php if ($itt['items']) { ?>
                                                        <ul class="sub-sub-sub-menu">
                                                            <?php foreach ($itt['items'] as $ittt) { ?>
                                                                <li class="sub-sub-sub-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ItemList">
                                                                    <?= CHtml::link(CHtml::encode($ittt['label']), $ittt['url'], ['class' => 'sub-sub-sub-link', 'title' => '']); ?>
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
                    <?= CHtml::link(CHtml::encode($item['label']), $item['url'], ['class' => 'menu-link', 'title' => '']); ?>
                </li>
            <?php } ?>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
</div>
 <?php */ ?>