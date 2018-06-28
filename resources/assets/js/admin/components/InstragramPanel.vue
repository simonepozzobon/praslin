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
                <div class="col-md-6">
                    <img :src="this.instagramPost.thumb" class="img-fluid"/>
                </div>
                <div class="col-md-6">
                    <p>
                        {{ this.instagramPost.caption }}
                    </p>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col d-flex justify-content-center">
                    <fb-signin-button
                        :params="fbSignInParams"
                        @success="onSignInSuccess"
                        @error="onSignInError">
                        Login and Post
                    </fb-signin-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import EventBus from '~js/EventBus'
import {TweenMax} from 'gsap'
const FB = require('~js/externals/FacebookSDK')

export default {
    name: 'InstagramPanel',
    data: function () {
        return {
            access_token: null,
            caption: '',
            fbSignInParams: {
                scope: 'instagram_basic',
                return_scopes: true
            },
            FB: null,
            instaID: 17841408102168032,
            instagramPost: null,
            media: null,
        }
    },
    methods: {
        fileChange: function() {
            this.media = event.target.files[0]
        },
        hideUpload: function() {
            var t1 = TweenMax.to(this.$refs.form, .4, {
                display: 'none',
                opacity: 0,
            })
        },
        mediaPublish: function(id) {
            this.FB.api(
                '/17841408102168032/media_publish',
                'POST',
                {
                    creation_id: id,
                    access_token: this.access_token
                },
                response => {
                    console.log('publish', response)
                }
            )
        },
        onSignInSuccess: function(response) {
            this.access_token = response.authResponse.accessToken
            var url = location.protocol + '//' + location.hostname + (location.port ? ':'+location.port: '')
            var img_url = url + this.instagramPost.thumb

            // debug
            img_url = "https://d1ljaggyrdca1l.cloudfront.net/wp-content/uploads/2017/03/azure-seas-and-palm-trees-seychelles-1600x900.jpg"

            this.FB.api(
                '/17841408102168032/media',
                'POST',
                {
                    image_url: img_url,
                    caption: this.instagramPost.caption,
                    access_token: this.access_token
                },
                response => {
                    console.log('media upload', response)
                    // change the number with the id from the response
                    this.mediaPublish(17889455560051444)
                }
            )
        },
        onSignInError: function(error) {
            console.log(error)
        },
        uploadInstagram: function() {
            if (this.media) {
                var data = new FormData()
                data.append('file', this.media)
                data.append('caption', this.caption)

                this.hideUpload()

                axios.post('/api/instagram-upload', data).then(response => {
                    this.instagramPost = response.data
                })
            }
        }
    },
    mounted: function() {
        EventBus.$on('facebook-sdk-loaded', FB => {
            console.log('api loaded')
            this.FB = FB
        })
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
