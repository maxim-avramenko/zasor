<?php
$this->canonical = 'https://omg.im/services/' . $model->slug ;
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
                <?= $model->title ?>
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
                        <h2 class="branding-header--head">Создание сайтов</h2>
                        <p class="branding-header--caption">Мы знаем всё о том, как сделать продающий ресурс, и даже
                            больше</p>
                    </div>
                </div>
                <p class="branding--descr" style="margin: 31px 0 36px 95px;">Компания OMG создает сайты, которые становятся частью бизнес-процессов. Мы не
                    проектируем красивые витрины для имиджа компании. Наши проекты повышают рентабельность:</p>
                <div class="branding-item">
                    <ul class="branding-item--list">
                        <li>Увеличивают прибыль;</li>
                        <li>Помогают выйти на новые рынки;</li>
                        <li>Улучшают работу отдела продаж.</li>
                    </ul>
                    <p class="branding-item--text"> Ключи от вашего интернет-магазина у нас. Забирайте и начинайте
                        продавать!</p>
                </div>
                <div class="branding-item">
                    <h3 class="branding-item--head">Как это происходит?</h3>
                    <p class="branding-item--ul-head">Увеличение прибыли</p>

                    <p class="branding-item--text">Владельцы бизнеса часто сталкиваются с тем, что не могут сформировать
                        свое отличие от конкурентов.
                        Мы знаем, как это сделать. Вы получите сайт под ключ, который моментально станет работать на
                        увеличение прибыли.</p>
                    <p class="branding-item--text">Мы проведем маркетинговый анализ проекта. Изучим конкурентов и
                        потребности ваших клиентов. После
                        этого происходит проектирование сайта. Новый ресурс закроет боли покупателей, и будет отличаться
                        от
                        других ресурсов данной тематики. Наполнение сайта будет заточено под продажи и никакой воды!
                        Разработка сайта с нуля - мы это умеем! Мы сможем разработать сайт на любой платформе - PHP, 
                        Bitrix, WordPress, Joomla, OpenCart и других и сможем создать сайт любой сложности и типа: корпоративный сайт, лендинг
                        (или одностраничный сайт), сайт ресторана, сайт компании, сайт гостиницы, сайт интернет-магазина 
                        или сайт-визитку и любые другие.</p>

                    <p class="branding-item--ul-head">Выход на новые рынки</p>
                    <p class="branding-item--text">Предприниматели знают, что выход на новые рынки – это трудоемкий
                        процесс. Нужно изучать спрос в новом регионе, проводить анализ, искать сотрудников,
                        производственные или офисные площади. </p>
                    <p class="branding-item--text">Но создание продающих сайтов учитывает эти моменты. Сегодня можно
                        выйти на новые рынки, не покидая пределы своего города. Мы настроим страницы сайта под
                        продвижение в нужных регионах.</p>


                    <p class="branding-item--ul-head">Развитие отдела продаж</p>
                    <p class="branding-item--text">Большие компании знают, насколько трудно настроить эффективную работу
                        отдела продаж. Зачастую непонятно из чего состоит продажа и почему некоторые клиенты так и не
                        совершают покупку. Мы создаем сайты, которые автоматизируют процесс общения с клиентами.</p>


                    <p class="branding-item--text">Мы интегрируем сайт с CRM и настроим воронку продаж. Всё общение с
                        клиентом будет проходить через сайт, и работа сотрудников станет прозрачной. Представьте, что с
                        этого момента вы будете знать:</p>

                    <ul class="branding-item--list">
                        <li>Самых эффективных менеджеров;</li>
                        <li>Как увеличить количество клиентов;</li>
                        <li>Что сделать, чтобы улучшить результат.</li>
                    </ul>
                    <p class="branding-item--text">Ни один клиент не пройдет мимо. Вы контролируете все процессы и
                        оперативно вносите изменения. Мы настроим не только CRM, но и дадим рекомендации по работе с
                        онлайн-чатами и формами обратной связи. Продавайте лучше и больше!</p>
                </div>


                <div class="branding-item">
                    <h3 class="branding-item--head">Этапы создания сайта</h3>
                    <p class="branding-item--ul-head">Заявка и бриф</p>

                    <p class="branding-item--text">Вы связываетесь с нами и подробно отвечаете на наши вопросы. Не
                        торопитесь при заполнении брифа. Посмотрите на свой бизнес со стороны, учтите все моменты,
                        представьте, каким вы видите новый сайт.</p>


                    <p class="branding-item--ul-head">Обсуждение проекта</p>
                    <p class="branding-item--text">Мы встречаемся или связываемся с помощью Skype. Подробно обсуждаем
                        детали, особенности и нюансы проекта. </p>


                    <p class="branding-item--ul-head">Составление технического задания</p>
                    <p class="branding-item--text">Мы изучаем рынок, проводим анализ конкурентов, смотрим похожие
                        ресурсы. После этого готовим подробное техническое задание, в котором будут учтены все аспекты
                        будущего сайта.</p>

                    <p class="branding-item--ul-head">Прототипирование</p>
                    <p class="branding-item--text">Не волнуйтесь, сайт не будет для вас сюрпризом. Сначала вы получите
                        прототип. Вы увидите структуру ресурса. Сможете понять, как он будет работать с точки зрения
                        пользователя.</p>

                    <p class="branding-item--ul-head">Работа над проектом</p>
                    <p class="branding-item--text">После этого мы активно приступаем к разработке и программированию
                        сайта. Через 30 дней вы получаете готовый продукт!</p>

                </div>

                <div class="branding-item">
                    <p class="branding-item--ul-head">Что вы получите дополнительно?</p>
<br>
                    <ul class="branding-item--list">
                        <li>30 дней бесплатного сопровождения проекта;</li>
                        <li>Обучение персонала работе с ресурсом;</li>
                        <li>Доменное имя и бесплатный хостинг на 1 год.</li>
                    </ul>
                    <p class="branding-item--ul-head">Есть два способа заказать сайт:</p>
                    <br>
                    <ul class="branding-item--list">
                        <li>Быстро и дешево. А затем постоянно его дорабатывать, настраивать и не понимать: почему он не
                            приносит результат
                        </li>
                        <li>Эффективно и по-взрослому. И получить ресурс, который увеличивает продажи и не требует
                            постоянных доработок.
                        </li>
                    </ul>
                    <p class="branding-item--text">Успешные предприниматели выбирают второй вариант. А вы?</p>
                </div>
            </div>
            <div class="stages">
                <h3 class="stages--head">Что такое современные сайты?</h3>
                <p class="stages--num">1</p>
                <p class="stages--name">Адаптивный дизайн и верстка</p>
                <p class="stages--text">Наши сайты идеально просматриваются с больших экранов и всех видов мобильных
                    устройств. Вы всегда будете доступны для клиентов. Мобильный трафик растет, и сайты без адаптивного
                    дизайна уже не интересны пользователям.</p>
                <p class="stages--num">2</p>
                <p class="stages--name">Быстрая загрузка</p>
                <p class="stages--text">У наших проектов современное техническое исполнение. Они быстро загружаются.
                    Пользователь не уйдет на другой сайт, так как оперативно получит нужную информацию.</p>
                <p class="stages--num">3</p>
                <p class="stages--name">Готовность к продвижению</p>
                <p class="stages--text">Наши проекты учитывают современные требования к продвижению. Когда вы будете
                    заказывать интернет-рекламу или SEO, вам не понадобится вносить многочисленные изменения и
                    доработки, что существенно сэкономит ваше продвижение.</p>
                <p class="stages--num">4</p>
                <p class="stages--name">Уникальный дизайн и юзабилити</p>
                <p class="stages--text">Сайт будет подчеркивать фирменный стиль вашей компании. Пользователи запомнят
                    его и не перепутают с другими компаниями. Мы проработаем структуру сайта. Он будет понятным и
                    удобным для пользователя. </p>

            </div>
            <img src="/web/images/cut-omg.png" alt="Создание сайтов. Открытая медиа группа" class="branding--cut-img">
            <a href="/services" title="Назад к услугами" class="branding--link blue-link">назад к услугам</a>
        </div>
    </div>
</div>

<!-- Another -->

<div class="site-case-another-wrap">
    <div class="container">
        <div class="site-case-another-header">
            <h6 class="site-case-another-header--head">еще кейсы по теме</h6>
            <p class="site-case-another-header--type">Создание сайтов</p>
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

