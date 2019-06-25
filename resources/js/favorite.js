$(".music-favorite").on("click", function (e) {
    let song_id = $(this).data("id");
    let user_id = $('#user_id').val();
    var favorite = 'favorite-' + song_id;
    var unfavorite = 'unfavorite-' + song_id;
    var favoriteID = '#favorite-' + song_id;
    var unfavoriteID = '#unfavorite-' + song_id;
    var like = 'like-' + song_id;
    
   
    $('body').on('click', favoriteID, function() {
        $.ajax({
            type: 'POST',
            url: '/favorite/like',
            data: "song_id=" + song_id + "&user_id=" + user_id,
            success: function() {
                $templateUnLike = 
                `
                <i class="fa fa-heart text-danger unfavorite" id="unfavorite-` + song_id + `"></i>
                `
                $("#" + favorite).replaceWith($templateUnLike);
            }
        });

        return false;
    });

    $('body').on('click', unfavoriteID, function() {
        $.ajax({
            type: 'POST',
            url: '/favorite/unlike',
            data: "song_id=" + song_id + "&user_id=" + user_id,
            success: function() {
                $templateLike = 
                `
                <i class="fa fa-heart-o text favorite" id="favorite-` + song_id + `"></i>
                `
                $("#" + unfavorite).replaceWith($templateLike);
            }
        });

        return false;
    });
});
