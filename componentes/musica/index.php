<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
$marchas = new contenido(4);
?>
<div class="izquierda">
    <div class="widget">
        <h2><? echo $marchas->titulo; ?></h2>
        <? echo $marchas->contenido; ?>
    </div>

    <div class="widget">
        <h2>Marchas</h2>
        <div id="jquery_jplayer_2" class="jp-jplayer"></div>

        <div class="jp-audio">

            <div class="jp-type-playlist">
                <div id="jp_interface_2" class="jp-interface">
                    <ul class="jp-controls">
                        <li><a href="#" class="jp-play" tabindex="1">play</a></li>
                        <li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
                        <li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
                        <li><a href="#" class="jp-mute" tabindex="1">mute</a></li>

                        <li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
                        <li><a href="#" class="jp-previous" tabindex="1">previous</a></li>
                        <li><a href="#" class="jp-next" tabindex="1">next</a></li>
                    </ul>
                    <div class="jp-progress">
                        <div class="jp-seek-bar">
                            <div class="jp-play-bar"></div>

                        </div>
                    </div>
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                    <div class="jp-current-time"></div>
                    <div class="jp-duration"></div>
                </div>
                <div id="jp_playlist_2" class="jp-playlist">

                    <ul>
                        <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>

</div>



