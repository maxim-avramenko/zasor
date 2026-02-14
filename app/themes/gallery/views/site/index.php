<?php
$this->title = Yii::app()->getModule('yupe')->siteName;
$this->description = Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = Yii::app()->getModule('yupe')->siteKeyWords;

$this->canonical = $this->createAbsoluteUrl(Yii::app()->request->getPathInfo());

?>

<main>
    <div class="homescreen">
        <div class="container">
            <div class="homescreen__text">
                <div class="homescreen__title slide-left">
                    <h1>
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget(
                            'application.modules.contentblock.widgets.ContentBlockWidget',
                            ['code' => 'homescreen__title']
                        ); ?>
                    <?php endif; ?>
                    </h1>
                </div>
                <p class="slide-left">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget(
                            'application.modules.contentblock.widgets.ContentBlockWidget',
                            ['code' => 'slide-left']
                        ); ?>
                    <?php endif; ?>
                </p>
                <div class="homescreen__tel slide-left">
                    <div class="homescreen__tel_text">
                        Звоните<span>!</span>
                    </div>
                    <?php if (Yii::app()->getModule('yupe')->companyPhone) {
                        $cleanPhone = yupe\helpers\YTel::cleanPh(Yii::app()->getModule('yupe')->companyPhone);;
                        ?>
                        <a href="tel:<?= $cleanPhone ?>"><?= Yii::app()->getModule('yupe')->companyPhone ?></a>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>

    <div class="reviews">
        <div class="container">
            <div class="reviews__title slide-left">
                Отзывы
            </div>
            <div class="reviews__wp">
                <div class="reviews__item slide-up">
                    <a href="https://go.2gis.com/oq1ifq" target="_blank" title="Отзывы на 2Gis">
                        <div class="reviews__icon">
                            <img src="/web/img/reviews/2gis.webp" alt="">
                        </div>
                    </a>
                    <div class="reviews__rate">
                        <p>Рейтинг: 5/5</p>
                        <div class="reviews__stars">
                    <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                        </div>
                    </div>
                </div>
                <!--<div class="reviews__item slide-up">
                     <a href="https://maps.app.goo.gl/zLA2vVeUhF57kMXx9" target="_blank" title="Отзывы на Google">
                        <div class="reviews__icon">
                            <img src="/web/img/reviews/2.png" alt="">
                        </div>
                    </a>
                    <div class="reviews__rate">
                        <p>Рейтинг: 4/5</p>
                        <div class="reviews__stars">
                    <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star-epmty.png" alt="">
                    </span>
                        </div>
                    </div>
                </div> -->
                <div class="reviews__item slide-up">
                    <a href="https://yandex.ru/profile/1073138182" target="_blank" title="Отзывы на Yndex">
                        <div class="reviews__icon">
                            <img src="/web/img/reviews/3.png" alt="">
                        </div>
                    </a>
                    <div class="reviews__rate">
                        <p>Рейтинг: 4.9/5</p>
                        <div class="reviews__stars">
                    <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                            <span>
                        <img src="/web/img/icons/star.png" alt="">
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clients">
        <div class="container">
            <div class="clients__heading slide-left">
                <div class="title">
                    Клиенты
                </div>
                <p>
                    Гордимся сотрудничеством с лидерами своих отраслей и счастливы быть их
                    партнером
                </p>
            </div>
            <div class="clients__wp">

<?php for ($i = 1; $i <= 9; $i++): ?>
    <a href="#" class="clients__item slide-up">
        <img src="/web/img/clients/<?php echo $i; ?>.png" 
             alt="">
    </a>
<?php endfor; ?>
               <!-- <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/1.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/2.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/3.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/4.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/5.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/6.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/7.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/8.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a>
                <a href="#" class="clients__item slide-up">
                    <img src="/web/img/clients/9.png" alt="<?php echo UniversalAltHelper::generateAlt('/web/img/clients/1.png', 'Наш клиент'); ?>">
                </a> -->
                <div class="clients__item slide-up">
                    <a href="#modal" data-fancybox class="btn-gradient">
                        Стать нашим клиентом
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="services-block">
        <div class="services-block__heading">
            <div class="container">
                <div class="services-block__heading_title slide-left">
                    Наши услуги
                </div>
            </div>
            <div class="services-block__bg slide-right">
                <img src="/web/img/services-block/1.webp" alt="">
            </div>
        </div>
        <div class="container">
            <div class="services-block__title slide-left">
                Наши услуги
            </div>

            <?php $this->widget(
                'page.widgets.AllPageWidget', ['view' => 'main', 'limit' => 8]
            ); ?>

        </div>
    </div>

    <div class="advantages">
        <div class="container">
            <div class="title slide-left">
                Преимущества
            </div>
            <div class="advantages__wp slide-up">
                <div class="advantages__item">
                    <div class="advantages__img">
                        <img src="/web/img/advantages/1.png" alt="">
                    </div>
                </div>
                <div class="advantages__item">
                    <div class="advantages__title">
                        Кратчайшие сроки
                        <span>
                        01
                    </span>
                    </div>
                    <div class="advantages__text">
                        <p>
                            Да, это не самое выгодное УТП для компании, но исторически так
                            сложилось что многие клиенты знают «Галерею стиля» именно как
                            «палку-выручалку», которая повернет время вспять и наколдует за
                            пол дня то, что то нужно было сделать еще вчера.
                            Мы воплощаем сложные проекты в еще более сложные сроки.
                        </p>
                    </div>
                </div>
                <div class="advantages__item">
                    <div class="advantages__title">
                        Креативность
                        <span>
                        02
                    </span>
                    </div>
                    <div class="advantages__text">
                        <p>
                            Если вы не верите в магию, и оставляете себе и нам время
                            для творчества, мы всегда готовы предложить уникальные и
                            отвечающие брифам решения, на одно из которых
                            непременно откликнется сердце Заказчика.
                            В штате агентства 3 профессиональных дизайнера.
                        </p>
                    </div>
                </div>
                <div class="advantages__item">
                    <div class="advantages__title">
                        Совпадение
                        ожиданий и реальности
                        <span>
                        03
                    </span>
                    </div>
                    <div class="advantages__text">
                        <p>
                            Мы хорошо разбираемся в производственных процессах!
                            Наши специалисты адаптируют решение так, чтобы его можно
                            было воплотить с оптимальными затратами.
                            У подрядчиков не бывает проблем с нашими файлами,
                            чертежами и макетами.
                        </p>
                    </div>
                </div>
                <div class="advantages__item">
                    <div class="advantages__title">
                        Организация
                        <span>
                        04
                    </span>
                    </div>
                    <div class="advantages__text">
                        <p>
                            При необходимости мы берем на себя организацию работы
                            с исполнителями в смежной деятельности. Нашим специалистам
                            можно доверить проведение мероприятия/выставки под ключ,
                            оформления мест продаж, организацию рекламной кампании
                            и даже ремонт.
                        </p>
                    </div>
                </div>
                <div class="advantages__item">
                    <a href="#modal" data-fancybox>
                        Заказать звонок
                    </a>
                </div>
            </div>
        </div>
    </div>

    <article class="article">
        <div class="container">
            <div class="article__wp">

                <?php if (Yii::app()->hasModule('contentblock')): ?>
                    <?php $this->widget(
                        'application.modules.contentblock.widgets.ContentBlockWidget',
                        ['code' => 'article__wp']
                    ); ?>
                <?php endif; ?>

            </div>
        </div>
    </article>

    <div class="form">
        <div class="container">
            <div class="form__wp">

                <?php if (Yii::app()->hasModule('callback')): ?>
                    <?php $this->widget('application.modules.callback.widgets.CallbackWidget', ['view' => 'byfile']); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>


</main>