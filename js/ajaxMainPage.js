jQuery(document).ready(function ($) {



    $('body').on('click', 'div.pagination-main a.page-numbers, span.page-numbers', function(e) {

        e.preventDefault();
        
        var page = $(this).text();

        console.log(page);

        // return;


        $.ajax({
            url: myAjax.ajaxurl,
            type: 'POST',
            data: {
                'action': 'main_posts',
                'page': page

            },
            success: function (response) {

                response = JSON.parse(response);
				$('body, html').animate({
					scrollTop: $('section.projects').offset().top - 80
				}, 500, function() {
					$('#ajax-post').html(response['posts']);
					$('#ajax-pagination').html(response['paginate']);
				});
//                $('#ajax-post').html(response['posts']);
//                $('#ajax-pagination').html(response['paginate']);

            }

        });

        
    });







});