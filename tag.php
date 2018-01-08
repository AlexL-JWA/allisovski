<?php get_header(); ?>


  <div class="baner services">

    <div class="baner-inner">

      <svg class="patern_2" data-name="right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.68 86.85"><defs></defs><title>Pattern2</title><polygon class="cls-1" points="63.87 86.85 63.67 86.48 29.84 22.84 30.5 22.49 64.14 85.76 126.34 43.76 63.44 0.62 63.87 0 127.68 43.77 127.22 44.08 63.87 86.85"/><polygon class="cls-1" points="63.79 86.61 0 42.35 0.46 42.05 63.45 0 63.86 0.62 1.33 42.37 64.22 86 63.79 86.61"/><rect class="cls-1" x="81.43" y="114.36" width="71.18" height="0.75" transform="translate(-75.52 104.5) rotate(-62.07)"/><rect class="cls-1" x="98.88" y="65.09" width="0.75" height="53.68" transform="translate(-70.88 52.22) rotate(-51.38)"/><rect class="cls-1" x="76.98" y="99.81" width="25.17" height="0.75" transform="translate(-80.91 31.93) rotate(-44.63)"/></svg>

      <svg id="patern_3" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.65 140.1"><defs><style></style></defs><title>Pattern3</title><path class="cls-1" d="M163.46,77.36" transform="translate(-36.23 -33.68)"/><polygon points="63.52 140.1 63.11 139.46 0.47 42.92 1.31 42.38 63.53 138.28 126.82 43.41 127.65 43.96 63.52 140.1"/><polygon points="64.18 87.13 29.89 23.1 30.78 22.63 64.53 85.68 126.96 43.27 127.52 44.1 64.18 87.13"/><rect x="131.22" y="17.31" width="1" height="76.83" transform="translate(-24.74 99.51) rotate(-55.72)"/><polygon points="64.07 86.82 0 42.65 63.47 0 64.03 0.83 1.78 42.66 64.64 85.99 64.07 86.82"/><polygon points="64.03 139.19 63.02 139.18 63.86 86.28 63.91 86.17 97.06 23.18 97.94 23.65 64.85 86.53 64.03 139.19"/><polygon points="63.97 111.37 0.52 42.99 1.25 42.31 63.98 109.9 126.88 43.34 127.6 44.03 63.97 111.37"/><rect x="98.82" y="39" width="1" height="53.68" transform="translate(-50.23 69) rotate(-51.55)"/><rect x="77.06" y="73.62" width="25.17" height="1" transform="translate(-62.42 50.94) rotate(-44.76)"/></svg>

      <svg id="patern_4" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 193.18 128.13"><defs><style></style></defs><title>Pattern4</title><path d="M99.75,167l-0.27-.18L3.7,102.89l96.45-63.48,0.27,0.18,96.46,63.64ZM5.51,102.89l94.25,62.87,95.3-62.53L100.14,40.6Z" transform="translate(-3.7 -39.12)"/><polygon points="76.36 98.33 75.89 97.46 138.76 63.38 96.45 1.78 37.98 88.51 37.16 87.95 96.44 0 140.22 63.73 76.36 98.33"/><polygon points="96.06 128.13 36.45 40.38 37.28 39.82 96.06 126.35 139.08 63.27 139.9 63.84 96.06 128.13"/><polygon points="192.27 64.61 139.36 64.05 139.26 64 76.1 31.17 76.56 30.29 139.61 63.05 192.28 63.62 192.27 64.61"/><polygon points="96.4 127.61 95.71 126.88 162.99 63.81 96.11 1.25 96.79 0.52 164.45 63.81 96.4 127.61"/><rect x="62.11" y="103.71" width="53.68" height="1" transform="translate(-51.64 70.7) rotate(-51.86)"/><rect x="96.78" y="101.25" width="1" height="25.17" transform="translate(-55.71 63.21) rotate(-45.08)"/></svg>

    </div>

  </div>
 </header>



 <main class="s_p search-results">
     <a href="#" id="scrollTop"><i class="icon-Up"></i></a>

     <section class="search projects">

         <div class="container">

             <div class="tabs_content">


                  <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>


                        <div class="proj_box">
                         <a href="<?= $post->guid; ?>" class="img_holder">
                          <img src="<?= get_the_post_thumbnail_url(); ?>" alt="proj">
                         </a>

                         <div class="discription">
                          <h5 class="title"><?= the_title(); ?></h5>
                          <div class="actions">
                           <a href="<?= $post->guid; ?>/#comments"><i class="icon-comments"></i><?= wp_count_comments($post->ID)->approved; ?></a>
                              <span>
                               <i class="icon-eye"></i>
                                    <?php

                                          $countViews = get_post_meta($post->ID, 'views_post')[0];

                                          echo (!$countViews) ? 0 : $countViews;

                                    ?>
                              </span>

                           <a href="#like" class="<?= ($_COOKIE['like_' . $post->ID]) ? 'like' : ''; ?>" data-id="<?= $post->ID; ?>">
                            <i class="icon-like"></i>

                            <?php $countLikes = get_post_meta($post->ID, 'like_post')[0]; ?>

                            <span><?= (!$countLikes) ? 0 : $countLikes; ?></span>

                           </a>
                          </div>
                         </div>
                        </div>


                  <?php endwhile; ?>
                  <?php endif; ?>

         </div>
       </div>
    </section>
</main>

<?php get_footer(); ?>