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
