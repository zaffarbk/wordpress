</div>
<!-- FOOTER -->
<footer class="footer">
    <div class="wrapper">
        <div class="footer__top-line">
            <div class="footer__top-line-left">
                <div class="footer__catalog">
                    <div class="footer__catalog-head">Каталог</div>
                    <div class="footer__catalog-list">
                        <div class="footer__catalog-list-column">
                            <?php 
                            $count = (round(count(get_field('catalog_submenu' , 'options'))) / 2);
                            $count1 = 0;
                            foreach(get_field('catalog_submenu' , 'options') as $val){
                                if($count1 == $count){
                                ?>
                        </div>
                        <div class="footer__catalog-list-column">
                                <?php
                            }
                            ?>
                            <a href="<?= $val['url']; ?>" class="footer__catalog-item footer__catalog-item_head"><?= $val['link']; ?></a>
                            <?php foreach($val['lvl2'] as $value){ ?>
                                <a class="footer__catalog-item" href="<?= $value['link']['url'] ?>"><?= $value['link']['title'] ?></a>
                            <?php } ?>
                            <?php $count1++; }  ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__top-line-right">
                <div class="footer__nav">
                    <ul class="footer__nav-list">
                        <li class="footer__nav-item">
                            <a href="/" class="footer__nav-link footer__nav-link_main">Главная</a>
                        </li>
                        <?php foreach(get_field('topmenu' , 'options') as $val){ ?>
                        <li class="footer__nav-item">
                            <a href="<?= $val['title']['url']; ?>" class="footer__nav-link"><?= $val['title']['title']; ?></a>
                            <?php if(is_array($val['lvl2'])){ ?>
                            <ul class="footer__nav-sub-list">
                                <?php foreach($val['lvl2'] as $value){ ?>
                                <li class="footer__nav-sub-item">
                                    <a href="<?= $value['link']['url'] ?>" class="footer__nav-sub-link"><?= $value['link']['title'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer__contacts">
                    <a href="/" class="logo footer__logo">
                        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="" />
                    </a>
                    <a class="footer__contacts-link footer__contacts-link_phone" href="tel:<?= get_field('site_tel-link' , 'options'); ?>"><?= get_field('site_tel' , 'options'); ?></a>
                    <div class="footer__contacts-link footer__contacts-link_adr">
                        <?= get_field('site_address' , 'options'); ?>
                    </div>
                    <a class="footer__contacts-link footer__contacts-link_mail" href="mailto:<?= get_field('site_mail' , 'options'); ?>"><?= get_field('site_mail' , 'options'); ?></a>
                </div>
            </div>
        </div>
        <div class="footer__bottom-line"><?= get_field('copyright' , 'options'); ?></div>
    </div>
</footer>
<!-- FOOTER -->
<?php wp_footer();?>
</html>
