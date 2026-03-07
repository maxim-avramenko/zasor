<?php
$this->title = Yii::app()->getModule('yupe')->siteName;
$this->description = Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = Yii::app()->getModule('yupe')->siteKeyWords;

$this->canonical = $this->createAbsoluteUrl(Yii::app()->request->getPathInfo());

$this->schema = <<<EOF

EOF;

?>

    <main class="first-area">
        <div class="container">
            <h1>Устранение засоров<br>в Казани и округе</h1>
            <div class="box-first-area">
                <div class="col-first-area-left">
                    <div class="first-area-oplata">
                        <div class="first-area-oplata-nds">Работаем с <span><strong>НДС</strong> и без <strong>НДС</strong></span></div>
                        <div class="first-area-oplata-nal">Принимаем оплату:<span>наличный и безналичный расчет</span></div>
                    </div>
                    <div class="first-area-zakaz">
                        <div class="first-area-wh">
                            <a href="whatsapp://send?phone=79172612455&text=Добрый день!"><img src="/images/hd-24_7.webp" alt="">
                                <span>Заказать аварийную службу</span></a>
                        </div>
                        <div class="first-area-phone">
                            <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a>
                        </div>
                    </div>
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
                    <div class="border-figure">
                        <div class="border-radius-fff">
                            <span class="icon-question qr-head" rel="tooltip" data-title="На данный момент приложение на доработке" title=""></span>
                            <img src="/images/qr.webp" alt="">
                            <div class="box-google-apple-store-images">
                                <ul>
                                    <li><a href="#"><img src="/images/icons/app-store-logo.webp" alt=""></a></li>
                                    <li><a href="#"><img src="/images/icons/google-store-logo.webp" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="border-radius-fff-text">установить<br>приложение</div>
                        </div>
                    </div>
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
                    <div class="box-snip">Осуществляем прочистку засоров круглосуточно – <strong>24 часа в сутки 7 дней в неделю</strong></div>
                    <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a>
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
                    <div class="app-commercial-section">
                        Отслеживание<br>через приложение
                        <img src="images/AppStore.webp" alt="">
                        <img src="images/GooglePlay.webp" alt="">
                        <div class="qr-commercial-block">
                            <img src="images/qr.webp" alt="qr">
                        </div>
                    </div>
                    <div class="phone-col-commercial">
                        <ul>
                            <li><a href="https://t.me/Zasorynet" rel="nofollow" target="_blank"><span class="icon-telegram"></span></a></li>
                            <li><a href="whatsapp://send?phone=79172612455" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span></a></li>
                            <li><a href="tel:+79172612455"><span class="icon-phone"></span></a></li>
                        </ul>
                        <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a>
                        <time>Круглосуточно</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery">
        <div class="container">
            <div class="about__gallery">
                <a href="images/uslugi/kombinirovannaya-kanalopromyvochnaya-mashina/59.webp" data-fancybox="gallery" class="about__pic">
                    <img src="images/uslugi/kombinirovannaya-kanalopromyvochnaya-mashina/59.webp" alt="">
                </a>
                <a href="images/uslugi/ustanovka-pnevmozaglushki/2.webp" data-fancybox="gallery" class="about__pic">
                    <img src="images/uslugi/ustanovka-pnevmozaglushki/2.webp" alt="">
                </a>
                <a href="images/uslugi/ilosos/10.webp" data-fancybox="gallery" class="about__pic">
                    <img src="images/uslugi/ilosos/10.webp" alt="">
                </a>
                <a href="images/uslugi/vodovoz/6.webp" data-fancybox="gallery" class="about__pic">
                    <img src="images/uslugi/vodovoz/6.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/3.webp" data-fancybox="gallery" class="about__pic">
                    <img src="images/uslugi/ustranenie-zasora/3.webp" alt="">
                </a>
                <a href="javascript:void(0)" class="btn-main-gallery">
                    <span class="icon-arrow-right2 ring-btn-main"></span>Показать еще
                </a>
            </div>
        </div>
    </div>
    <div class="completed-works-gallery">
        <div class="container">
            <h2>Выполненные работы</h2>
            <div class="works__gallery">
                <a href="images/uslugi/ustranenie-zasora/1.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/1.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/2.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/2.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/5.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/5.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/16.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/16.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/38.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/38.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/40.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/40.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/30.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/30.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/17.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/17.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/16.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/16.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/15.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/15.webp" alt="">
                </a>
                <a href="images/uslugi/ustranenie-zasora/20.webp" data-fancybox="gallery" class="works__pic">
                    <img src="images/uslugi/ustranenie-zasora/20.webp" alt="">
                </a>
                <div class="info-completed-works-gallery">
                    <div>Более 10 лет <br>опыта</div>
                    <div><a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a><br></div>
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
                    <div class="work-area-content">
                        <p>Набережных Челнах, Нижнекамске,Альметевске, Лениногорске, Менделеевске  А также города: Зеленодольск, Айша, Столбище, Высокая Гора, Арск, Ореховка, Загородный клуб, Базарные матаки, Залесный, Нагорный, Дербышки, Рыбная слобода, Мирный, Куюки, Большие клыки, Малые клыки, Самосырово, Орловка, Осиново, Верхний Услон, Васильево, Пестрецы, Волжск, Лаишево, Богатые Сабы, Займище, Набережные Моркваши, Богородское, Салмычи, Алтан, Константиновка, Усады, Бор. Матюшино, Борисково, Вознесение </p>
                    </div>
                    <div class="work-area-snip">
                        Осуществляем прочистку засоров<span>круглосуточно – 24 часа в сутки 7 дней в неделю</span>
                    </div>
                    <div class="btn-work-area">
                        <a class="tel" href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a>
                        <a class="btn-wh" href="whatsapp://send?phone=79172612455" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                    </div>
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
                        <p><strong>Большой объём - большая скидка</strong> Особые условия для ТСЖ и ЖКХ. Подробнеости уточняйте по телефону</p>
                    </div>
                    <div class="tszh-uk-block-tel">
                        Подробности - <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a>
                    </div>
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
                    <li>
                        <div class="btn-work-area">
                            <a class="btn-wh" href="whatsapp://send?phone=79172612455" rel="nofollow" target="_blank"><span class="icon-whatsapp"></span>Написать в WhatsApp</a>
                            <div class="section-10-block-tel">Подробности - <a class="tel-light" href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="article-box">
        <div class="container">
            <div class="article-block">
                <!-- text block 1 -->
                <div class="column">
                    <h2 class="h2">Устранение засоров в Казани</h2>
                    <p>Компания «Засору НЕТ» занимается устранением засоров труб, раковин, унитазов и канализаций. Работаем с трубами из разных материалов, оперативно решаем самые сложные проблемы с выездом в любую точку Казани и в другие города Татарстана. Для ликвидации засоров используем современные методы, которые не вредят коммуникациям. На все виды работ предоставляем гарантию качества. Вы можете обратиться к нам в любое время суток, и специалисты немедленно выедут на объект, проведут прочистку канализации и устранение засоров в день обращения. <br>Мы работаем круглосуточно, без перерывов и выходных. Поэтому вызвать аварийную бригаду вы можете даже ночью или в праздничный день.</p>
                </div>
                <!-- text block 2 -->
                <div class="column">
                    <h2>От чего зависит цена устранения засора</h2>
                    <p>Стоимость прочистки канализации и устранения засоров зависит от размеров и материалов трубопровода, состояния труб, объема пробки и сложности работы. Еще на стоимость влияет способ очистки. Например, цена на устранение сложных засоров методом гидравлической промывки выше, чем на прочистку тросом.<br>Способ прочистки и окончательную стоимость определяют специалисты аварийной бригады после выезда на объект. Чтобы обсудить подробности и оформить заявку на устранение засоров в Казани и Татарстане, свяжитесь с нами по телефону.</p>
                </div>
                <!-- text block 3 -->
                <div class="column">
                    <div class="col">
                        <p><strong>Цены на услуги по устранению засоров</strong><br>Возможен наличный и безналичный расчет, заключение договора на обслуживание </p><br>
                        <p>Цены на услуги по прочистке инженерных сетей и труб зависят от нескольких определяющих факторов: габариты трубопровода, материал, из которого он сделан, состояние трубы, длина засорённого участка, сложность работ и метод прочистки. Компания «Засору НЕТ» работает по территории всей Республики Татарстан более 5 лет, мы предоставляем свои услуги в Казани и Набережных Челнах по выгодным ценам. Заранее определяем объем работ, составляем подробную смету на услуги.</p>
                    </div>
                    <div class="col">
                        <figure>
                            <img src="images/content-img1.png" alt="Картинка">
                        </figure>
                    </div>
                </div>
                <!-- text block 4 -->
                <div class="column">
                    <h2>Причины образования засоров</h2>
                    <p>При образовании засоров в канализационных трубах система перестает работать и даже может выйти из строя, если вовремя не принять меры. Чаще всего трубопровод засоряется бытовыми отходами и средствами личной гигиены. Если речь идет о незначительном засоре, прочистку можно сделать обычным вантузом. Но в большинстве случаев этого недостаточно, и без специального оборудования справиться не получается.</p> <br><p>Еще одна причина — скопление жира на стенках труб и заиливание канализации. Процесс неизбежен, поэтому чистку засоров придется делать по мере необходимости. Из подручных средств подойдет кипяток, сода или уксус. Еще можно попробовать химические препараты из хозяйственного магазина. Если и это не помогает, обращайтесь к нашим специалистам — они произведут устранение засоров недорого и быстро.</p><br>
                </div>
                <!-- text block 5 -->
                <div class="column">
                    <div class="col">
                        <!-- <h2>Заголовок второго уровня</h2> -->
                        <figure>
                            <img src="images/content-img2.png" alt="Картинка">
                        </figure>
                    </div>
                    <div class="col">
                        <p>Если трубы водоотведения проложены под неправильным углом, также может потребоваться прочистка и устранение засоров в канализации. На стенках быстро скапливается жир и прочие отложения, которые со временем образуют пробку. Предотвратить это можно еще на этапе закладки коммуникаций, а если проблема уже есть, вызывайте специалистов.<br>Показанием к устранению засоров канализации часто становится несвоевременная откачка септика или выгребной ямы. При переполнении резервуара вся грязь идет в трубопровод. Чтобы этого не произошло, нужно регулярно откачивать колодец. А если трубы уже забились, то для очистки потребуется специальное оборудование.</p>
                    </div>
                </div>
                <!-- text block 6 -->
                <div class="column">
                    <h2>Методы устранения засоров канализации</h2>
                    <p><strong>Гидродинамическая промывка</strong> - используется для устранения застаревших канализационных засоров — жира, накипи, песка и органического мусора. Современное оборудование справляется даже там, где механическая чистка бессильна.<br><br>
                        <strong>Механическая прочистка</strong> - канализации позволяет удалить из труб инородные твердые предметы, частицы бытового и строительного мусора, справиться с затверделой грязью в труднодоступных местах.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section-12">
        <div class="container">
            <div class="question">
                Остались вопросы ?
                <span>Спросите <img src="images/24_7.webp" alt=""> <a href="tel:+79172612455" title="контактный телефон">8 (917) 261 24 55</a></span>
            </div>
        </div>
    </div>

