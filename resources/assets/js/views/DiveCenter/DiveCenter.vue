<template lang="html">
    <div id="dive-center" class="container">
        <div class="row">
            <div class="col-md-6">
                <section-title title="Dive Center" number="02" align="right"/>
                <section-subtitle>
                    We are a “S.E.A“ dive centre.
                </section-subtitle>
                <section-paragraph>
                    The dive centre is located in the north-east corner of the
                    long stretch of Anse Gouvernement Beach at l’Archipel Hotel which
                    also provide all the services a holiday maker may need.<br>
                    We are a “S.E.A“ dive centre equipped with all scuba pro
                    gears, design and manufactured by scuba pro specialist team.
                </section-paragraph>
            </div>
            <div class="col-md-6">
                <waves class="waves-icon"/>
                <div id="images">
                    <div id="dive-center-img-1">
                        <img src="/images/dive-center.jpg" class="img-fluid"/>
                    </div>​
                    <div id="dive-center-img-2">
                        <img src="/images/equipment-3.jpg" class="img-fluid"/>
                    </div>​
                    <div id="dive-center-img-3">
                        <img src="/images/SEA-logo.png" class="img-fluid"/>
                    </div>
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
        width: 65%;
        @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
    }

    > #dive-center-img-3 {
        position: absolute;
        top: 280px;
        left: 0;
        width: 30%;
    }
}

</style>
