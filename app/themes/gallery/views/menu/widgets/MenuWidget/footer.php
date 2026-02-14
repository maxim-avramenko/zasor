



<nav class="wrap-nav" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
    <div class="nav-title">
        Меню
    </div>
    <ul class="menu" itemscope itemtype="https://schema.org/ItemList">

        <?php foreach ($this->params['items'] as $item): ?>
            <?php if ($item['visible']): ?>
                <li class="menu-item">
                    <?= CHtml::link(CHtml::encode($item['label']), $item['url']); ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

    </ul>
</nav>
