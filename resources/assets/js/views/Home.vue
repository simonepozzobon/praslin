<template lang="html">
    <div id="home" class="page">
        <main-slider />
        <div class="container">
            <div class="row" style="min-height: 150px;">
                <div class="col-md-12">
                    <section-title title="Reviews" number="00" align="center"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <review-list :reviews="this.reviews"/>
                </div>
            </div>
            <!-- <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <textarea name="name" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</template>

<script>
import apiKeys from '~js/apiKeys'
import EventBus from '~js/EventBus'
import {TweenMax, TimelineMax} from 'gsap'
import MainSlider from '../components/MainSlider.vue'
import moment from 'moment'
import ReviewList from '../components/ReviewList.vue'
import SectionTitle from '../components/SectionTitle.vue'

const FB = require('~js/externals/FacebookSDK')

export default {
    name: 'Home',
    components: {
        MainSlider,
        SectionTitle,
        ReviewList,
    },
    data: function() {
        return {
            access_token: null,
            isAnimating: false,
            reviews: [],
        }
    },
    methods: {
        animate: function() {
            var t1 = new TimelineMax()
            t1.from('#home', 1.5, {
                opacity: 0,
                ease: Back.easeInOut
            })
        },
        // getImage: function(FB, review, i) {
        //     if (review.reviewer) {
        //         console.log(review)
        //         var id = review.reviewer.id
        //         var url = '/'+id+'/picture'
        //         // FB.api(
        //         //     url,
        //         //     'GET',
        //         //     {access_token: apiKeys.facebook.page_token},
        //         //     gianni => {
        //         //         console.log(gianni)
        //         //         this.formatFacebookReview(review, i)
        //         //     }
        //         // )
        //     } else {
        //         this.formatFacebookReview(review, i)
        //     }
        //
        // },
        getPageToken: function(FB) {
            FB.api(
                '/1745688432182615/ratings',
                'GET',
                response => {
                    if (response.data) {
                        for (var i = 0; i < response.data.length; i++) {
                            var review = {}
                            review.id = i
                            if (response.data[i].reviewer) {
                                review.name = response.data[i].reviewer.name
                            } else {
                                review.name = 'Facebook Account'
                            }
                            review.rating = response.data[i].rating
                            review.type = 'Facebook'
                            review.pic = null
                            review.date = moment(response.data[i].created_time).format('LL')
                            review.message = response.data[i].review_text
                            this.reviews.push(review)
                        }
                    } else {
                        console.log('error with access_token')
                    }
                },
                {
                    access_token: apiKeys.facebook.page_token
                }
            );
        },
        // formatFacebookReview: function(review, i) {
        //     var review = {
        //         id: i,
        //         name: review.reviewer.name,
        //         rating: review.rating,
        //         type: 'Facebook',
        //         pic: null,
        //         date: moment(review.created_time).format('LL'),
        //         message: review.review_text,
        //     }
        //     this.reviews.push(review)
        // },
    },
    mounted: function() {
        this.animate()
        EventBus.$on('facebook-sdk-loaded', FB => {
            this.getPageToken(FB)
        })
    }
}
</script>

<style lang="scss">

#home {
    .section-title {
        top: 50%;
    }
}
</style>
