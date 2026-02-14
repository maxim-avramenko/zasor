<div class="service__nav slide-left">
    <div class="service__title">
       <?= $parent->title ?>
    </div>
    <ul>
        <?php foreach ($models as $model) {
            $url = Yii::app()->createUrl('services/services/view', ['slug' => $model->slug]);
            ?>

            <li>
                <a href="<?= $url ?>">
                    <?= $model->title ?>
                </a>
            </li>
        <?php } ?>

    </ul>
</div>