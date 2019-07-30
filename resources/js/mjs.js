$(".play-music").on("click", function (e) {
    let songId = $(this).data("id");
    play(songId);
    countView(songId);
});

function countView(songId) {
    var nameCookie = 'music_' + songId;
    var expDate = new Date();
    expDate.setTime(expDate.getTime() + (1 * 60 * 1000)); // add 1 minutes
    if (typeof $.cookie(nameCookie) === 'undefined'){
        $.cookie(nameCookie, songId, { 
            expires: expDate, 
            path: '/'
        });
        $.ajax({
            type: 'GET',
            url: '/addview/' + songId,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {

            }
        });
    }
}

function play(songId) {
    $.ajax({
        type: 'GET',
        url: '/musics/' + songId,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            var myPlaylist = new jPlayerPlaylist({
            jPlayer: "#jplayer_N",
            cssSelectorAncestor: "#jp_container_N",
        }, [{
            title: res.name,
            artist: res.artists[0].name,
            mp3: res.path,
        }, ], {
            playlistOptions: {
                enableRemoveControls: true,
                autoPlay: true,
            },
            swfPath: "js/jPlayer",
            supplied: "webmv, ogv, m4v, oga, mp3",
            smoothPlayBar: true,
            keyEnabled: true,
            audioFullScreen: false,
        });
        myPlaylist.play(0);
        }
    });
}

// run music on page music
window.onload = function() {
    play($("#song").val())
};

// run album
$(document).ready(function() {
    var url = window.location.pathname;
    var res = url.split("/");
    var albumId = res[2];
    var playlistId = res[2];
    
    $.ajax({
        type: 'GET',
        url: '/albums/' + albumId,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            var myPlaylist = new jPlayerPlaylist({
                jPlayer: "#jplayer_N",
                cssSelectorAncestor: "#jp_container_N",
            }, {
                playlistOptions: {
                    enableRemoveControls: true,
                    autoPlay: true,
                },
                swfPath: "js/jPlayer",
                supplied: "webmv, ogv, m4v, oga, mp3",
                smoothPlayBar: true,
                keyEnabled: true,
                audioFullScreen: false,
            });
            res.forEach(element => {
                myPlaylist.add({
                    title: element.name,
                    mp3: element.path,
                }) 
            });
        }
    });

    $.ajax({
        type: 'GET',
        url: '/playlists/' + playlistId,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var myPlaylist = new jPlayerPlaylist({
                jPlayer: "#jplayer_N",
                cssSelectorAncestor: "#jp_container_N",
            }, {
                playlistOptions: {
                    enableRemoveControls: true,
                    autoPlay: true,
                },
                swfPath: "js/jPlayer",
                supplied: "webmv, ogv, m4v, oga, mp3",
                smoothPlayBar: true,
                keyEnabled: true,
                audioFullScreen: false,
            });
            response.forEach(element => {
                myPlaylist.add({
                    title: element.name,
                    mp3: element.path,
                }) 
            });
        }
    });
});

// playlist 
$(".plus").on("click", function (e) {
    userID = $("#user_playlist").val();
    let musicID = $(this).data("id");
    $.ajax({
        type: 'GET',
        url: '/playlist/load/' + userID,
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(res) {
            $('#modal_playlist').empty();
            res.forEach(function(element) {
                $temp = 
                `
                <div>
                    <i class="icon-playlist icon text-success-lter"></i>
                    <li data-id ="`+ element.id +`" class="item_p_list" data-dismiss="modal"><a href="javascript:;"data-toggle="tooltip" title="Add to old playlist">`+ element.name +`</a></li>
                    <hr>
                </div>
                `
                $("#modal_playlist").prepend($temp);
                $("li").css({"display": "inline-block", "margin-left": "10px"});
                $("i").css({"display": "inline-block"});
            });

            // add to playlist
            $(".item_p_list").on("click", function (e) {
                let playlistID = $(this).data("id");
                $.ajax({
                    type: 'POST',
                    url: 'playlist/add/',
                    data: "playlistID=" + playlistID + "&musicID=" + musicID,
                    success: function(res) {
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Success !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },             
                }); 
            });
        },    
    });
});
