<?php 

    get_header();

     if ( have_posts() ) :  while ( have_posts() ) : the_post();

?>

<?php

     $tagsPost = wp_get_post_tags(get_the_ID());

     $drawings_all = get_field('drawings_all', get_the_ID());

     $sliders = get_field('sliders_all', get_the_ID());

     $header_button = get_field('header_button', $post_id);

?>
         <div class="baner services single">
             <div class="baner-inner">
                 <div class="container_calc">

                     <?php $number_pr = get_field('number_pr'); ?>

                     <h1><?= (isset($number_pr) && !empty($number_pr)) ? '<span class="number">'.$number_pr.' </span>': ''; ?><?php the_title(); ?></h1>

                     <?php echo the_content(); ?>

                 </div>

                 <svg class="patern_2" data-name="right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.68 86.85"><defs></defs><title>Pattern2</title><polygon class="cls-1" points="63.87 86.85 63.67 86.48 29.84 22.84 30.5 22.49 64.14 85.76 126.34 43.76 63.44 0.62 63.87 0 127.68 43.77 127.22 44.08 63.87 86.85"/><polygon class="cls-1" points="63.79 86.61 0 42.35 0.46 42.05 63.45 0 63.86 0.62 1.33 42.37 64.22 86 63.79 86.61"/><rect class="cls-1" x="81.43" y="114.36" width="71.18" height="0.75" transform="translate(-75.52 104.5) rotate(-62.07)"/><rect class="cls-1" x="98.88" y="65.09" width="0.75" height="53.68" transform="translate(-70.88 52.22) rotate(-51.38)"/><rect class="cls-1" x="76.98" y="99.81" width="25.17" height="0.75" transform="translate(-80.91 31.93) rotate(-44.63)"/></svg>

                 <svg id="patern_4" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 193.18 128.13"><defs><style></style></defs><title>Pattern4</title><path d="M99.75,167l-0.27-.18L3.7,102.89l96.45-63.48,0.27,0.18,96.46,63.64ZM5.51,102.89l94.25,62.87,95.3-62.53L100.14,40.6Z" transform="translate(-3.7 -39.12)"/><polygon points="76.36 98.33 75.89 97.46 138.76 63.38 96.45 1.78 37.98 88.51 37.16 87.95 96.44 0 140.22 63.73 76.36 98.33"/><polygon points="96.06 128.13 36.45 40.38 37.28 39.82 96.06 126.35 139.08 63.27 139.9 63.84 96.06 128.13"/><polygon points="192.27 64.61 139.36 64.05 139.26 64 76.1 31.17 76.56 30.29 139.61 63.05 192.28 63.62 192.27 64.61"/><polygon points="96.4 127.61 95.71 126.88 162.99 63.81 96.11 1.25 96.79 0.52 164.45 63.81 96.4 127.61"/><rect x="62.11" y="103.71" width="53.68" height="1" transform="translate(-51.64 70.7) rotate(-51.86)"/><rect x="96.78" y="101.25" width="1" height="25.17" transform="translate(-55.71 63.21) rotate(-45.08)"/></svg>
             </div>
         </div>


         <section class="proj_info">

             <?php $project = get_field('project'); ?>

             <?php if(isset($project) && !empty($project)): ?>

                 <div class="block">
                     <p class="title">
                         Проект:
                     </p>
                     <p class="discription">
                         <?= $project; ?>
                     </p>
                 </div>

             <?php endif; ?>


             <?php $date = get_the_date('d.m.Y'); ?>

             <?php if(isset($date) && !empty($date)): ?>

                 <div class="block">
                     <p class="title">
                         Дата:
                     </p>
                     <p class="discription">
                         <?= $date ?>
                     </p>
                 </div>

             <?php endif; ?>


             <?php $set_of_drawings = get_field('set_of_drawings'); ?>

             <?php if(isset($set_of_drawings) && !empty($set_of_drawings)): ?>

                 <div class="block">
                     <p class="title">
                         Комплект чертежей:
                     </p>
                     <p class="discription">
                         <?= $set_of_drawings; ?>
                     </p>
                 </div>

             <?php endif; ?>



             <?php $disigner = get_field('disigner'); ?>

             <?php $disigner_url = get_field('disigner_url'); ?>

             <?php if(isset($disigner) && !empty($disigner) && isset($disigner_url) && !empty($disigner_url)): ?>

                 <div class="block">
                     <p class="title">
                         Дизайнер:
                     </p>
                     <p class="discription">
                         <?= $disigner; ?>
                         <br>
                         <?= $disigner_url; ?>
                     </p>
                 </div>

             <?php endif; ?>



             <?php if(isset($tagsPost) && !empty($tagsPost)): ?>

                 <div class="block">
                     <p class="title">
                         Теги:
                     </p>
                     <p class="discription">
                         <?php foreach ($tagsPost as $tag): ?>

                             <a href="<?= get_tag_link($tag->term_id); ?>">#<?= $tag->name; ?></a>

                         <?php endforeach; ?>
                     </p>
                 </div>

             <?php endif; ?>

         </section>


</header>

<main class="s_p">

    <a href="#" id="scrollTop"><i class="icon-Up"></i></a>

    <div class="container_calc">

        <?php if(isset($drawings_all) && !empty($drawings_all)): ?>

            <section class="single">

                <?php foreach($drawings_all as $drawing): ?>

                <div class="img_holder">
                    <a data-fancybox="gallery" href="<?= $drawing['drawing']?>">
                        <img src="<?= $drawing['drawing']?>" alt="plan">
                    </a>
                </div>

                <?php endforeach; ?>

                <?php if (isset($header_button) && !empty($header_button)): ?>
                       <div class="buttons">
                            <a href="<?= get_permalink(32). '?id='. get_the_ID(); ?>" class="button"><?= $header_button ?></a>
                        </div>     
                        
                <?php endif; ?>

                

            </section>

        <?php endif; ?>


        <?php if(isset($sliders) && !empty($sliders)):?>

            <section class="proj_slider">

                <div class="slider">

                    <?php foreach ($sliders as $slider):?>

                        <div class="item"><a href="<?= $slider['link'] ?>"><img src="<?= $slider['slider_img'] ?>" alt="interior"></a></div>

                    <?php endforeach; ?>

                </div>



                <?php $url_3d_img = get_field('url_3d_img'); ?>

                <?php if(isset($url_3d_img) && !empty($url_3d_img)): ?>

                    <div class="buttons">
                        <a href="<?= $url_3d_img; ?>" class="button" title="Просмотреть все 3D визуализации проекта">Просмотреть все 3D визуализации проекта</a>
                    </div>

                <?php endif; ?>


            </section>

        <?php endif; ?>



        <?php

            function mytheme_comment($comment, $args, $depth){

            $GLOBALS['comment'] = $comment; ?>

            <li <?php comment_class(); ?> id='comment-<?php comment_ID(); ?>'>

                <?php if($depth != 1):?>

                    <img src="<?= get_stylesheet_directory_uri(); ?>/img/Comment.svg" alt="#">

                <?php endif; ?>

                <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

                    <div class="comment-author vcard">

                        <cite class="fn"><?php echo get_comment_author_link() ?></cite>

                    </div>

                    <div class="comment-meta commentmetadata">

                        <?php printf( '%1$s', get_comment_date()); ?>

                    </div>

                    <?php comment_text(); ?>

                    <div class="reply">

                        <a rel="nofollow" class="comment-reply-link"  data-comment-id = "<?php comment_ID(); ?>" href="#" aria-label="Комментарий к записи <?php echo get_comment_author_link() ?>">Ответить</a>

                    </div>

                </div>


        <?php }?>


        <a name="comments" style="height: 0;clear: both;display: block;width: 100%;"></a>

        <section class="comments">



            <ul class="commentlist">

                <?php

                    $comments = get_comments(array(
                        'post_id' => get_the_ID(),
                        'status' => 'approve'
                    ));

                    wp_list_comments(array(
                        'per_page' => -1,
                        'reverse_top_level' => false,
                        'callback' => 'mytheme_comment',
                    ), $comments);

                ?>
            </ul>

        </section>

    </div>


    <section class="commentForm communications">

        <div class="container_calc">
            <form id="commentForm">
                <h2>Комментировать</h2>

                <h3 id = "cancel_reply">отменить ответ</h3>

                <input type="hidden" name="id_comment" id = "id_comment" value="">
                <input type="hidden" name="id_post" id = "id_post" value="<?= get_the_ID(); ?>">

                <div>
                    <input type="text" data-valid="text" name = "user_name"/>
                    <label>Ваше имя </label>
                    <div class="bar"></div>
                </div>

                <div>
                    <textarea type="text" data-valid="text" name = "text_comment" placeholder="Комментарий"></textarea>
                </div>


                <div>
                    <input type="submit" value="Отправить" />
                </div>
            </form>
        </div>

        <svg class="patern_2" data-name="left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.68 86.85"><defs></defs><title>Pattern2</title><polygon class="cls-1" points="63.87 86.85 63.67 86.48 29.84 22.84 30.5 22.49 64.14 85.76 126.34 43.76 63.44 0.62 63.87 0 127.68 43.77 127.22 44.08 63.87 86.85"/><polygon class="cls-1" points="63.79 86.61 0 42.35 0.46 42.05 63.45 0 63.86 0.62 1.33 42.37 64.22 86 63.79 86.61"/><rect class="cls-1" x="81.43" y="114.36" width="71.18" height="0.75" transform="translate(-75.52 104.5) rotate(-62.07)"/><rect class="cls-1" x="98.88" y="65.09" width="0.75" height="53.68" transform="translate(-70.88 52.22) rotate(-51.38)"/><rect class="cls-1" x="76.98" y="99.81" width="25.17" height="0.75" transform="translate(-80.91 31.93) rotate(-44.63)"/></svg>

        <svg class="patern_2" data-name="right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.68 86.85"><defs></defs><title>Pattern2</title><polygon class="cls-1" points="63.87 86.85 63.67 86.48 29.84 22.84 30.5 22.49 64.14 85.76 126.34 43.76 63.44 0.62 63.87 0 127.68 43.77 127.22 44.08 63.87 86.85"/><polygon class="cls-1" points="63.79 86.61 0 42.35 0.46 42.05 63.45 0 63.86 0.62 1.33 42.37 64.22 86 63.79 86.61"/><rect class="cls-1" x="81.43" y="114.36" width="71.18" height="0.75" transform="translate(-75.52 104.5) rotate(-62.07)"/><rect class="cls-1" x="98.88" y="65.09" width="0.75" height="53.68" transform="translate(-70.88 52.22) rotate(-51.38)"/><rect class="cls-1" x="76.98" y="99.81" width="25.17" height="0.75" transform="translate(-80.91 31.93) rotate(-44.63)"/></svg>

        <svg class="patern_3" data-name="right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.65 140.1"><defs><style></style></defs><title>Pattern3</title><path class="cls-1" d="M163.46,77.36" transform="translate(-36.23 -33.68)"/><polygon points="63.52 140.1 63.11 139.46 0.47 42.92 1.31 42.38 63.53 138.28 126.82 43.41 127.65 43.96 63.52 140.1"/><polygon points="64.18 87.13 29.89 23.1 30.78 22.63 64.53 85.68 126.96 43.27 127.52 44.1 64.18 87.13"/><rect x="131.22" y="17.31" width="1" height="76.83" transform="translate(-24.74 99.51) rotate(-55.72)"/><polygon points="64.07 86.82 0 42.65 63.47 0 64.03 0.83 1.78 42.66 64.64 85.99 64.07 86.82"/><polygon points="64.03 139.19 63.02 139.18 63.86 86.28 63.91 86.17 97.06 23.18 97.94 23.65 64.85 86.53 64.03 139.19"/><polygon points="63.97 111.37 0.52 42.99 1.25 42.31 63.98 109.9 126.88 43.34 127.6 44.03 63.97 111.37"/><rect x="98.82" y="39" width="1" height="53.68" transform="translate(-50.23 69) rotate(-51.55)"/><rect x="77.06" y="73.62" width="25.17" height="1" transform="translate(-62.42 50.94) rotate(-44.76)"/></svg>
    </section>


    <svg id="green_ball" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 499.88 495.55"><defs><style>.cls-1{isolation:isolate;}.cls-2{mix-blend-mode:hard-light;}.cls-3{fill:#8ac832;}</style></defs><title>Green ball</title><g class="cls-1"><g id="Layer_1" data-name="Layer 1"><g class="cls-2"><path class="cls-3" d="M212.89,430.7l95.47-162,0.2,0.42,77.25,162.07-0.37,0Zm95.43-161L213.79,430.16,385,430.72Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M385.39,431.45l-0.19-.39L307.92,268.92l0.45,0L474,287.44l-0.24.34ZM308.76,269.51l76.7,160.94,87.68-142.61Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M474,287.94l-0.42,0-165.91-18.5,0.56-.38L432,184.78l0.12,0.29ZM309,269l164.15,18.3L431.78,185.54Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M308.24,269.58l-0.13-.26-35.86-72.8,0.37,0,160.19-11.65ZM273,197l35.41,71.88L431,185.47Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M272.66,197l-0.07-.5,108.93-20.8h0l52.31,9.56ZM381.52,176.2l-104.61,20,153-11.13Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M554.9,293.12l-81.53-5.28-0.06-.15-42-103.41Zm-81.18-5.76,79.75,5.17L432.52,186Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M554.76,293.92l-124-109.47,82.7,31.17,0,0.08Zm-121.67-108L553,291.73l-40-75.72Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M554.07,293.13l-41.84-78.67,68.9,68.67Zm-39.84-76,40.08,75.35,25.91-9.58Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M602.65,318.22l-49.08-25.43,27.21-10.05Zm-47.84-25.35,46.47,24.08-20.71-33.6Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M566.51,433.56l-0.49,0-181-2.36,0.25-.36,88.37-143.62,0.2,0.32Zm-180.63-2.83L565.57,433l-92-144.89Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M460.26,592.72l-0.18-.41L385,430.67l181.46,2.42-0.24.36Zm-74.43-161.5,74.52,160.48L565.59,433.53Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M303.76,569.68l-0.23-.36L212.89,430.2l0.44,0,172.52,0.68-0.21.39Zm-90-139,89.92,138L385,431.4Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M200.4,575.21l0-.29,12.73-145.24,0.4,0.61,90.63,139.12-0.43,0Zm13.13-144L200.95,574.68,303.29,569Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M341.09,660.18L199.85,574.74l0.81,0,103.24-5.77,0.07,0.17Zm-139.59-85L340.06,659l-36.49-89.53Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M342.47,660.43l-79.23-24.86-64.36-62Zm-78.92-25.26,75.12,23.54-136.21-82.4Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M201.69,576.6l-30.63-37.86L135.38,430.51l0.46-.18Zm-30.17-38.06,28.13,34.74-62.31-138.4Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M381.53,665.59h0l-43.18-6.07,150.21-12.27,0.06,0.5Zm-38.69-5.95,38.68,5.44,101.09-16.86Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M340.45,659.94l-37.11-91.06,0.43,0.06,157.29,23.14-0.63.36ZM304.13,569.5l36.56,89.72,118.85-66.86Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M339.47,659.92l1-.56,120-67.49,0.12,0.23,28.42,55.61-0.38,0ZM460.2,592.56L341.68,659.24l146.46-12Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M488.48,647.9l-0.16-.29-28.38-55.26,0.3-.08,121.32-33.94-0.71.68Zm-27.81-55.24,27.93,54.42,91.18-87.75Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M200.84,575.92L135.23,430.18h78.39l0,0.27ZM136,430.68L200.51,574l12.56-143.29H136Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M178.84,305.38l0.54-.62L272.7,196.29l0.17,0.34,35.83,72.74Zm93.75-108.18-92.3,107.26L308,269.06Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M213.67,430.68H135.26l0.12-.33,44.22-126.28Zm-77.7-.5h77L179.53,305.76Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M135.85,430.51l-0.48-.14,25.93-106,0,0,18.86-20.47Zm25.9-105.9L137.08,425.48,178.93,306Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M160.59,325.87l13.71-28.8,98.17-100.5,0.37,0.34L179.75,305.08Zm14.09-28.48-12.22,25.72,16.92-18.36,87.91-102.16Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M213.25,431.07l-0.15-.57L179.26,304.74l0.24-.07,129.37-35.86-0.31.53Zm-33.38-126,33.56,124.7,94.38-160.17Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M460.72,592.53l-0.46-.07L303.35,569.38l0.17-.31,82-138.5,0.21,0.46ZM304.12,569L459.89,591.9,385.45,431.7Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M459.72,592.64l0.38-.56L566.2,433.19l0.08,0.66L580.95,559l-0.21.06ZM565.87,434.57l-105,157.22L580.4,558.64Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M580.54,559.82L565.75,433l65.16,1.76,0.08,0.34ZM566.32,433.52l14.49,124.31,49.59-122.55Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M566.37,434.89l-0.54-.87L473.11,287.36l81.31,5.23,0,0.22Zm-92.32-147,91.65,145L554,293.06Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M630.79,435.28l-65-1.76-12-141.87ZM566.27,433l64.08,1.76L554.54,294Z" transform="translate(-133.52 -172.28)"/><path class="cls-3" d="M631,435.13l-0.45,0-77-142.92,48.59,25.18,0,0.11Zm-76.2-141.71,75.26,139.77L601.75,317.75Z" transform="translate(-133.52 -172.28)"/></g><polygon class="cls-3" points="102.78 163.59 102.3 163.46 138.83 24.85 139.31 24.97 102.78 163.59"/><polygon class="cls-3" points="102.69 163.72 102.39 163.33 298.64 12.56 298.94 12.95 102.69 163.72"/><rect class="cls-3" x="274.36" y="315.54" width="0.5" height="93.57" transform="translate(-313.06 210.97) rotate(-55.48)"/><polygon class="cls-3" points="179.78 216.76 179.5 216.35 279.79 147 280.07 147.41 179.78 216.76"/><polygon class="cls-3" points="280.18 147.24 279.68 147.17 298.54 12.72 299.04 12.79 280.18 147.24"/><rect class="cls-3" x="342.77" y="165.07" width="0.5" height="186.54" transform="matrix(0.66, -0.76, 0.76, 0.66, -210.45, 175.71)"/><rect class="cls-3" x="439.59" y="314.47" width="0.5" height="143.84" transform="translate(-244.62 16.06) rotate(-21.53)"/><polygon class="cls-3" points="332.61 281.23 179.54 216.78 179.73 216.32 332.81 280.77 332.61 281.23"/><rect class="cls-3" x="253.4" y="440.45" width="104.76" height="0.5" transform="translate(-306.97 509.34) rotate(-81.93)"/><rect class="cls-3" x="296.14" y="472.67" width="172.35" height="0.5" transform="translate(-230.85 -73.2) rotate(-13.11)"/><polygon class="cls-3" points="2.29 258.41 1.95 258.05 102.37 163.34 102.71 163.71 2.29 258.41"/><rect class="cls-3" x="266.98" y="329.84" width="0.5" height="168.69" transform="translate(-267.68 -44.18) rotate(-21.69)"/><polygon class="cls-3" points="400.61 173.27 279.88 147.45 279.98 146.96 400.71 172.78 400.61 173.27"/><polygon class="cls-3" points="332.92 281.14 332.5 280.87 400.45 172.89 400.87 173.16 332.92 281.14"/><rect class="cls-3" x="482.99" y="170.22" width="0.5" height="189.91" transform="translate(-200.35 128.32) rotate(-32.44)"/><rect class="cls-3" x="516.17" y="318.81" width="56.28" height="0.5" transform="translate(-82.51 540.12) rotate(-68.95)"/><polygon class="cls-3" points="496.93 263.17 400.49 173.21 400.83 172.84 497.27 262.8 496.93 263.17"/><polygon class="cls-3" points="332.74 281.25 332.68 280.75 497.08 262.73 497.13 263.23 332.74 281.25"/><polygon class="cls-3" points="337.19 364.67 332.46 281.02 332.96 280.99 337.69 364.64 337.19 364.67"/><rect class="cls-3" x="525.7" y="491.6" width="0.5" height="112.06" transform="translate(-245.47 787.16) rotate(-79)"/><polygon class="cls-3" points="337.57 364.87 337.3 364.45 496.97 262.77 497.24 263.19 337.57 364.87"/><polygon class="cls-3" points="354.82 475 337.19 364.7 337.68 364.62 355.31 474.91 354.82 475"/><rect class="cls-3" x="316.04" y="598.18" width="179.32" height="0.5" transform="translate(-433.59 269.32) rotate(-43.34)"/><rect class="cls-3" x="384.43" y="425.67" width="0.5" height="178.16" transform="translate(-343.19 586.78) rotate(-75.57)"/><rect class="cls-3" x="236.83" y="541.96" width="101.62" height="0.5" transform="translate(-436.61 536.58) rotate(-77.81)"/><polygon class="cls-3" points="206.75 487.81 143.17 419.76 143.54 419.42 207.12 487.46 206.75 487.81"/><rect class="cls-3" x="247.21" y="613.43" width="45.69" height="0.5" transform="translate(-529.69 516.67) rotate(-72.69)"/><polygon class="cls-3" points="143.3 419.83 67.29 402.63 67.4 402.14 143.41 419.34 143.3 419.83"/><rect class="cls-3" x="273.06" y="564.16" width="201.7" height="0.5" transform="translate(-272.92 -49.32) rotate(-15.78)"/><polygon class="cls-3" points="143.17 419.75 61.41 324.3 61.79 323.97 143.55 419.42 143.17 419.75"/><rect class="cls-3" x="195.08" y="494.24" width="103.37" height="0.5" transform="translate(-151.73 -162.77) rotate(-2.13)"/><rect class="cls-3" x="132.71" y="415.86" width="165.75" height="0.5" transform="translate(-374.3 350.37) rotate(-75.75)"/><polygon class="cls-3" points="61.41 324.3 1.94 258.4 2.31 258.06 61.78 323.97 61.41 324.3"/><polygon class="cls-3" points="37.88 366.56 37.44 366.33 61.38 324.02 61.82 324.25 37.88 366.56"/><polygon class="cls-3" points="102.41 163.74 40.81 124.9 41.08 124.48 102.68 163.31 102.41 163.74"/><polygon class="cls-3" points="206.17 83.79 205.73 83.56 248 3.41 248.45 3.64 206.17 83.79"/><polygon class="cls-3" points="280.11 147.37 279.75 147.03 379.33 42.93 379.7 43.27 280.11 147.37"/><circle class="cls-3" cx="179.78" cy="216.35" r="2.66"/><circle class="cls-3" cx="102.4" cy="163.59" r="2.66"/><circle class="cls-3" cx="164.83" cy="320.02" r="2.66"/><circle class="cls-3" cx="61.41" cy="324.3" r="2.66"/><circle class="cls-3" cx="143.41" cy="419.42" r="2.66"/><circle class="cls-3" cx="337.39" cy="364.41" r="2.66"/><circle class="cls-3" cx="332.46" cy="280.76" r="2.66"/><circle class="cls-3" cx="280.09" cy="147.24" r="2.66"/><circle class="cls-3" cx="400.43" cy="173.12" r="2.66"/><circle class="cls-3" cx="206.84" cy="83.79" r="2.66"/><circle class="cls-3" cx="496.59" cy="262.87" r="3.29"/><circle class="cls-3" cx="432.24" cy="260.74" r="4.04"/><circle class="cls-3" cx="326.2" cy="420.44" r="4.04"/><circle class="cls-3" cx="447.43" cy="385.48" r="4.04"/><circle class="cls-3" cx="355.07" cy="475.61" r="2.95"/><circle class="cls-3" cx="247.46" cy="493.3" r="2.24"/><circle class="cls-3" cx="206.34" cy="487.64" r="4.04"/><circle class="cls-3" cx="128.93" cy="463.36" r="2.56"/><circle class="cls-3" cx="169.82" cy="397.4" r="4.04"/><circle class="cls-3" cx="66.69" cy="402.93" r="4.04"/><circle class="cls-3" cx="38.39" cy="367.1" r="2.45"/><circle class="cls-3" cx="252.3" cy="258.4" r="4.04"/><circle class="cls-3" cx="80.15" cy="258.89" r="4.04"/><circle class="cls-3" cx="2.42" cy="258.04" r="2.42"/><circle class="cls-3" cx="46.46" cy="133.09" r="4.04"/><circle class="cls-3" cx="175.18" cy="97.3" r="4.04"/><circle class="cls-3" cx="139.31" cy="25.01" r="4.04"/><circle class="cls-3" cx="248.77" cy="2.96" r="2.96"/><circle class="cls-3" cx="298.79" cy="13.75" r="4.04"/><circle class="cls-3" cx="339.87" cy="114.9" r="4.04"/><circle class="cls-3" cx="378.71" cy="42.18" r="3.46"/><circle class="cls-3" cx="420.33" cy="120.84" r="4.04"/><circle class="cls-3" cx="447.61" cy="110.86" r="2.85"/><circle class="cls-3" cx="469.13" cy="145.19" r="4.04"/><circle class="cls-3" cx="40.95" cy="124.01" r="2.77"/><circle class="cls-3" cx="27.07" cy="152.67" r="2.45"/></g></g></svg>

</main>


    
<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
