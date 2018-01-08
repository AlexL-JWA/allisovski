<footer>
    <div class="container">
        <div class="row">

            <ul class="contact-links">

                <li>

                    <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('contacts-footer-left'); ?>

                </li>

                <li>

                    <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('contacts-footer-email'); ?>

                </li>

                <li>

                    <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('contacts-footer-right'); ?>

                </li>

            </ul>


            <ul class="social-links">

                <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('contacts-footer-center'); ?>

            </ul>

            <div class="footer-bottom">

                <?php if (function_exists('dynamic_sidebar')) dynamic_sidebar('contacts-footer-desc'); ?>

            </div>

        </div>
    </div>
</footer>


<div id="vacancy" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> x </button>
            </div>
            <div class="modal-body communications">

                <?= do_shortcode('[contact-form-7 id="104" title="Form vacancies"]'); ?>

            </div>
        </div>

    </div>
</div>


<link rel="stylesheet" href="<?= home_url(); ?>/wp-content/plugins/contact-form-7/includes/css/styles.css">

<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/main.css">

<link rel="stylesheet" href="<?= get_the_custom_excerpt(); ?>/css/sweetalert.css">

<?php wp_footer(); ?>
<script type="text/javascript">
    $(document).ready(function(){
    if($('body').attr('class').indexOf('page-template-viewsarchive_post-php')){
        console.log('asdljlks');
        $(".projects .tabs_content").masonry({
            itemSelector: ".proj_box",
            gutter: 30
        });
    }
    });
</script>
</body>

</html>
