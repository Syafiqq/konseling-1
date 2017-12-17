(function ($) {
    $(function () {
        var current_audio;
        var current_index = 0;
        var current_time  = 0;

        init();

        function init()
        {
            var audio     = $('#audio');
            current_audio = audio[0];
            var playlist  = $('#playlist');
            var len       = playlist.find('li a').length;
            var current_anchor;

            playlist.find('a').click(function (e) {
                e.preventDefault();
                current_anchor = $(this);
                current_index  = current_anchor.parent().index();
                run(current_anchor, current_audio, 0);
            });
            current_audio.addEventListener('ended', function (e) {
                current_index++;
                if (current_index === len)
                {
                    current_index = 0;
                }
                run($(current_anchor = playlist.find('a')[current_index]), current_audio, current_time);
            });

            run($(current_anchor = playlist.find('a')[current_index = 0]), current_audio, current_time)
        }

        function run(link, player, track)
        {
            player.src = link.attr('href');
            var par    = link.parent();
            par.addClass('active').siblings().removeClass('active');
            player.load();
            player.volume      = 0;
            player.currentTime = parseFloat(track);
            player.play();
        }

        $(window).on("beforeunload", function (e) {
            
        });
    });
})(jQuery);
