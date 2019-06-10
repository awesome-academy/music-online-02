$(".play-music").on("click", function (e) {
    let songId = $(this).data("id");
    play(songId);
});

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
});

// js search
jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        remote: {
            url: '/search?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $("#search").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),
        name: 'list',
        templates: {
            empty: [
                `
                <div class="list-group search-results-dropdown">
                    <div class="list-group-item">Not found</div>
                </div>
                `
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<a href="/music/' + data.id + '" class="list-group-item">' + data.name + '</a>'
            }
        }
    });
});

//comment
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $("#submit_comment").click(function(){
        
        content = $("#content_comment").val();
        musicId = $("#music_comment").val();
        userId = $("#user_comment").val();
        
        if (userId == '') {
            $("#content_comment").val('');
            document.getElementById("noti").innerHTML = "Please login";
        } else {
            $.ajax({
                url: 'comment',
                type: 'POST',
                data: "content=" + content + "&userId=" + userId + "&musicId=" + musicId,
                success: function(res){
                    $template =
                    `
                    <article id="comment-id-1" class="comment-item">
                        <a class="pull-left thumb-sm"> 
                            <img src="` + res.image + `" class="img-circle"> 
                        </a> 
                        <section class="comment-body m-b">
                            <header> 
                                <a href="#"><strong>` + res.name + `</strong></a> 
                                <span class="text-muted text-xs block m-t-xs">just now</span> 
                            </header>
                            <div class="m-t-sm">` + res.content + `</div>
                        </section>
                    </article>
                    `
                    $("#line-comment").prepend($template);
                    $("#content_comment").val('');
                }
                
            })
        }
         
        return false;
    });
});
