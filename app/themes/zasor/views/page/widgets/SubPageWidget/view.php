<ul>
    <?php foreach ($models as $model) {
        $url = Yii::app()->createUrl('page/page/view', ['slug' => $model->slug]);
        ?>
        <li>
            <a href="<?= $url ?>">
                <?= $model->title ?>
            </a>
        </li>
    <?php } ?>
</ul>