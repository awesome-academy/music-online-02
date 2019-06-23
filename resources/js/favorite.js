$(".music-favorite").on("click", function (e) {
    let songId = $(this).data("id");
    let user_ID = $('#user_ID').val();
    var favorite = 'favorite-' + songId;
    var unfavorite = 'unfavorite-' + songId;
    var favoriteID = '#favorite-' + songId;
    var unfavoriteID = '#unfavorite-' + songId;
    var like = 'like-' + songId;
   
    $('body').on('click', favoriteID, function() {
        $.ajax({
            type: 'POST',
            url: '/favorite/like',
            data: "songId=" + songId + "&user_ID=" + user_ID,
            success: function() {
                $templateUnLike = `<i class="fa fa-heart text-danger unfavorite" id="unfavorite-`+ songId +`"></i>`
                $("#" + favorite).replaceWith($templateUnLike);
            }
        });

        return false;
    });

    $('body').on('click', unfavoriteID, function() {
        $.ajax({
            type: 'POST',
            url: '/favorite/unlike',
            data: "songId=" + songId + "&user_ID=" + user_ID,
            success: function() {
                $templateLike = `<i class="fa fa-heart-o text favorite" id="favorite-`+ songId +`"></i>`
                $("#" + unfavorite).replaceWith($templateLike);
            }
        });

        return false;
    });

});
