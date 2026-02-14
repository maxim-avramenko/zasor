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
<!-- Branding -->
<div class="branding-wrap">
    <div class="container">
        <div class="branding-clear clearfix">
            <div class="branding">
                <div class="branding-header">
                    <img src="/web/images/services6.png" alt="" class="branding-header--img">
                    <div class="branding-header-content">
                        <h2 class="branding-header--head">Контекстная реклама</h2>
                        <p class="branding-header--caption">Размещение и ведение рекламных кампаний в сети</p>
                    </div>
                </div>
                <p class="branding--descr">Реклама в интернете на самом деле работает. Мы это доказали! Сотни и даже
                    тысячи людей каждый день ищут ваш товар или продукт. И, да, мы знаем, как сделать так, чтобы они
                    находили именно вас.</p>
                <div class="branding-item">

                    <p class="branding-item--text">Если конкуренты продолжают вешать картинки в лифтах, на асфальте, на
                        счетах-фактурах, билбордах и других сказочных местах, то пришло время стать эффективнее.
                        Предлагайте свои товары и услуги тем, кто заинтересован в них здесь и сейчас.</p>
                    <p class="branding-item--text">Контекстная реклама работает строго на целевую аудиторию. Никаких
                        размытых данных, надежды на авось и тактики остаться в памяти людей. Только конкретика, только
                        хардкор, только продажи!</p>

                    <h6 class="branding-item--head">Что такое контекстная реклама с OMG?</h6>

                    <p class="branding-item--ul-head">Медиаплан в подарок!</p>


                    <p class="branding-item--text">На этом этапе наша команда расскажет: как, когда и где будет работать
                        ваша реклама. Мы будем исходить из задач вашего бизнеса, а не своего удобства. С помощью
                        медиаплана прогнозируют результаты и понимают, что нужно сделать для успешной кампании.</p>

                    <p class="branding-item--ul-head">Анализ целевой аудитории</p>
                    <p class="branding-item--text">Каждый бизнесмен желает знать, где сидит клиент. Для этого мы изучим
                        целевую аудиторию и расскажем где ловить покупателей. Это могут быть социальные сети, поисковый
                        трафик или сайты определенной тематики, а может быть все вместе. Для каждого сегмента мы
                        составим интересные и работающие объявления.</p>
                    <p class="branding-item--ul-head">Настройка рекламной кампании</p>
                    <p class="branding-item--text">Пианино будет хорошо играть, если его правильно настроить. С
                        контекстной рекламой такая же история. Нужно сегментироваться аудиторию, написать различные
                        тексты заголовков и объявлений, выставить определенное время и еще куч разных настроек. Нам
                        придется попотеть, но это стоит того. Приятно, когда реклама работает, а клиент считает
                        прибыль.</p>
                    <p class="branding-item--ul-head">Поехали!</p>
                    <p class="branding-item--text">Реклама пошла, но мы не оставим вас наедине с рекламным кабинетом.
                        Некоторые сегменты аудитории могут выгорать и не приносить результата. Но мы рядом и за всем
                        следим. В режиме реального мнения будут вноситься эффективные изменения. Все будет работать в
                        режиме нон-стоп.</p>
                    <p class="branding-item--text">Мы объясним каждый шаг и предоставим отчет обо всех действиях.</p>
                </div>

            </div>
            <div class="stages">


                <h6 class="stages--head">Хит-парад преимуществ контекстной рекламы от OMG</h6>
                <p class="stages--num">1</p>
                <p class="stages--name">Быстрые результаты</p>
                <p class="stages--text">В среднем на запуск кампании с настройкой уходит 5 дней. Первые результаты вы
                    увидите уже через несколько часов. Это действенный инструмент, когда нужно наладить продажи в режиме
                    «уже вчера».</p>
                <p class="stages--num">2</p>
                <p class="stages--name">Только горячие клиенты</p>
                <p class="stages--text">Контекстная реклама работает только на тех, кто заинтересован в ваших услугах.
                    Никаких выстрелов по воробьям в надежде кого-то зацепить.</p>
                <p class="stages--num">3</p>
                <p class="stages--name">Оплата за результат</p>
                <p class="stages--text">Здесь все прозрачно. Реклама не крутится для всех и в любое время. Вы платите
                    только за тех, кто пришел на сайт.</p>
                <p class="stages--num">4</p>
                <p class="stages--name">Быстрая реакция</p>

                <p class="stages--text">Если что-то не работает или изменились данные, то можно внести быстрые
                    корректировки. Можно оперативно пересмотреть бюджет. Все изменения
                    происходят в режиме реального времени.</p>
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
            <p class="site-case-another-header--type">Контекстная рекламаp>
        </div>
        <div class="site-case-another clearfix">
            <?php if (Yii::app()->hasModule('decision')): ?>
                <?php $this->widget('application.modules.decision.widgets.DecisionOtherWidget', [
                    'category_id' => 14,
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

