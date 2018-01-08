jQuery(document).ready(function ($) {



    $('a.comment-reply-link').on('click', function (e) {

        e.preventDefault();

        $('#id_comment').val($(this).attr('data-comment-id'));

        $('#cancel_reply').show();

    });



    $('#cancel_reply').on('click', function () {


        $('#id_comment').val('');

        $('#cancel_reply').hide();

    });



    $('#commentForm input[type=submit]').on('click', function (e) {

        e.preventDefault();
		
		
		$('#commentForm').find('[data-valid]').blur();
		
		if ( !$('#commentForm').find('.error').length ) {

			var id_post, id_comment, name, comment;

			id_post = $('#id_post').val();

			id_comment = $('#id_comment').val();

			name = $('#commentForm input[name = user_name]').val();

			comment = $('#commentForm textarea[name = text_comment]').val();


			console.log(id_comment);

			console.log(name);

			console.log(comment);


			$.ajax({
				url: myAjax.ajaxurl,
				type: 'POST',
				data: {

					'action': 'send_comments',
					'id_post': id_post,
					'id_comment': id_comment,
					'name': name,
					'comment': comment
				},
				success: function (url) {
					swal(
						{
						title: 'Комментарий отправлен на модерацию',
						confirmButtonColor: "#8AC832"
						}
					);

					$('#id_comment').val('');
					$('#commentForm input[name = user_name]').val('');
					$('#commentForm textarea[name = text_comment]').val('');
					$('#cancel_reply').hide('');

				}
			});


		}

    });








});