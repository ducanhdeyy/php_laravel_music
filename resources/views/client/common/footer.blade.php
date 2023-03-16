<div id="footer" class="page-footer sticky sticky-bottom">
    <div class="plyrist plyrist_audio plyr-list-popup bg-white b-t plyrist-theme-0" id="plyrist">
        <div tabindex="0" class="plyr plyr--full-ui plyr--audio plyr--html5 plyr--paused">
            <audio id="audio" autoplay="">
                <source id="audio1" src="" provider="undefined">
            </audio>
            <div class="plyr__controls">
                <button type="button" class="plyr__control plyr__prev" data-plyr="prev"><i
                        class="fa-solid fa-backward"></i><span class="plyr__tooltip" role="tooltip">Prev</span>
                </button>
                <button type="button" class="plyr__control plyr__play" aria-pressed="false" aria-label="Play"
                        data-plyr="play">
                    <div class="playpause-track"><i class="fa fa-play-circle fa-3x"></i></div>
                    <span class="label--pressed plyr__tooltip" role="tooltip">Pause</span><span
                        class="label--not-pressed plyr__tooltip" role="tooltip">Play</span>
                </button>
                <button type="button" class="plyr__control plyr__next" data-plyr="next">
                    <i class="fa-solid fa-forward"></i>
                    <span class="plyr__tooltip" role="tooltip">Next</span>
                </button>
                <div class="plyr__poster" style="background-image: url({{asset('template/client/assets/img/amnhac.jpg')}})"></div>
                <div class="plyr__col">
                    <div class="plyr__row">
                        <div class="plyr__info plyr__row"><a class="plyr__title ajax" href="">Music</a>
                        </div>
                        <div class="plyr__time plyr__time--current" aria-label="Current time">00:00</div>
                        <div class="plyr__time plyr__time--duration" aria-label="Duration">00:00</div>
                    </div>
                    <div class="plyr__progress">
                        <input class="seek" data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0"
                               aria-label="Seek" aria-valuenow="6.71" style="--value:0%;">
                        <!-- <progress class="plyr__progress__buffer" min="0" max="100" value="100" >% buffered</progress> -->
                        <span role="tooltip" class="plyr__tooltip">00:00</span></div>
                </div>
                <button type="button" class="plyr__control" aria-pressed="false" aria-label="Mute" data-plyr="mute">
                    <i class="fa-regular fa-volume"></i>
                    <span class="label--pressed plyr__tooltip" role="tooltip">Unmute</span><span
                        class="label--not-pressed plyr__tooltip" role="tooltip">Mute</span></button>
                <div  class="plyr__volume"><input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1"
                                                  autocomplete="off" aria-label="Volume" aria-valuenow="1"
                                                  style="--value:100%;"></div>
                <button type="button" class="plyr__control" aria-pressed="false" data-plyr="like">
            </div>
        </div>
        <div class="plyr-list" style="display:none">
            <div class="plyr-item" data-id="90835896" data-type="audio"
                 data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/Music4/v4/ba/b2/1d/bab21d96-ffab-78d6-5e4f-dd42e32562e4/mzaf_5313062365683687423.plus.aac.p.m4a"
                 data-poster="../assets/img/c1.jpg">
                <div class="plyr-item-poster" style="background-image:url()"></div>
                <div class="flex">
                    <div class="plyr-item-title h-1x">Wake Me Up</div>
                    <div class="plyr-item-author text-sm text-fade">Avicii</div>
                </div>
                <button class="plyr-item-close close text">×</button>
            </div>
            <div class="plyr-item" data-id="234782921" data-type="audio"
                 data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/Music69/v4/02/4c/98/024c9802-ce83-e0b4-3cd3-11c5c6284cdb/mzaf_9006921880389738307.plus.aac.p.m4a"
                 data-poster="../assets/img/c2.jpg">
                <div class="plyr-item-poster" style="background-image:url()"></div>
                <div class="flex">
                    <div class="plyr-item-title h-1x">Lean On</div>
                    <div class="plyr-item-author text-sm text-fade">Major Lazer Feat. MØ &amp; DJ Snake</div>
                </div>
                <button class="plyr-item-close close text">×</button>
            </div>
            <div class="plyr-item active" data-id="312058991">
                <div class="plyr-item-poster"></div>
                <div class="flex">
                    <div class="plyr-item-title h-1x">This Girl</div>
                    <div class="plyr-item-author text-sm text-fade">Kungs &amp; Cookin' On 3 Burners</div>
                </div>
                <button class="plyr-item-close close text">×</button>
            </div>
        </div>
    </div>



