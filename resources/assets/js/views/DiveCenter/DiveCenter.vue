<template lang="html">
    <div id="dive-center" class="container">
        <div class="row">
            <div class="col-md-6">
                <section-title title="Dive Center" number="02" align="right"/>
                <section-subtitle>
                    Pick up the equipment and get on board.
                </section-subtitle>
                <section-paragraph>
                    Our 6 meters speed boat provide all the comfort a small
                    embarkation dive boat can provide,equipped with all safety
                    and navigational equipment to get you right on the dive
                    spots with a 100% accuracy.
                </section-paragraph>
            </div>
            <div class="col-md-6">
                <waves class="waves-icon"/>
                <div id="images">
                    <div id="dive-center-img-1">
                        <img src="/images/boat.jpg" class="img-fluid"/>
                    </div>​
                    <div id="dive-center-img-2">
                        <img src="/images/dive-center.jpg" class="img-fluid"/>
                    </div>​
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
    name: 'DiveCenter',
    components: {
        SectionParagraph,
        SectionSubtitle,
        SectionTitle,
        Waves,
    }
}
</script>

<style lang="scss">
// @import '../css/scale-img.scss';
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#dive-center {
    padding-top: 180px;
    padding-bottom: 180px;

    .waves-icon {
        position: absolute;
        left: 15px;
        top: -40px;
    }
}

#images {
    position: relative;

    > #dive-center-img-1 {
        position: absolute;
        left: 90px;
        top: -40px;
        width: 75%;
    }

    > #dive-center-img-2 {
        position: absolute;
        top: 180px;
        right: 0;
        width: 75%;
        @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
    }
}

</style>
