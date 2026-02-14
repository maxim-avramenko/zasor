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
                    <img src="/web/images/services1.png" alt="" class="branding-header--img">
                    <div class="branding-header-content">
                        <h2 class="branding-header--head">Проектирование и дизайн </h2>
                        <p class="branding-header--caption">пользовательских сервисов и индивидуальных
                            интернет-проектов</p>
                    </div>
                </div>
                <p class="branding--descr mb10">
                    Мы знаем два случая, когда Вам необходимы проектирование и дизайн интерфейса:</p>
                <ul class="branding-ul">
                    <li>Обновление существующего интерфейса для сайта, бизнес-приложения, портала;</li>
                    <li>Разработка абсолютно нового продукта.</li>
                </ul>
                <p class="branding--descr mt10">

                    Если хотите нас удивить, то можете рассказать про ваш особый случай -
                    мы
                    справимся и с ним!  Хотя, какая разница?</p>


                <div class="branding-item">
                    <p class="branding-item--ul-head">  Если мы начинаем сотрудничать, то перед этим
                        будем обсуждать самые важные вещи:</p>
                    <ul class="branding-item--list">
                        <li>Цели и задачи продукта</li>
                        <li>Запросы целевой аудитории;</li>
                        <li>Локализация продукта.</li>
                    </ul>
                </div>
                <div class="branding-item">
                    <p class="branding-item--text">Со стороны может показаться, что веб-дизайн - эта простая работа: картиночку сюда,
                        потом картиночку туда, а вот здесь нужна кнопка: Купить! Нет! Мы погружаемся в проект и смотрим
                        на него с вашей стороны и стороны клиентов. Успех, как и дьявол, скрывается в деталях! И в
                        деталях мы отыщем ваш будущий успех!</p>

                </div>
                <div class="branding-item">
                    <h6 class="branding-item--head">Как мы будем с Вами работать?</h6>
                    <p class="branding-item--ul-head">Бизнес под микроскопом</p>

                    <p class="branding-item--text">Наша команда веб-дизайнеров засядет за стол и мы тщательно рассмотрим все
                        бизнес-процессы вашего проекта. Нам важно все: Что? Где? Когда? <s>Отвечает Александр Друзь</s>
                        С кем и почему? Если проект только запускается, то мы поймем, по какой системе он будет
                        работать. Теперь мы знаем про вас все! </p>


                    <p class="branding-item--ul-head">Цель видишь? А она есть!</p>
                    <p class="branding-item--text">Наша команда все еще за столом. Перерыв только на кофе. Теперь нужно
                        понять каких целей мы должны достигнуть. Они появляются исходя из запросов и особенностей вашего
                        бизнеса, которые мы не так давно выяснили.</p>
                    <p class="branding-item--ul-head">Структура – наше все!</p>
                    <p class="branding-item--text">К этому моменту стол буквально завален. У нас очень много данных, в
                        которых нужно навести порядок. Вся информация должна стать единым целым. Мы должны видеть, как
                        все будет работать. Из этого и получится продукт, который нужен вам и клиентам.</p>
                    <p class="branding-item--ul-head">Прототип! Твой выход!</p>
                    <p class="branding-item--text">Наконец-то можно встать из-за стола! На этом этапе мы создадим
                        прототип будущего продукта. Наша статистика показывает, что от него зависит 90% успешной
                        реализации. Это своеобразная контурная карта, которая показывает, что где находится, и как будет
                        работать. Если в будущем предполагается программирование, то прототип станет техническим
                        заданием для программиста.</p>
                    <p class="branding-item--ul-head">Дизайн не заставит себя ждать</p>
                    <p class="branding-item--text">После утверждения прототипа, мы начинаем разрабатывать концепцию
                        дизайна. За основу мы можем взять фирменный стиль вашей компании или самого продукта. Также
                        можно <s>стырить</s> проанализировать похожие решения на рынке или ориентироваться на особенности
                        целевой аудитории. Мы сможем сделать дизайн сайта с нуля на любой платформе: WordPress, Bitrix, Yii и других, 
                        и нам неважно, какой у вас сайт, мы сможем сделать и дизайн сайта-визитки, и дизайн сайта фотографа, 
                        и дизайн интернет-магазина. И конечно мы сможем осуществить дизайн сайта для мобильных устройств.</p>
                    <p class="branding-item--ul-head">А теперь и элементы UI</p>
                    <p class="branding-item--text">Сейчас мы запаримся и проработаем все элементы будущего интерфейса.
                        От нашего взора не уйдет ни одна кнопочка, иконка или пиктограмма. Мы сделаем все, чтобы
                        пользователь понимал, что нужно делать и куда нажимать.</p>


                </div>
            </div>
            <div class="stages">

                <h6 class="stages--head">Процесс создания пользовательских интерфейсов</h6>
                <p class="stages--num">1</p>

                <p class="stages--name">Изучение предметной области</p>
                <p class="stages--text">Оцениваем задачу, определяем цели. Начинаем разбор кейсов.</p>

                <p class="stages--num">2</p>
                <p class="stages--name">Прототипирование интерфейса</p>
                <p class="stages--text">После выявления кейсов и определения целей и задач приступаем к прототипированию интерфейса.</p>

                <p class="stages--num">3</p>
                <p class="stages--name">Разработка дизайна</p>
                <p class="stages--text">После утверждения протототипа наши специалисты начинают разработку дизайна вашего продукта.</p>
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
            <p class="site-case-another-header--type">Проектирование и дизайн</p>
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

