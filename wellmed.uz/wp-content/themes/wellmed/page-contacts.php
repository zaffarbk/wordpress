<?php get_header() ?>
<div class="container-xl">
	<nav class="breadcrumb">
		<?= do_shortcode( '[flexy_breadcrumb]'); ?>
	</nav>
</div>
    <div class="contactinfo">
        <div class="container-xl">
            <div class="contactinfo__inner">
                <h3 class="contactinfo__title default-title">Сontact us</h3>
                <div class="contactinfo__subtitle-wrapper">
                    <h6 class="contactinfo__subtitle">Infoline and Appointments:</h6>
                    <a class="contactinfo__btn" href="#!">
                        <svg width="16" height="16" fill='white'>
                            <use xlink:href='#message'></use>
                        </svg>&nbsp;
                        Consultation
                    </a>
                </div>
                <div class="contactinfo__info-wrapper">
                    <a href="tel:71 200 00 00">
                        <svg width="24" height="25" fill="#00AFEF">
                            <use xlink:href='#smartphone'></use>
                        </svg>
                        <div>
                            <span>Tel</span>
                            <p>71 200 00 00</p>
                        </div>
                    </a>
                    <a href="tel:90 900 00 00">
                        <div>
                            <span>Mob</span>
                            <p>90 900 00 00</p>
                        </div>
                    </a>
                    <a href="mailto:example@gmail.com">
                        <svg width="24" height="20" fill="#00AFEF">
                            <use xlink:href='#mail-empty'></use>
                        </svg>
                        <div>
                            <span>Mail</span>
                            <p><?php the_field('pochta', 'options') ?></p>
                        </div>
                    </a>
                    <a
                        href="https://www.google.ru/maps/search/117,+st.+Usta+Shirin+house,+Almazar+district,+Tashkent+Uzbekistan+/@41.3531653,69.2509896,17z/data=!3m1!4b1">
                        <svg width="24" height="24" fill="#00AFEF">
                            <use xlink:href='#map-empty'></use>
                        </svg>
                        <div>
                            <span>Address</span>
                            <p><?php the_field('adress', 'options') ?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="map contacts-map">
        <div class="container-xl">
            <div class="map-card">
                <div>
                    <div class="map-card__main active">Main</div>
                    <div class="map-card__main">HR department</div>
                    <div class="map-card__main">Marketing</div>
                    <div class="map-card__main">For partners</div>
                </div>
                <div class="map-card__content">
                    <a class="map-card__address"
                        href="https://www.google.ru/maps/search/117,+st.+Usta+Shirin+house,+Almazar+district,+Tashkent+Uzbekistan+++Get+direction/@41.3531653,69.2509896,17z/data=!3m1!4b1">
                        <svg class="map-card__map-icon" width='14' height='18' fill='#16B8C2'>
                            <use xlink:href='#map-icon'></use>
                        </svg>
                        117, st. Usta Shirin house, Almazar district, Tashkent Uzbekistan
                    </a>
                    <div class="map-card__phone">
                        <svg class="map-card__phone-icon" width='16' height='16' fill='#16B8C2'>
                            <use xlink:href='#phone-icon'></use>
                        </svg>
                        <a href="tel:+998712281692">+(998-71) 228-16-92</a> <br>
                        <a href="tel:+998712281693">+(998-71) 228-16-93</a> <br>
                        <a href="tel:+998712281694">+(998-71) 228-16-94</a>
                    </div>
                    <a class="map-card__mail" href="mailto:info@stardompharma.com">
                        <svg class="map-card__mail-icon" width="18" height="12" fill='#16B8C2'>
                            <use xlink:href='#envelope'></use>
                        </svg>
                        info@stardompharma.com
                    </a>
                </div>
            </div>
        </div>
        <div id="map__content" class="map__content"></div>
    </div>
<?php get_footer() ?>