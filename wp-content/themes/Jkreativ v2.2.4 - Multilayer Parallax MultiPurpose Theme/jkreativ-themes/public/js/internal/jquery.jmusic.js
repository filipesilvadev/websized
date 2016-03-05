/** jquery.jmusic.js **/
(function ($, window) {
    "use strict";

    var playmusic = function () {
        var musicon = $(".music_toggle").data('on');
        var musicoff = $(".music_toggle").data('off');

        $('#backgroundaudioplayer').mediaelementplayer({
            pauseOtherPlayers: false,
            startVolume: 0.7,
            success: function() {
                $('#backgroundaudioplayer')[0].player.play();
            }
        });

        var stopmusic = function () {
            $(".music_toggle").data('toogle', 'off');
            $(".music_toggle").find('i').removeClass(musicon).addClass(musicoff);
            $('#backgroundaudioplayer')[0].player.pause();
        };

        var startmusic = function () {
            $(".music_toggle").data('toogle', 'on');
            $(".music_toggle").find('i').removeClass(musicoff).addClass(musicon);
            $('#backgroundaudioplayer')[0].player.play();
        };

        $(".music_toggle").bind('click', function () {
            var musictoogle = $(this).data('toogle');

            if (musictoogle === 'on') {
                stopmusic();
            } else {
                startmusic();
            }
        });

        var iscurrentlyplay = false;
        var flagtimeout;
        $(window).bind('jmusicstop', function () {
            clearTimeout(flagtimeout);
            flagtimeout = setTimeout(function(){
                iscurrentlyplay = ( $(".music_toggle").data('toogle') === 'on' ) ? true : false;
                stopmusic();
            }, 100)
        });
        $(window).bind('jmusicstart', function () {
            if (iscurrentlyplay) {
                startmusic();
            }
        });
    };


    $(document).bind('ready', function () {
        if (joption.musicbg) {
            playmusic();
        }
    });
})(jQuery, window);