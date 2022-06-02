<script type="text/javascript">
$(document).ready(function() {
    $("#jquery_jplayer_1").jPlayer({
        ready: function() {
            $(this).jPlayer("setMedia", {
                title: "Big Buck Bunny Trailer",
                m4v: "<?= $DataLesson['link_lesson'] ?>/",
                ogv: "http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer.ogv",
                poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
            });
        },
        cssSelectorAncestor: "#jp_container_1",
        swfPath: "' .BASE ?>/src/js",
        supplied: "m4v, ogv",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
    });
});
</script>