<template lang="html">
    <div id="about-us" class="container">
        <div class="row">
            <div class="col-md-6">
                <section-title title="About Us" number="01" />
                <section-subtitle>
                    Experience the colorful side of life.
                </section-subtitle>
                <section-paragraph>
                    Praslin Pro Divers is a unique dive centre based on the
                    peaceful island of praslin located directly on the beach
                    of anse gouvernement. We were founded with the goal of
                    providing our customers and fellow divers an unforgettable,
                    personalized and fun diving experience.
                    We are not just passionate about the ocean, but your safety
                    and enjoyment are as well our business… with an emphasis
                    on education, conservation and responsible diving practices.
                    This is one of the reason we limit dive groups to six
                    divers per guide.
                </section-paragraph>
            </div>
            <div class="col-md-6 order-md-first order-lg-first order-xl-first">
                <waves class="waves-icon"/>
                <div class="images">
                    <image-container
                        src="/images/about-us-dive-center-2.jpg"
                        :height="300"
                        percent="78%"
                        top="-40px"
                        right="90px" />
                    <image-container
                        src="/images/equipment-4.jpg"
                        :height="300"
                        percent="60%"
                        top="-60px"
                        left="0" />
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col">
                <div class="padi d-flex justify-content-center">
                    <img src="/images/padi-instructor.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/275538098" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ImageContainer from '../../components/ImageContainer.vue'
import SectionParagraph from '../../components/SectionParagraph.vue'
import SectionSubtitle from '../../components/SectionSubtitle.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'AboutUs',
    components: {
        ImageContainer,
        SectionParagraph,
        SectionSubtitle,
        SectionTitle,
        Waves,
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#about-us {

    .waves-icon {
        position: absolute;
        right: 15px;
        top: -40px;
    }

    .padi {
        padding-top: $spacer * 4;

        > img {
            width: 200px;
            height: auto;
            height: 100%;
        }
    }
}
</style>
