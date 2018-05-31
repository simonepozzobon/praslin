<template lang="html">
    <div id="about-us" class="container">
        <div class="row">
            <div class="col-md-6">
                <waves class="waves-icon"/>
                <div id="about-us-img-1" class="scale-wrap">
                    <img class="fake" src="/images/about-us-dive-center.png" />
                    <div class="img-wrap">
                        <img class="normal" src="/images/about-us-dive-center.png" />
                    </div>
                </div>​
                <div id="about-us-img-2" class="scale-wrap">
                    <img class="fake" src="/images/about-us-palm.png" />
                    <div class="img-wrap">
                        <img class="normal" src="/images/about-us-palm.png" />
                    </div>
                </div>​
            </div>
            <div class="col-md-6">
                <section-title title="About Us" number="01" />
                <section-subtitle>
                    Experience the colorful side of life.
                </section-subtitle>
                <section-paragraph>
                    Praslin Pro Divers is a unique dive centre where we
                    value our customers and fellow divers no matter your
                    dive experiences. We are not just passionate about the
                    ocean, but your safety  and enjoyment are as well our
                    business… with an emphasis on education, conservation and
                    responsible diving practices.
                    This is one of the reason we limit dive groups to six divers per guide.
                </section-paragraph>
            </div>
        </div>
    </div>
</template>

<script>
import SectionParagraph from '../components/SectionParagraph.vue'
import SectionSubtitle from '../components/SectionSubtitle.vue'
import SectionTitle from '../components/SectionTitle.vue'
import Waves from '../components/icons/Waves.vue'

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
    z-index: 2;

    .waves-icon {
        position: absolute;
        right: 15px;
        top: -40px;
    }

}


.scale-wrap {
    overflow: hidden;
    position: relative;
    float: left;
}

.scale-wrap img.fake {
    float: left;
    visibility: hidden;
    width: auto;
}

.img-wrap {
    position: absolute;
    top: 0;
    right: 15px;
    // bottom: 0;
    // left: 0;
}

.img-wrap img.normal {
    width: 35%;
}

#about-us-img-1 {
    top: -40px;
    right: -8px;

    .normal {
        width: 48%;
    }
}

#about-us-img-2 {
    position: absolute;
    top: 200px;
    right: -116px;
    // bottom: 0;
    // left: -32px;

    .normal {
        width: 52%;
    }
}
</style>
