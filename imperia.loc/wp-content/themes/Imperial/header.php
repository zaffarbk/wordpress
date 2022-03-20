<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet" />
    <?php wp_head();?>
</head>
<body>
    <div class="z">
        <!-- HEADER -->
        <?php
            $pageid = get_the_ID();
        ?>
        <header class="header<?php if($pageid != 61 && $pageid != 72 && $pageid != 96 && !is_single() && !is_category()){ ?> header_transperent<?php } ?>">
            <div class="wrapper-long header__wrapper">
                <a href="/" class="header__logo logo">
                    <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="" />
                <a>
                <!-- NAV -->
                <nav class="nav">
                    <!-- CATALOG -->
                    <div class="nav__catalog-list">
                        <div class="nav__item nav__item_catalog nav__item_sub-menu">
                            <div class="nav__icon">
                                <div class="nav__icon-short"></div>
                                <div class="nav__icon-short"></div>
                                <div class="nav__icon-short"></div>
                                <div class="nav__icon-short"></div>
                                <div class="nav__icon-short"></div>
                                <div class="nav__icon-short"></div>
                            </div>
                            <a href="<?= get_field('catalog' , 'options')['url']; ?>" class="nav__link"><?= get_field('catalog' , 'options')['title']; ?></a>
                            <div class="sub-menu catalog-menu">
                                <div class="wrapper catalog-menu__wrapper">
                                    <div class="catalog-menu__list">
                                        <?php foreach(get_field('catalog_submenu' , 'options') as $val){ ?>
                                        <div class="catalog-menu__item <?= $val['class']; ?>">
                                            <a href="<?= $val['url']; ?>" class="catalog-menu__item-head"><?= $val['link']; ?></a>
                                            <?php foreach($val['lvl2'] as $value){ ?>
                                            <a class="catalog-menu__item-link" href="<?= $value['link']['url'] ?>"><?= $value['link']['title'] ?></a>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CATALOG -->

                    <!-- MENU -->
                    <ul class="nav__list">
                        <?php foreach(get_field('topmenu' , 'options') as $val){ ?>
                        <li class="nav__item nav__item_sub-menu">
                            <a href="<?= $val['title']['url']; ?>" class="nav__link"><?= $val['title']['title']; ?></a>
                            <?php if(is_array($val['lvl2'])){ ?>
                            <div class="sub-menu sub-menu_about">
                                <div class="wrapper sub-menu__wrapper">
                                    <div class="sub-menu__list">
                                        <?php foreach($val['lvl2'] as $value){ ?>
                                        <div class="sub-menu__item sub-menu__item">
                                            <a href="<?= $value['link']['url'] ?>" class="sub-menu__link sub-menu__link_head <?= $value['class']; ?>"><?= $value['link']['title'] ?></a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- MENU -->
                </nav>
                <!-- NAV -->

                <!-- CONTACTS -->
                <div class="header__contacts">
                    <a class="header__contacts-link header__contacts-link_phone" href="tel:<?= get_field('site_tel-link' ,  'options') ?>"><?= get_field('site_tel' , 'options'); ?></a>
                    <a class="header__contacts-link header__contacts-link_mail" href="mailto:<?= get_field('site_mail' ,  'options') ?>"><?= get_field('site_mail' ,  'options'); ?></a>
                </div>
                <!-- CONTACTS -->

                <!-- MENU MOBILE -->
                <div class="nav-mobile">
                    <div class="nav-mobile__link">
                        <div class="nav-mobile__icon">
                            <div class="nav-mobile__icon-short"></div>
                            <div class="nav-mobile__icon-short"></div>
                            <div class="nav-mobile__icon-short"></div>
                        </div>
                        <span> Меню </span>
                        <div class="sub-menu sub-menu_mobile">
                            <div class="wrapper sub-menu__wrapper">
                                <div class="sub-menu__list">
                                    <?php foreach(get_field('topmenu' , 'options') as $val){ ?>
                                    <div class="sub-menu__item">
                                        <a href="<?= $val['title']['url']; ?>" class="sub-menu__link sub-menu__link_head"><?= $val['title']['title']; ?></a>
                                         <?php if(is_array($val['lvl2'])){ ?>
                                        <div class="sub-menu__item-links">
                                             <?php foreach($val['lvl2'] as $value){ ?>
                                            <a href="<?= $value['link']['url'] ?>"><?= $value['link']['title'] ?></a>
                                             <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MENU MOBILE -->
            </div>
        </header>
        <!-- HEADER -->