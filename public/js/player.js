$(".play-music").on("click", function (e) {
  let songId = $(this).data("id");
  $.ajax({
    type: 'GET',
    url: '/musics/' + songId,
    data:{
        _token: $('meta[name="csrf-token"]').attr('content')
    },
    success: function (res) {
      var pathSong =  res.path;
      var myPlaylist = new jPlayerPlaylist(
        {
        jPlayer: "#jplayer_N",
        cssSelectorAncestor: "#jp_container_N"
      }, [
        {
          title: res.name,
          artist: res.artists[0].name,
          mp3: pathSong,
        },
        
      ], {
        playlistOptions: {
          enableRemoveControls: true,
          autoPlay: true
        },
        swfPath: "js/jPlayer",
        supplied: "webmv, ogv, m4v, oga, mp3",
        smoothPlayBar: true,
        keyEnabled: true,
        audioFullScreen: false
        });
        console.log(res)
      myPlaylist.next();
      // $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer,  function(){
      //   $('.musicbar').removeClass('animate');
      //   $('.jp-play-me').removeClass('active');
      //   $('.jp-play-me').parent('li').removeClass('active');
      // });
    
      // $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer,  function(){
      //   console.log(1)
      //   $('.musicbar').addClass('animate');
      // });
    }
});

  $(document).on('click', '.jp-play-me', function(e){
    e && e.preventDefault();
    var $this = $(e.target);
    if (!$this.is('a')) $this = $this.closest('a');

    $('.jp-play-me').not($this).removeClass('active');
    $('.jp-play-me').parent('li').not($this.parent('li')).removeClass('active');

    $this.toggleClass('active');
    $this.parent('li').toggleClass('active');
    if( !$this.hasClass('active') ){
      myPlaylist.pause();
    }else{
      var i = Math.floor(Math.random() * (1 + 7 - 1));
      myPlaylist.play(i);
    }
  });
});
  