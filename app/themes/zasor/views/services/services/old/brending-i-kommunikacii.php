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
                    <img src="/web/images/services2.png" alt="" class="branding-header--img">
                    <div class="branding-header-content">
                        <h2 class="branding-header--head">БРЕНДИНГ И КОММУНИКАЦИИ</h2>
                        <p class="branding-header--caption">Создание ярких торговых марок и визуализация рекламных
                            кампаний</p>
                    </div>
                </div>
                <p class="branding--descr">Ваша торговая марка поселится в головах клиентов, а рекламная кампания
                    сработает в плюс! Потому что мы знаем, как создавать правильные бренды и эффективные кампании.</p>
                <div class="branding-item">
                    <p class="branding-item--text">Визуализация – для кого-то просто картинки, а для нас среда обитания.
                        Здесь мы не как рыба в воде, а как Т-34 на Курской дуге! Клиент получает от нас не работу, а
                        результат. Бренд будет выделяться на фоне конкурентов, а рекламные кампании заставят расти вверх
                        графики, показывающие прибыль!</p>
                </div>

                <div class="branding-item">
                    <h6 class="branding-item--head">Брендинг</h6>
                    <p class="branding-item--text">Что такое успешный бренд? Это когда потенциальный клиент ломает
                        голову, выбирая между Вами и конкурентами. Мы сделаем так, чтобы он всегда выбирал вас. Станьте
                        маяком, на свет которого он поплывет. Брендинг — и есть процесс формирования имиджа бренда посредством 
                        комплекса мер, которые мы возьмем на себя, а вам останется только наслаждаться результатом. 
                        </p>
                    <p class="branding-item--ul-head">Что сделает ваш бренд уникальным?</p>
                    <ul class="branding-item--list">

                        <li>Логотип и знак</li>
                        <li>Руководство к логотипу</li>
                        <li>Фирменный стиль</li>
                        <li>Гайдлайн и брендбук</li>
                        <li>Стандарты по внешней и внутренней идентификациям</li>
                        <li>Дизайн упаковки и сувенирной продукции</li>
                        <li>Стандарты рекламного продвижения.</li>

                    </ul>

                    <p class="branding-item--text">Если вы сейчас подумали, что вам навязывают набор картинок с
                        инструкциями, то… пора вызывать <s>полицию</s> нашего менеджера. Спорим, мы докажем, что
                        правильная разработка бренда компании
                        приносит деньги?</p>


                </div>
                <div class="branding-item">
                    <h6 class="branding-item--head">Ребрендинг</h6>
                    <p class="branding-item--text"> Порой бизнес, как гардероб мужчины. Раньше эти рубашечки собирали
                        номера телефонов, а сейчас приходиться выпрашивать. Ваш образ устарел или изменились времена? В
                        этом случае необходимо обновление.
                        Мы эффективно изменим образ вашей компании и позиционирование на рынке. Новый облик будет
                        понятен целевой аудитории. Ведите бизнес по-новому, клиенты это заметят!</p>

                </div>
                <div class="branding-item">
                    <h6 class="branding-item--head">Визуальные коммуникации</h6>
                    <p class="branding-item--text">Мы не работаем с палитрой цветов и геометрическими фигурами. Мы
                        работаем с мыслями людей. Специалисты
                        OMG могут участвовать в «Битве Экстрасенсов», так как знают, о чем думают ваши клиенты.
                        Поэтому наши решения способны вызвать положительные эмоции, положительные тенденции и
                        положительные
                        продажи. Наша работа оценивается эффективностью, а не красотой!</p>
                    <p class="branding-item--ul-head">Мы прочитали ваши мысли: вот, что конкретно мы можем делать:</p>
                    <ul class="branding-item--list">
                        <li> Рекламные кампании</li>
                        <li>Графическое оформление мероприятий</li>
                        <li> Имиджевые каталоги и годовые отчеты</li>
                        <li> Печатные издания</li>
                        <li> Многостраничные календари.</li>

                    </ul>
                </div>
            </div>

            <div class="stages">
                <h6 class="stages--head">Как делается яркий бренд?</h6>
                <p class="stages--num">1</p>
                <p class="stages--name">Ищем решение</p>
                <p class="stages--text"> Узнаем, что нужно вашим клиентам и чего хотите вы. Соединяем эти «хотелки» в
                    единое целое. Приходим к пониманию, что нужно сделать. Ставим цели и сроки. Приступаем к дизайну.
                </p>
                <p class="stages--num">2</p>
                <p class="stages--name">Готовим прототип</p>
                <p class="stages--text"> Теперь мы знаем, что нужно вам и клиентам. Наши спецы в очередной раз отказали
                    продюсерам «Битвы экстрасенсов» и начинают готовить прототип вашего бренда.
                </p>
                <p class="stages--num">3</p>
                <p class="stages--name">Делаем брендинг-дизайн</p>
                <p class="stages--text"> Ура! Вы все утвердили! Самое время сделать дизайн для бизнеса, который будет
                    работать по-новому!
                </p>
            </div>
            <img src="/web/images/cut-omg.png" alt="" class="branding--cut-img">
            <a href="/services/" title="Назад к услугами" class="branding--link blue-link">назад к услугам</a>
        </div>
    </div>
</div>

<!-- Another -->

<div class="site-case-another-wrap">
    <div class="container">
        <div class="site-case-another-header">
            <h6 class="site-case-another-header--head">еще кейсы по теме</h6>
            <p class="site-case-another-header--type">Брендинг и коммуникации</p>
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

