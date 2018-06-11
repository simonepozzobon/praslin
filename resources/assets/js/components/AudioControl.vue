<template lang="html">
    <div id="audio-control-wrapper">
        <div class="audio-btn">
            <a id="audio-control" class="video-audio-btn" :class="color +' '+size+' '+isAnimated" href="#" @click="toggleAudio">
                <i class="fas" :class="btnClass"></i>
            </a>
        </div>
    </div>
</template>

<script>
import EventBus from '~js/EventBus'
import Tone from 'tone'
export default {
    name: 'AudioControl',
    props: {
        animated: {
            type: Boolean,
            default: false,
        },
        color: {
            type: String,
            default: 'red',
        },
        size: {
            type: String,
            default: '',
        },
        video_id: {
            type: String,
            default: '',
        },
    },
    data: () => ({
        audio: true,
        btnClass: 'fa-volume-up',
        player: null,
    }),
    watch: {
        audio: function(status) {
            if (status) {
                this.btnClass = 'fa-volume-up'
            } else {
                this.btnClass = 'fa-volume-off'
            }
        }
    },
    computed: {
        isAnimated: function() {
            if (this.animated) {
                return 'animated'
            }
            return null
        }
    },
    methods: {
        initPlayer: function() {
            this.player = new Tone.Player({
                url: '/music/soundtrack.mp3',
                autostart: true,
                loop: true,
                fadeIn: 5,
                fadeOut: 2,
            }).toMaster()
        },
        toggleAudio: function($event) {
            $event.preventDefault()
            if (this.audio) {
                this.player.mute = true
            } else {
                this.player.mute = false
            }
            this.audio = !this.audio
        }
    },
    created: function() {
    },
    mounted: function() {
        this.initPlayer()
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#audio-control-wrapper {
    padding-left: $spacer * 2;
    padding-right: $spacer;

    .audio-btn {
        position: relative;
        width: 32px;
        height: 44px;

        > .video-audio-btn {
            position: absolute;
            display: block;
            z-index: 4;
            top: 50%;
            left: 50%;
            bottom: $spacer * 4;
            transform: translate(-50%, -50%);
            width: 32px;
            height: 44px;
            padding: 18px 20px 18px 28px;
            color: $white;

            &:hover {
                text-decoration: none;

                > i {
                    color: lighten($menu-green, 60);
                }
            }

            &:before {
                content: '';
                position: absolute;
                z-index: 0;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: block;
                width: 80px;
                height: 80px;
                border-radius: 50%;
            }

            &.animated {
                &:before {
                    animation: pulse-border 1500ms ease-out infinite;
                }
            }

            &:after {
                content: '';
                position: absolute;
                z-index: 1;
                left: 50%;
                top: 50%;
                transform: translateX(-50%) translateY(-50%);
                display: block;
                width: 80px;
                height: 80px;
                border-radius: 50%;
                transition: all 200ms;
            }

            > i {
                display: block;
                position: relative;
                z-index: 3;
                font-size: $h1-font-size;
                top: -16px;
                left: -16px;
            }

            &.red {
                &:before {
                    background: $menu-green;
                }

                &:after {
                    background: $menu-green;
                }

                &:hover:after {
                    background-color: darken($menu-green, 15);
                }
            }

            &.medium {
                width: 24px;
                height: 33px;

                &:before, &:after {
                    width: 60px;
                    height: 60px;
                }

                > i {
                    font-size: $h2-font-size;

                    &.fa-volume-off {
                        top: -15px;
                        left: -13px;
                    }

                    &.fa-volume-up {
                        top: -16px;
                        left: -18px;
                    }
                }
            }

            &.small {
                width: 16px;
                height: 22px;
                padding: 9px 10px 9px 14px;

                &:before, &:after {
                    width: 40px;
                    height: 40px;
                }

                > i {
                    font-size: $h5-font-size;

                    &.fa-volume-off {
                        top: -8px;
                        left: -12px;
                    }

                    &.fa-volume-up {
                        top: -8px;
                        left: -12px;
                    }
                }
            }
        }
    }
}

@keyframes pulse-border {
    0% {
        transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
        opacity: 1;
    }
    100% {
        transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
        opacity: 0;
    }
}


</style>
