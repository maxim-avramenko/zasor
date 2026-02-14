<div class="service-deep-menu">
    <?php if (!empty($items)): ?>
        <ul class="deep-menu-level-1">
            <?php foreach ($items as $item): ?>
                <?php if ($item['visible']): ?>
                    <li class="deep-menu-item level-1 <?= !empty($item['items']) ? 'has-children' : '' ?>">
                        <?= CHtml::link(
                            CHtml::encode($item['label']), 
                            $item['url'],
                            ['class' => 'deep-menu-link level-1']
                        ) ?>
                        
                        <?php if (!empty($item['items'])): ?>
                            <ul class="deep-menu-level-2">
                                <?php foreach ($item['items'] as $subItem): ?>
                                    <li class="deep-menu-item level-2 <?= !empty($subItem['items']) ? 'has-children' : '' ?>">
                                        <?= CHtml::link(
                                            CHtml::encode($subItem['label']), 
                                            $subItem['url'],
                                            ['class' => 'deep-menu-link level-2']
                                        ) ?>
                                        
                                        <?php if (!empty($subItem['items'])): ?>
                                            <ul class="deep-menu-level-3">
                                                <?php foreach ($subItem['items'] as $subSubItem): ?>
                                                    <li class="deep-menu-item level-3 <?= !empty($subSubItem['items']) ? 'has-children' : '' ?>">
                                                        <?= CHtml::link(
                                                            CHtml::encode($subSubItem['label']), 
                                                            $subSubItem['url'],
                                                            ['class' => 'deep-menu-link level-3']
                                                        ) ?>
                                                        
                                                        <?php if (!empty($subSubItem['items'])): ?>
                                                            <ul class="deep-menu-level-4">
                                                                <?php foreach ($subSubItem['items'] as $subSubSubItem): ?>
                                                                    <li class="deep-menu-item level-4">
                                                                        <?= CHtml::link(
                                                                            CHtml::encode($subSubSubItem['label']), 
                                                                            $subSubSubItem['url'],
                                                                            ['class' => 'deep-menu-link level-4']
                                                                        ) ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>