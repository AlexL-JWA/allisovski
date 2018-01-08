<!DOCTYPE html>

<html lang="<?php language_attributes(); ?>">


<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head();?>
</head>

    <body <?php body_class();?>>

<header>
    <div class="header-inner">
        
        <a href="<?= home_url(); ?>" class="logo"><img src="<?= get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Allisovski" title="Allisovski logo"></a>
        
        <a id="menu"><i class="icon-menu"></i></a>

        <a id="search"><i class="icon-search"></i></a>
        

        <nav>
            <ul>

                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'echo'            => true,
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                )); ?>

            </ul>
        </nav>


        <div class="header-search">

            <form id="searchForm" method="get" action="<?= home_url( '/' ) ?>">
                <div>
                    <input type="text" data-valid="text" name="s" id="s" />
                    <label>Поиск </label>
                    <div class="bar"></div>
                </div>

                <div>
                    <input type="submit" value="Найти" />
                </div>
            </form>

        </div>
    </div>