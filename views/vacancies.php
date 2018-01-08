<?php
/**
 * Template name: Vacancies
 */
?>


<?php get_header(); ?>


<?php  if ( have_posts() ) :  while ( have_posts() ) : the_post();

$data = get_fields(get_the_ID());
    
?>

    <div class="baner vacancy services">
        <div class="baner-inner">

            <?php if(isset($data['title_1_v'])): ?>

                    <h1><?= $data['title_1_v']; ?></h1>

            <?php endif; ?>

            <svg id="patern_3" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.65 140.1"><defs><style></style></defs><title>Pattern3</title><path class="cls-1" d="M163.46,77.36" transform="translate(-36.23 -33.68)"/><polygon points="63.52 140.1 63.11 139.46 0.47 42.92 1.31 42.38 63.53 138.28 126.82 43.41 127.65 43.96 63.52 140.1"/><polygon points="64.18 87.13 29.89 23.1 30.78 22.63 64.53 85.68 126.96 43.27 127.52 44.1 64.18 87.13"/><rect x="131.22" y="17.31" width="1" height="76.83" transform="translate(-24.74 99.51) rotate(-55.72)"/><polygon points="64.07 86.82 0 42.65 63.47 0 64.03 0.83 1.78 42.66 64.64 85.99 64.07 86.82"/><polygon points="64.03 139.19 63.02 139.18 63.86 86.28 63.91 86.17 97.06 23.18 97.94 23.65 64.85 86.53 64.03 139.19"/><polygon points="63.97 111.37 0.52 42.99 1.25 42.31 63.98 109.9 126.88 43.34 127.6 44.03 63.97 111.37"/><rect x="98.82" y="39" width="1" height="53.68" transform="translate(-50.23 69) rotate(-51.55)"/><rect x="77.06" y="73.62" width="25.17" height="1" transform="translate(-62.42 50.94) rotate(-44.76)"/></svg>

            <svg id="patern_4" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 193.18 128.13"><defs><style></style></defs><title>Pattern4</title><path d="M99.75,167l-0.27-.18L3.7,102.89l96.45-63.48,0.27,0.18,96.46,63.64ZM5.51,102.89l94.25,62.87,95.3-62.53L100.14,40.6Z" transform="translate(-3.7 -39.12)"/><polygon points="76.36 98.33 75.89 97.46 138.76 63.38 96.45 1.78 37.98 88.51 37.16 87.95 96.44 0 140.22 63.73 76.36 98.33"/><polygon points="96.06 128.13 36.45 40.38 37.28 39.82 96.06 126.35 139.08 63.27 139.9 63.84 96.06 128.13"/><polygon points="192.27 64.61 139.36 64.05 139.26 64 76.1 31.17 76.56 30.29 139.61 63.05 192.28 63.62 192.27 64.61"/><polygon points="96.4 127.61 95.71 126.88 162.99 63.81 96.11 1.25 96.79 0.52 164.45 63.81 96.4 127.61"/><rect x="62.11" y="103.71" width="53.68" height="1" transform="translate(-51.64 70.7) rotate(-51.86)"/><rect x="96.78" y="101.25" width="1" height="25.17" transform="translate(-55.71 63.21) rotate(-45.08)"/></svg>
        </div>
    </div>
</header>



    <main class="s_p">

        <a href="#" id="scrollTop"><i class="icon-Up"></i></a>

        <section class="vacancy">
            <div class="container">
                <div class="positions_holder">

                    <?php foreach ($data['blocks_1_v'] as $block): ?>

                        <div class="position">

                            <i class="icon-Pattern4"></i>

                            <p class="title"><?= $block['title_block_v']; ?></p>

                            <div class="desc"><?= $block['desc_block_v']; ?></div>


                            <p class="info"><?= $block['note_block_v']; ?></p>

                            <div class="buttons">
                                <a href="#" class="button" data-toggle="modal" data-target="#vacancy">Отправить заявку</a>
                            </div>

                        </div>


                    <?php endforeach; ?>

                </div>
            </div>
        </section>

    </main>


<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>

