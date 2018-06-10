<template lang="html">
    <div id="about-us" class="container">
        <div class="row">
            <div class="col-md-6">
                <waves class="waves-icon"/>
                <div class="images">
                    <div id="about-us-img-1">
                        <img src="/images/about-us-dive-center-2.jpg" class="img-fluid"/>
                    </div>​
                    <div id="about-us-img-2">
                        <img src="/images/equipment-4.jpg" class="img-fluid"/>
                    </div>​
                </div>
            </div>
            <div class="col-md-6">
                <section-title title="About Us" number="01" />
                <section-subtitle>
                    Experience the colorful side of life.
                </section-subtitle>
                <section-paragraph>
                    Praslin Pro Divers is a unique dive centre based on the
                    peaceful island of praslin located directly on the beach
                    of anse gouvernement. we were founded with the goal of
                    providing our customers and fellow divers an unforgettable,
                    personalise and fun diving experience.
                    We are not just passionate about the ocean, but your safety
                    and enjoyment are as well our business… with an emphasis
                    on education, conservation and responsible diving practices.
                    This is one of the reason we limit dive groups to six
                    divers per guide.
                </section-paragraph>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="padi d-flex justify-content-center">
                    <img src="/images/padi-instructor.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SectionParagraph from '../../components/SectionParagraph.vue'
import SectionSubtitle from '../../components/SectionSubtitle.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'

export default {
    name: 'AboutUs',
    components: {
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

    .images {
        position: relative;

        #about-us-img-1 {
            position: absolute;
            right: 90px;
            top: -40px;
            width: 78%;
        }

        #about-us-img-2 {
            position: absolute;
            top: 250px;
            left: -20px;
            width: 70%;
            @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
        }
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
