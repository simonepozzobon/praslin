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
                <div id="dive-center-img-1" class="scale-wrap">
                    <img class="fake" src="/images/dive-center-boat.png" />
                    <div class="img-wrap">
                        <img class="normal" src="/images/dive-center-boat.png" />
                    </div>
                </div>​
                <div id="dive-center-img-2" class="scale-wrap">
                    <img class="fake" src="/images/dive-center-island.png" />
                    <div class="img-wrap">
                        <img class="normal" src="/images/dive-center-island.png" />
                    </div>
                </div>​
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
@import '../css/scale-img.scss';

#dive-center {
    padding-top: 180px;

    .waves-icon {
        position: absolute;
        left: 15px;
        top: -40px;
    }
}

#dive-center-img-1 {
    top: -40px;
    left: 90px;

    .normal {
        width: 50%;
    }
}

#dive-center-img-2 {
    top: -470px;
    left: 232px;

    .normal {
        width: 50%;
    }
}

</style>
