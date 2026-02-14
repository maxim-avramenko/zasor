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
                    <img src="/web/images/services4.png" alt="" class="branding-header--img">
                    <div class="branding-header-content">
                        <h2 class="branding-header--head">Разработка бизнес-приложений</h2>
                        <p class="branding-header--caption">Создание приложений под ваши бизнес-задачи</p>
                    </div>
                </div>
                <p class="branding--descr">Мы разрабатываем web-приложения с понятным адаптивным интерфейсом для
                    автоматизации бизнес-процессов на основе ваших целей и задач. Наконец-то бизнес может работать в
                    любом месте!</p>
                <div class="branding-item">
                    <p class="branding-item--text">Мы не будем говорить: «У вас нет приложения? Как? Оно необходимо, все
                        так делают»! Мы доступно объясним, как приложение эффективно дополнит Ваш бизнес. Нам неважно:
                        большая компания или малый и средний бизнес. Нам важно, как приложение решит поставленные
                        цели!</p>
                    <p class="branding-item--text">Понятный интерфейс, адаптивный дизайн, работающие
                        бизнес-процессы!</p>
                    <p class="branding-item--ul-head">Хорошие приложения делаются так:</p>
                    <ul class="branding-item--list">
                        <li> Уточнение требований к web-системе;</li>
                        <li>Создание прототипа решения, согласование технического задания, целей и сроков;</li>
                        <li>Разработка решений. Создание пилотной версии и прогон на тестовых данных;
                        </li>
                        <li>Заключение договора и предоплата;</li>
                        <li>Сдача приложения. Внедрение для сотрудников компании и внешних пользователей;</li>
                        <li>Дизайн упаковки и сувенирной продукции</li>
                        <li> Техническая поддержка приложения.</li>
                    </ul>
                </div>
                <div class="branding-item">
                    <p class="branding-item--text">Обычно в этом месте у клиентов возникает ряд вопросов:
                    <ul class="branding-item--list">
                        <li> А вдруг нам вовсе не нужно это приложение?</li>
                        <li> А если нужно, что в нем можно делать?</li>
                        <li> А они справятся?</li>
                        <li> Долго они будут это делать?</li>
                        <li> OMG! Рискованное предприятие…</li>

                    </ul>
                    <p class="branding-item--text">Не беспокойтесь! Ответы на эти вопросы можно найти с помощью
                        прототипа! Мы развернём его на нашем сервере, и сразу станет понятно, что мы классные
                        специалисты, а приложение поможет улучшить бизнес!</p>

                </div>

            </div>
            <div class="stages">

                <h6 class="stages--head">Эффективные web-приложения по версии OMG:</h6>
                <p class="stages--num">1</p>
                <p class="stages--name">Гибкие.</p>
                <p class="stages--text">Интерфейс, который за ручку приведет пользователя куда надо. Внешний вид
                    экранов, роли и права доступа, понятные с первого взгляда.</p>
                <p class="stages--num">2</p>
                <p class="stages--name"> Комплексные.</p>
                <p class="stages--text">Если нужно, то мы решим вашу задачу, используя CRM, HelpDesk, документооборот.
                    Мы интегрируем все элементы бизнес-процессов.</p>
                <p class="stages--num">3</p>
                <p class="stages--name">Надежные.</p>
                <p class="stages--text">Наши приложения точно могут работать несколько лет и 24 часа в сутки! Проверено
                    на крупных заводах, банках, госпредприятиях!</p>
                <p class="stages--num">4</p>
                <p class="stages--name"> Масштабируемые.</p>
                <p class="stages--text">Неважно сколько человек у вас работает. 10, 100, 1000. Наши решения позволят
                    вести активную и совместную работу!</p>
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
            <p class="site-case-another-header--type">Разработка бизнес-приложений</p>
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

