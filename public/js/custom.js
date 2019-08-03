/*
 *   ajax pagination
 */

$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        // $('#loadArticles a').css('color', '#dfecf6');
        // $('#loadArticles').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');
        getArticles(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        $.ajax({
            url: url
        }).done(function(data) {
            $('.data').html(data);
        }).fail(function() {
            alert('data could not be loaded.');
        });
    }
});

/*
 *   ajax pagination
 */

/*
 *   add comment
 */
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });


// $('#addComment').submit(function(e) {
//     e.preventDefault();
//     comment = $(this)
//         .find('textarea[name="comment"]')
//         .val();
//     $.ajax({
//         type: $(this).attr("method"),
//         url: $(this).attr("action"),
//         data: {
//             comment: comment,

//         },
//         success: function(data) {
//             $('.data').html(data);
//             alert('yes');
//         },

//     });
// });


/*
 *   add comment
 */