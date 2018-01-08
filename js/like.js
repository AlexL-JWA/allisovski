jQuery(document).ready(function ($) {



    $('body').on('click', '[href="#like"]', function(e) {

        e.preventDefault();

        var count;

        $(this).hasClass('like') ? (count = -1, $(this).removeClass('like')) : (count = 1, $(this).addClass('like'));

        console.log(count);

        var id_post = $(this).attr('data-id');

        var that = $(this);


        $.ajax({
            url: myAjax.ajaxurl,
            type: 'POST',
            data: {
                'action': 'like_posts',
                'id_post': id_post,
                'like': count
            },
            success: function (response) {


                console.log(response);

                that.find('span').text(response);
                
            }
        });




    });







});