$(".play-music").on("click", function (e) {
	let songId=$(this).data("id");
	play(songId);
}
);

function play(songId){
	$.ajax( {
		type: 'GET', url: '/musics/' + songId, data: {
			_token: $('meta[name="csrf-token"]').attr('content')
		}
		, success: function (res) {
			var pathSong = res.path;
			var myPlaylist = new jPlayerPlaylist( {
				jPlayer: "#jplayer_N", cssSelectorAncestor: "#jp_container_N"
			}
			, [ {
				title: res.name, 
				artist: res.artists[0].name,
				mp3: pathSong,
			}
			, ], {
				playlistOptions: {
					enableRemoveControls: true, 
					autoPlay: true
				}
				, swfPath: "js/jPlayer", supplied: "webmv, ogv, m4v, oga, mp3", smoothPlayBar: true, keyEnabled: true, audioFullScreen: false
			}
			);
			myPlaylist.play(0);
		}
	}
	);
}