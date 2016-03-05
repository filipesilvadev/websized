<?php if(jeg_music_bg_enabled()) : ?>
<div class="music_toggle" data-toogle="on" data-on="fa-volume-up" data-off="fa-volume-off">
	<i class="fa fa-volume-up"></i>
</div>

<div class="backgroundaudio">
    <audio id="backgroundaudioplayer" loop>
        <source src="<?php echo vp_metabox('jkreativ_music_player.music_bg_group.0.music_mp3'); ?>" type="audio/mpeg">
        <source src="<?php echo vp_metabox('jkreativ_music_player.music_bg_group.0.music_ogg'); ?>" type="audio/music_ogg">
    </audio>
</div>
<?php endif; ?>