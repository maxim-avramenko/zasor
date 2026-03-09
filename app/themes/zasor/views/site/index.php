<?php
/**
 * @var $homepageDopContent Page
 * @var $homepageImage1 Image
 * @var $homepageImage2 Image
 *
 */
?>
<?php
$this->canonical = $this->createAbsoluteUrl(Yii::app()->request->getPathInfo());

$this->schema = <<<EOF

EOF;

$yupe = Yii::app()->getModule('yupe');
$mainH1 = !empty($yupe->mainPageTitle) ? $yupe->mainPageTitle : (!empty($yupe->companyDescription) ? $yupe->companyDescription : $yupe->siteName);
?>

    <main class="first-area">
        <div class="container">
            <?php if (!empty($mainH1)): ?>
            <h1><?= CHtml::encode($mainH1) ?></h1>
            <?php endif; ?>
            <div class="box-first-area">
                <div class="col-first-area-left">
                    <div class="first-area-oplata">
                        <div class="first-area-oplata-nds">Работаем с <span><strong>НДС</strong> и без <strong>НДС</strong></span></div>
                        <div class="first-area-oplata-nal">Принимаем оплату:<span>наличный и безналичный расчет</span></div>
                    </div>
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <div class="first-area-zakaz">
                        <div class="first-area-wh">
                            <a href="<?php echo $yupe->companyTelegram; ?>"><img src="/images/hd-24_7.webp" alt="">
                                <span>Заказать аварийную службу</span></a>
                        </div>
                        <div class="first-area-phone">
                            <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="first-area-say">
                        <div class="first-area-say-head">
                            <div class="owner"><img src="/images/owner.png" alt=""></div>
                            <img src="/images/logo-box-say.webp" alt="Logo zasorunet">
                        </div>
                        <div class="first-area-say-text">
                            Услуги по устранению засоров в Казани и пригороде по разумным ценам с наличным и безналичным расчетом. Даем гарантию на все виды выполняемых нами работ. Возможно как единоразовоетак и постоянное сотрудничество.
                        </div>
                    </div>
                </div>
                <div class="col-first-area-right">
                    <?php
                    $hasAppBlock = !empty($yupe->companyApplicationQR) || !empty($yupe->companyApplicationAppStore) || !empty($yupe->companyApplicationGooglePlay);
                    if ($hasAppBlock):
                    ?>
                    <div class="border-figure">
                        <div class="border-radius-fff">
                            <span class="icon-question qr-head" rel="tooltip" data-title="На данный момент приложение на доработке" title=""></span>
                            <?php if (!empty($yupe->companyApplicationQR)): ?><img src="/<?= ltrim($yupe->companyApplicationQR, '/') ?>" alt="qr"><?php endif; ?>
                            <div class="box-google-apple-store-images">
                                <ul>
                                    <?php if (!empty($yupe->companyApplicationAppStore)): ?>
                                    <li><a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" target="_blank" rel="nofollow"><img src="/images/icons/app-store-logo.webp" alt=""></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($yupe->companyApplicationGooglePlay)): ?>
                                    <li><a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" target="_blank" rel="nofollow"><img src="/images/icons/google-store-logo.webp" alt=""></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="border-radius-fff-text">установить<br>приложение</div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- <img src="/images/bg-head.webp" alt="Устранение засоров"> -->
                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/images/bg-head3.webp" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/bg-head2.webp" loading="lazy" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/bg-head4.webp" loading="lazy" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="/images/bg-head.webp" loading="lazy" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="partners">
        <div class="container">
            <h3>Наши парнёры:</h3>
            <div class="box-partners">
                <ul>
                    <li><img src="images/partners/AGRO.webp" alt="" title=""></li>
                    <li><img src="images/partners/agr-kv.webp" alt="" title=""></li>
                    <li><img src="images/partners/avtosetrf.webp" alt="" title=""></li>
                    <li><img src="images/partners/chelni-khleb.webp" alt="" title=""></li>
                    <li><img src="images/partners/irbis.webp" alt="" title=""></li>
                    <li><img src="images/partners/kfc.webp" alt="" title=""></li>
                    <li><img src="images/partners/lenta.webp" alt="" title=""></li>
                    <li><img src="images/partners/magnit.webp" alt="" title=""></li>
                    <li><img src="images/partners/peterka.webp" alt="" title=""></li>
                    <li><img src="images/partners/tempo.webp" alt="" title=""></li>
                    <!-- <li><img src="images/partners/vkusnoitochka.webp" alt="" title=""></li> -->
                    <li><img src="images/partners/zhar-svezhar.webp" alt="" title=""></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="services-area">
        <div class="container">
            <ul>
                <li>Прочистка канализации<br>устранение засоров</li>
                <li>Откачка илососом<br>и утилизация отходов</li>
                <li>Обслуживание систем<br>канализации</li>
                <li>Видеодиагностика труб<br>канализации</li>
            </ul>
        </div>
    </div>
    <div class="list-services">
        <div class="container">
            <div class="list-services-h2">
                <h2>Услуги</h2>
                <div class="snip">
                    <div class="box-snip">Осуществляем прочистку засоров <?php if (!empty($yupe->companyWorkTime)): ?><?= CHtml::encode($yupe->companyWorkTime) ?><?php else: ?>круглосуточно<?php endif; ?> – <strong>24 часа в сутки 7 дней в неделю</strong></div>
                    <?php if (!empty($yupe->companyPhone)): ?><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a><?php endif; ?>
                </div>
            </div>
            <div class="main-services">
                <ul class="main-services-block">
                    <?php foreach ($servicePages as $page): ?>
                    <li>
                        <div class="img-main-services">
                            <?php if ($page->image): ?>
                            <img src="<?= CHtml::encode($page->getImageUrl()) ?>" loading="lazy" alt="<?= CHtml::encode($page->title) ?>">
                            <?php endif; ?>
                        </div>
                        <div class="text-main-services">
                            <h3><?= CHtml::encode($page->title) ?></h3>
                            <div class="text-main-services-content"><?= $page->short_text ?></div>
                            <div class="btn-main-services">
                                <a href="<?= CHtml::encode(Yii::app()->createUrl('/page/page/view', ['slug' => $page->path])) ?>">Подробнее</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="commercial-section">
        <div class="container">
            <div class="commercial-block">
                <div class="col-commercial-img">
                    <img src="images/kamaz-logo-left.webp" alt="">
                </div>
                <div class="col-commercial">
                    <div class="commercial-section-h3">
                        Быстрая подача<br>профессиональной техники
                    </div>
                    <?php if (!empty($yupe->companyApplicationQR) || !empty($yupe->companyApplicationAppStore) || !empty($yupe->companyApplicationGooglePlay)): ?>
                    <div class="app-commercial-section">
                        Отслеживание<br>через приложение
                        <?php if (!empty($yupe->companyApplicationAppStore)): ?><a href="<?= CHtml::encode($yupe->companyApplicationAppStore) ?>" target="_blank" rel="nofollow"><img src="images/AppStore.webp" alt=""></a><?php endif; ?>
                        <?php if (!empty($yupe->companyApplicationGooglePlay)): ?><a href="<?= CHtml::encode($yupe->companyApplicationGooglePlay) ?>" target="_blank" rel="nofollow"><img src="images/GooglePlay.webp" alt=""></a><?php endif; ?>
                        <?php if (!empty($yupe->companyApplicationQR)): ?>
                        <div class="qr-commercial-block">
                            <img src="/<?= ltrim($yupe->companyApplicationQR, '/') ?>" alt="qr">
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($yupe->companyPhone) || !empty($yupe->companyTelegram) || !empty($yupe->companyWorkTime)): ?>
                    <div class="phone-col-commercial">
                        <?php if (!empty($yupe->companyTelegram) || !empty($yupe->companyPhone)): ?>
                        <ul>
                            <?php if (!empty($yupe->companyTelegram)): ?><li><a href="<?= CHtml::encode($yupe->companyTelegram) ?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span></a></li><?php endif; ?>
                            <?php if (!empty($yupe->companyTelegram)): ?><li><a class="btn-wh" href="<?php echo $yupe->companyTelegram;?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span>Написать в Telegram</a></li><?php endif; ?><?php if (!empty($yupe->companyPhone)): ?><li><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>"><span class="icon-phone"></span></a></li><?php endif; ?>
                        </ul>
                        <?php endif; ?>
                        <?php if (!empty($yupe->companyPhone)): ?><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a><?php endif; ?>
                        <?php if (!empty($yupe->companyWorkTime)): ?><time><?= CHtml::encode($yupe->companyWorkTime) ?></time><?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($portfolioGalleryImages) || !empty($portfolioPage)): ?>
    <div class="gallery">
        <div class="container">
            <div class="about__gallery">
                <?php foreach ($portfolioGalleryImages as $itg): ?>
                    <?php if ($itg->image): ?>
                <a href="<?= CHtml::encode($itg->image->getImageUrl()) ?>" data-fancybox="gallery" class="about__pic">
                    <img src="<?= CHtml::encode($itg->image->getImageUrl(490, 245, true)) ?>" alt="<?= CHtml::encode($itg->image->alt) ?>">
                </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!empty($portfolioPage)): ?>
                <a href="<?= CHtml::encode(Yii::app()->createUrl('/page/page/view', ['slug' => $portfolioPage->path])) ?>" class="btn-main-gallery">
                    <span class="icon-arrow-right2 ring-btn-main"></span>Показать еще
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="completed-works-gallery">
        <div class="container">
            <h2>Выполненные работы</h2>
            <div class="works__gallery">
                <?php foreach ($homepageGallery2Images as $itg): ?>
                    <?php if ($itg->image): ?>
                <a href="<?= CHtml::encode($itg->image->getImageUrl()) ?>" data-fancybox="gallery" class="works__pic">
                    <img src="<?= CHtml::encode($itg->image->getImageUrl()) ?>" alt="<?= CHtml::encode($itg->image->alt) ?>">
                </a>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="info-completed-works-gallery">
                    <div>Более 10 лет <br>опыта</div>
                    <?php if (!empty($yupe->companyPhone)): ?><div><a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a><br></div><?php endif; ?>
                    <div class="info-completed-works-gallery-description">
                        <strong>10897</strong><span>+</span>
                        <span>Успешно<br>выполненных задач</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="work-area-section">
        <div class="container">
            <div class="work-area-section-block">
                <div class="column">
                    <h2>Область нашей деятельности</h2>
                    <span class="icon-location"></span>
                    <?php if (!empty($yupe->citiesList)): ?>
                    <div class="work-area-content">
                        <p><?= nl2br(CHtml::encode($yupe->citiesList)) ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="work-area-snip">
                        Осуществляем прочистку засоров<span><?php if (!empty($yupe->companyWorkTime)): ?> <?= CHtml::encode($yupe->companyWorkTime) ?><?php else: ?>круглосуточно<?php endif; ?> – 24 часа в сутки 7 дней в неделю</span>
                    </div>
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <div class="btn-work-area">
                        <a class="tel" href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
                        <a class="btn-wh" href="<?php echo $yupe->companyTelegram;?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span>Написать в Telegram</a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="column">
                    <!-- MAP script -->
                    <img src="images/map.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="tszh-uk-section">
        <div class="container">
            <div class="tszh-uk-block">
                <div class="column">
                    <h2>Специальные условия<br>для УК и ТСЖ</h2>
                    <div class="tszh-uk-block-content">
                        <?php $this->widget(
                                "application.modules.contentblock.widgets.ContentBlockWidget",
                                array("code" => "spec-uk-tszh"));
                        ?>
                    </div>
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <div class="tszh-uk-block-tel">
                        Подробности - <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="column">
                    <img src="images/city.png" alt="img">
                </div>
            </div>
        </div>
    </div>
    <div class="section-10">
        <div class="container">
            <h2>Чистим везде и всюду где есть трубы!</h2>
            <div class="section-10-block">
                <ul>
                    <li><span>ТСЖ, ЖСК и Управляющие Компании</span></li>
                    <li><span>Квартиры и Таунхаусы</span></li>
                    <li><span>Частные дома и Коттеджи</span></li>
                    <li><span>Торговые центры и Магазины</span></li>
                    <li><span>Спортивные объекты</span></li>
                    <li><span>Заводы и Предприятия</span></li>
                    <li><span>Кафе и Рестораны</span></li>
                    <li><span>Офисы и Бизнес-центры</span></li>
                    <li><span>АЗС и Автомойки</span></li>
                    <?php if (!empty($yupe->companyPhone)): ?>
                    <li>
                        <div class="btn-work-area">
                            <a class="btn-wh" href="<?php echo $yupe->companyTelegram;?>" rel="nofollow" target="_blank"><span class="icon-telegram"></span>Написать в Telegram</a>
                            <div class="section-10-block-tel">Подробности - <a class="tel-light" href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a></div>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="article-box">
        <div class="container">
            <div class="article-block">
                <!-- text block 1 -->
                <div class="column">
                    <h2 class="h2"><?php echo CHtml::encode($homepageDopContent->title);?></h2>
                    <?php echo $homepageDopContent->short_text;?>
                </div>
                <!-- text block 2 -->
                <div class="column">
                    <?php echo $homepageDopContent->preamble;?>
                </div>
                <!-- text block 3 -->
                <div class="column">
                    <div class="col">
                        <?php echo $homepageDopContent->full_text;?>
                    </div>
                    <div class="col">
                        <figure>
                            <img src="<?= CHtml::encode($homepageImage1->image->getImageUrl()) ?>" alt="<?= CHtml::encode($homepageImage1->image->alt) ?>">
                        </figure>
                    </div>
                </div>
                <!-- text block 4 -->
                <div class="column">
                    <?php echo $homepageDopContent->text_3;?>
                </div>
                <!-- text block 5 -->
                <div class="column">
                    <div class="col">
                        <!-- <h2>Заголовок второго уровня</h2> -->
                        <figure>
                            <img src="<?= CHtml::encode($homepageImage2->image->getImageUrl()) ?>" alt="<?= CHtml::encode($homepageImage2->image->alt) ?>">
                        </figure>
                    </div>
                    <div class="col">
                        <?php echo $homepageDopContent->text_4;?>
                    </div>
                </div>
                <!-- text block 6 -->
                <div class="column">
                    <?php echo $homepageDopContent->text_5;?>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($yupe->companyPhone)): ?>
    <div class="section-12">
        <div class="container">
            <div class="question">
                Остались вопросы ?
                <span>Спросите <img src="images/24_7.webp" alt=""> <a href="tel:<?= preg_replace('/[^0-9+]/', '', $yupe->companyUrlPhone) ?>" title="контактный телефон"><?= CHtml::encode($yupe->companyPhone) ?></a></span>
            </div>
        </div>
    </div>
    <?php endif; ?>

