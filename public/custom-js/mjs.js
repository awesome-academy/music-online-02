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

window.onload = function() {
    play($( "#song" ).val())
};

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
