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
                    <img src="/web/images/services5.png" alt="" class="branding-header--img">
                    <div class="branding-header-content">
                        <h2 class="branding-header--head">ПОДДЕРЖКА И РАЗВИТИЕ</h2>
                        <p class="branding-header--caption">Инструменты и решения для привлечения клиентов</p>
                    </div>
                </div>
                <p class="branding--descr">Вы жалуетесь на кризис? Перестаньте паниковать — пора действовать. Кризис
                    безжалостен и не оставляет шанса медленным решениям. Приходите к нам. Мы быстро и оперативно найдем
                    для вас эффективные решения. Бизнес снова станет выгодным!</p>
                <div class="branding-item">
                    <h6 class="branding-item--head">Поддержка сайтов и бизнес-систем</h6>
                    <p class="branding-item--text">Если с вашего сайта не приходят клиенты, то его пора закрывать. Есть
                        вариант, что его можно обновить и улучшить. То же самое касается бизнес-систем. У нас есть опыт,
                        знания и мощности, а также группа серверов для бесперебойной работы сайта. Можем предоставить
                        качественный хостинг.</p>
                    <p class="branding-item--text">
                        Забудьте о том, что сайт это только имидж. Он должен приносить прибыль. Он должен быть
                        современным. Мы из любого исходного материала сможем сделать продукт, отвечающий всем
                        требованиям этого дня.</p>

                </div>
                <div class="branding-item">
                    <h6 class="branding-item--head">Поддержка брендов</h6>
                    <p class="branding-item--text">
                        Бренд должен быть узнаваем, но плохо, когда он мозолит глаза. Каждый бизнес временами испытывает
                        потребность в обновлении или дополнении существующей концепции. Если вы почувствовали, что этот
                        момент настал, то пора посетить наш офис..</p>
                    <p class="branding-item--text">
                        Мы разрабатываем эффективные, а не красивые фирменные стили. Нас не пугают объемы, скорости и
                        задачи. После нас вы приходите в типографию и забираете готовый продукт, не слушая лишних
                        вопросов и уточнений.</p>
                </div>

                <div class="branding-item">
                    <h6 class="branding-item--head">Развитие рекламных кампаний</h6>
                    <p class="branding-item--text">
                        Старые трюки потеряли эффективность? Клиентов становится меньше? Не работает реклама? Не спешите
                        паниковать. Специалисты OMG готовы помочь! Мы погружены в маркетинговые коммуникации и
                        it-технологии. Мы в курсе всех работающих трендов.</p>
                    <p class="branding-item--text">
                        Вы получите грамотные и работающие медиа-планы. Площадки, на которых есть ваши клиенты.
                        Оперативные изменения для рекламных кампаний. При необходимости мы создадим дополнительные
                        сайты, внедрим интернет-технологии, подготовим графический материал.</p>
                </div>
            </div>
            <div class="stages">
                <h6 class="stages--head"> Как мы работаем? </h6>
                <p class="stages--num">1</p>
                <p class="stages--name"> Исследование и аналитика</p>
                <p class="stages--text">Бизнес начинается с аналитики. Мы проведем анализ рынка, на котором вы
                    работаете. После этого подберём варианты продвижения, которые сработают здесь и сейчас.</p>

                <p class="stages--num">2</p>
                <p class="stages--name">План мероприятий</p>
                <p class="stages--text">После определения целей и задач составляется пошаговый план продвижения. Мы
                    определим площадки под каждую целевую аудиторию. Мы знаем, как работает рекламы в интернете и в
                    оффлайн.</p>

                <p class="stages--num">2</p>
                <p class="stages--name">Результаты</p>
                <p class="stages--text">Мы будем наблюдать рекламную кампанию и вовремя ее корректировать. Все действия
                    будут нацелены на максимальное выполнение плана и получение нужных результатов.</p>
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
            <p class="site-case-another-header--type">Поддержка и развитие</p>
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

