<?php
$this->canonical = 'https://omg.im/services/'.$model->slug;
$this->title = $model->seo_title;
$this->description = $model->description;
$this->keywords = $model->keywords;
?>


<?php
$this->breadcrumbs = [
    Yii::t('ServicesModule.services', 'Services') => ['/services/services/index'],
    $model->title
];
?>

<div class="inner-header-wrap inner-header-wrap_service">
    <div class="container">
        <div class="inner-header">
            <h1 class="inner-header--head">
                <?= $model->title?>
            </h1>
            <div class="inner-header-bread">
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'tagName' => 'ul', // container tag
                    'htmlOptions' => array(), // no attributes on container
                    'separator' => '<li>></li>', // no separator
                    'homeLink' => '<li><a href="/">Главная</a></li>', // home link template
                    'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>', // active link template
                    'inactiveLinkTemplate' => '<li>{label} </li>', // in-active link template
                )); ?>
            </div>
        </div>
    </div>
</div>




<div class="branding-wrap">
    <div class="container">
        <div class="branding-clear clearfix">
            <div class="branding">
                <div class="branding-header">
                    <img src="/web/images/services3.png" alt="" class="branding-header--img">
                    <div class="branding-header-content">
                        <h2 class="branding-header--head">Разработка интернет-магазинов</h2>
                        <p class="branding-header--caption">Мы знаем всё о том, как сделать продающий ресурс, и даже
                            больше</p>
                    </div>
                </div>
                <p class="branding--descr">Разработка и создание интернет-магазина с нуля, который будет приносить хороший
                    заработок – это высокое искусство. Чтобы сделать хороший интернет-магазин, необходимо проделать
                    большую работу, и основа - это создание сайта интернет-магазина "под ключ" на любой удобной CMS - Bitrix, 
                    Yii, PHP, MySQL, WordPress, OpenCart и других.</p>
                <div class="branding-item">
                    <p class="branding-item--text">Не верьте дельцам, которые будут твердить, что главное в
                        интернет-магазине – это дизайн. Сразу же бегите от них к нам. Самое главное - это продажи! Для
                        этого нужно изучить запросы целевой аудитории и удовлетворить их на 110%</p>
                    <p class="branding-item--text">Потенциальный покупатель превращается в реального, если на сайте он
                        ощущает комфорт и удобство. Он понимает: здесь его ждали и предлагает то, что он искал. Магия?
                        Нет! Просто профессиональная работа от OMG.</p>
                    <p class="branding-item--text">Мы разработаем прототип и актуальный дизайн. Вы запустите магазин и
                        будете считать продажи.</p>
                    <p class="branding-item--ul-head">Наш секрет успешного интернет-магазина:</p>
                    <ul class="branding-item--list">
                        <li>Уникальный дизайн;</li>
                        <li>Все варианты оплаты онлайн;</li>
                        <li>Автоматизация и интеграция каталогов товаров;</li>
                        <li>Система управления заказов;</li>
                        <li>Интеграция с Яндекс-Маркет;</li>
                        <li>Все фишки для увеличения продаж.</li>
                    </ul>
                    <p class="branding-item--text"> Ключи от вашего интернет-магазина у нас. Забирайте и начинайте
                        продавать!</p>
                </div>

                <div class="branding-item">
                    <h6 class="branding-item--head">При создании интернет-магазинов прорабатываются:</h6>
                    <p class="branding-item--ul-head">Юзабилити</p>
                    <p class="branding-item--text">Поисковые системы трепетно относятся к поведенческим факторам. Они
                        ценят сайты, которые понятны пользователям. Посетитель должен потратить не больше 4 секунд,
                        чтобы разобраться в меню и в разделах сайта.</p>
                    <p class="branding-item--text">Если он этого не делает, то закрывает сайт и уходит к конкурентам, а
                        сайт получает негативную статистику в плане процентов отказов. Это приводит к плохому
                        ранжированию в Яндекс и Google. В результате магазин теряет пользователей и деньги.</p>
                    <p class="branding-item--text">Все наши сайты соответствуют современным требованиям к юзабилити, то
                        есть удобны пользователям. Вы получите интернет-магазин, который понравится пользователям и
                        поисковым системам.</p>
                    <p class="branding-item--ul-head">Конверсия</p>
                    <p class="branding-item--text">При создании сайта, нами проводится маркетинговый анализ ниши, в
                        которой вы будете работать. Это мы используем в дизайне и делаем все, чтобы у ресурса была
                        высокая конверсия. Если тщательно изучить поведение целевой аудитории, то можно спрогнозировать
                        ее поведение на страницах сайта.</p>
                    <p class="branding-item--text">Все кнопки и цвета будут применяться на основании исследований
                        потенциальных клиентов. Посетители захотят купить именно у вас. Вы же этого хотите, не так
                        ли?</p>
                    <p class="branding-item--ul-head">Коммерциализация</p>
                    <p class="branding-item--text">Повторимся, что главное в интернет-магазине – это продажи. Команда
                        OMG знает все работающие фишки для побуждения клиентов к покупке. И мы с радостью внедрим их на
                        вашем сайте. Готовы к деньгам ваших клиентов? Отлично! Мы ждем вас!</p>


                    <p class="branding-item--ul-head">Наш секрет успешного интернет-магазина:</p>
                    <ul class="branding-item--list">
                        <li>Уникальный дизайн;</li>
                        <li>Все варианты оплаты онлайн;</li>
                        <li>Автоматизация и интеграция каталогов товаров;</li>
                        <li>Система управления заказов;</li>
                        <li>Интеграция с Яндекс-Маркет;</li>
                        <li>Все фишки для увеличения продаж.</li>
                    </ul>
                    <p class="branding-item--text"> Ключи от вашего интернет-магазина у нас. Забирайте и начинайте
                        продавать!</p>
                </div>


            </div>
            <div class="stages">
                <h6 class="stages--head"> Как создаются работающие интернет-магазины?</h6>
                <p class="stages--num">1</p>
                <p class="stages--name">А конкуренты кто?</p>
                <p class="stages--text">Мы исследуем интернет и определим конкурентов. Возможно, даже что-то купим у
                    них. Узнаем их слабые стороны и особенности. После этого станет понятно: как привести клиентов к
                    вам.</p>
                <p class="stages--num">2</p>
                <p class="stages--name">Прототип решает!</p>
                <p class="stages--text">Мы создаем прототип будущего магазина. Нет, это не просто рисунок на ватмане. Вы
                    увидите все механизмы, которые будут работать на сайте: от выбора товара до оформления
                    покупки. Прототип покажет, сколько времени уйдет на ваш продукт и в какую сумму он встанет.</p>
                <p class="stages--num">3</p>
                <p class="stages--name">Дизайн удивляет!</p>
                <p class="stages--text">OMG! Да, мы подготовим для вас несколько вариантов дизайна, которые будут
                    соответствовать трендам и задачам. Вам будет из чего выбрать. Это здорово, не правда ли?</p>
                <p class="stages--num">4</p>
                <p class="stages--name">Клиенты покупают!</p>
                <p class="stages--text">Запускаем интернет-магазин. Размещаем его в поисковых системах и при
                    необходимости в Яндекс.Маркете. Смотрим на ваше довольное лицо, а вы считаете прибыль. Идеальная
                    сделка!</p>

            </div>
            <img src="/web/images/cut-omg.png" alt="" class="branding--cut-img">
            <a href="/services" title="Назад к услугами" class="branding--link blue-link">назад к услугам</a>
        </div>
    </div>
</div>

<!-- Another -->

<div class="site-case-another-wrap">
    <div class="container">
        <div class="site-case-another-header">
            <h6 class="site-case-another-header--head">еще кейсы по теме</h6>
            <p class="site-case-another-header--type">Разработка интернет магазинов</p>
        </div>
        <div class="site-case-another clearfix">
            <?php if (Yii::app()->hasModule('decision')): ?>
                <?php $this->widget('application.modules.decision.widgets.DecisionOtherWidget', [
                    'category_id' => 11,
                ]); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="service-footer">
    <div class="container">
        <div class="site-case-right-footer clearfix">
            <div class="site-case-right-social">
                <a href="#" class="site-case-right-social--link">facebook</a>
                <a href="#" class="site-case-right-social--link">twitter</a>
                <a href="#" class="site-case-right-social--link">вконтакте</a>
            </div>
            <div class="site-case-right-nav">
                <?php if (Yii::app()->hasModule('services')): ?>
                    <?php $this->widget('application.modules.services.widgets.ServicesBackCaseWidget', [
                        'decision_id' => $model->id,
                    ]); ?>
                <?php endif; ?>
                <?php if (Yii::app()->hasModule('services')): ?>
                    <?php $this->widget('application.modules.services.widgets.ServicesNextCaseWidget', [
                        'decision_id' => $model->id,
                    ]); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

