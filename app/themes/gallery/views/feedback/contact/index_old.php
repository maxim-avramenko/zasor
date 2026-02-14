<?php
$this->title = [Yii::t('FeedbackModule.feedback', 'Contacts'), Yii::app()->getModule('yupe')->siteName];
$this->layout = '//layouts/mainpage-new';
?>
<?php $this->layout = '//layouts/mainpage-new'; ?>

<section class="contacts-page">
	<div id="map" style="height: 450px; position: relative; overflow: hidden;"></div>
	<div class="contacts">
		<div class="wrap">
			<div class="items">
			<?/*
				<div class="item">
					<h3>Адрес</h3>
					<p>Москва, Ул&nbsp;Рочдельская&nbsp;15, стр.&nbsp;21</p>
				</div>
				<div class="item">
					<h3>Телефон</h3>
					<p>8 800 200 46 40</p>
				</div>
				<div class="item">
					<h3>Email</h3>
					<p><a href="mailto:hello@artlife-pro.com">hello@artlife-pro.com</a></p>
				</div>
			*/?>
				<div class="item">
					<h3>Адреса</h3>
					<p>Офис: Москва, Ул Рочдельская 15, стр. 21</p>
					<p>Юр.адрес: 117465, г.Москва, ул.Теплый Стан д.5 корп.4 кв.21</p>
				</div>
				<div class="item">
					<h3>Контакты</h3>
					<p>8 800 200 4640</p>
					<p><a href="mailto:hello@artlife-pro.com">hello@artlife-pro.com</a></p>
				</div>
				<div class="item">
					<h3>Реквизиты</h3>
					<p>ИП Андреева А.А.<br>ОГРНИП: 315774600350281<br>ИНН: 237303851368</p>
				</div>
			</div>

			<p align="cetner">
				<img src="/web/img/map1.jpg" width="50%" alt="">
                <img src="/web/img/map2.jpg" width="50%" alt="">
			</p>
		</div>
	</div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF1cJYF593_2boxYsQ1VxzAOTn6oOWolk&amp;callback=initMap" async="" defer=""></script>
<script>
function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 55.75541311211137, lng: 37.56328584445805},
		zoom: 17,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	});

	var marker = new google.maps.Marker({
		position:  {lat: 55.75541311211137, lng: 37.56328584445805},
		map: map,
		draggable: true,
	});
}
</script>
