<template lang="html">
    <div class="row bg-light">
        <div class="col-12">
            <h1 class="text-uppercase pt-4">Instagram</h1>
        </div>
        <div class="col-12" ref="form">
            <div class="row">
                <div class="col-12">
                    <label>Image</label>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-md-12 form-group">
                    <input type="file" class="form-control" @change="fileChange">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label>Caption</label>
                    <textarea rows="4" cols="80" v-model="caption" class="form-control"></textarea>
                </div>
            </div>
            <div class="row pb-4">
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-primary" @click="uploadInstagram">Save Post</button>
                </div>
            </div>
        </div>
        <div class="col-12" ref="instagrampost" v-if="this.instagramPost">
            <div class="row">
                <div class="col-md-4">
                    <img :src="this.instagramPost.thumb" class="img-fluid"/>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <p>
                                {{ this.instagramPost.caption }}
                            </p>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="">
                                <button class="btn btn-success btn-lg" @click="postIt">
                                    <i class="fas fa-check"></i> Confirm and post!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" ref="response">
            <div class="row pb-4">
                <div class="col-12 d-flex justify-content-center">
                    <moon-loader :loading="loading"></moon-loader>
                </div>
            </div>
            <div class="row pb-4" v-if="this.responseMsg">
                <div class="col-12 d-flex justify-content-center">
                    <h1 :class="responseStatus" align="center">{{ this.responseMsg }}</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import axios from 'axios'
import EventBus from '~js/EventBus'
import MoonLoader from 'vue-spinner/src/MoonLoader.vue'
import {TweenMax} from 'gsap'
const FB = require('~js/externals/FacebookSDK')

export default {
    name: 'InstagramPanel',
    components: {
        MoonLoader,
    },
    data: function () {
        return {
            access_token: null,
            caption: '',
            fbSignInParams: {
                scope: 'manage_pages,pages_manage_cta,pages_show_list,ads_read,pages_messaging,instagram_basic',
                return_scopes: true
            },
            FB: null,
            FBID: 1745688432182615,
            instaID: 17841408102168032,
            instagramPost: null,
            loaderColor: '#007bff',
            loading: false,
            media: null,
            responseMsg: null,
            responseStatus: 'text-success',
        }
    },
    methods: {
        fileChange: function() {
            this.media = event.target.files[0]
        },
        hideUpload: function() {
            this.loading = true
            var t1 = TweenMax.to(this.$refs.form, .4, {
                display: 'none',
                opacity: 0,
            })
        },
        postIt: function() {
            TweenMax.to(this.$refs.instagrampost, .4, {
                display: 'none',
                opacity: 0,
                onComplete: () => {
                    this.loading = true
                    this.sendPic()
                }
            })
        },
        sendPic: function() {
            var data = {
                url: window.location.protocol + '//' + window.location.host + this.instagramPost.thumb,
                caption: this.instagramPost.caption,
                user: apiKeys.InstaUser,
                password: apiKeys.InstapPwd,
            }
            axios.post(apiKeys.secretAPIUrl, data).then(response => {
                console.log(response)
                if (response.data.success) {
                    this.loading = false
                    this.responseStatus = 'text-success'
                    this.responseMsg = 'Posted!'
                } else {
                    this.loading = false
                    this.responseStatus = 'text-danger'
                    this.responseMsg = 'Error, please reload the page!'
                }
            })
        },
        uploadInstagram: function() {
            if (this.media) {
                var data = new FormData()
                data.append('file', this.media)
                data.append('caption', this.caption)

                this.hideUpload()

                axios.post('/api/instagram-upload', data).then(response => {
                    this.loading = false
                    this.instagramPost = response.data
                })
            }
        }
    },
    mounted: function() {
        // EventBus.$on('facebook-sdk-loaded', FB => {
        //     console.log('api loaded')
        //     this.FB = FB
        // })
    }
}
</script>

<style lang="scss">
    .fb-signin-button {
        /* This is where you control how the button looks. Be creative! */
        display: inline-block;
        padding: 0.375rem 0.75rem;;
        border-radius: 3px;
        background-color: #4267b2;
        color: #fff;
    }
</style>
