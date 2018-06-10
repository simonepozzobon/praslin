<template lang="html">
    <div id="boats" class="container">
          <div class="row">
                <div class="col-md-6">
                    <waves class="waves-icon"/>
                    <div id="boats-images">
                        <div id="boats-img-1">
                            <img src="/images/boat.jpg" class="img-fluid"/>
                        </div>​
                        <div id="boats-img-2">
                            <img src="/images/boat-2.jpg" class="img-fluid"/>
                        </div>​
                    </div>
                </div>
                <div class="col-md-6">
                    <section-title title="Boats" number="02" align="left"/>
                    <section-subtitle>
                        Pick up the equipment and get on board.
                    </section-subtitle>
                    <section-paragraph>
                        Our specially design speed boat provide all the comfort a
                        small embarkation dive boat can provide,equipped with all
                        safety and navigational equipment to get you right on the
                        dive spots with a 100% accuracy.<br>
                        High standards of safety and outstanding service oriented
                        staff, a dive trip with us is sure to leave you relaxed
                        and rejuvenated, or pumped up and ready for more.<br>
                        So call Praslin Pro Divers today to inquire about our
                        services, book a dive, sign up for a course, or just
                        “talk story”.<br>
                        We are open daily from 09:00 hrs - 17:00 hrs.
                        We look forward to dive with you and share the colorful
                        side of life.
                    </section-paragraph>
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
    name: 'Boats',
    components: {
        SectionParagraph,
        SectionSubtitle,
        SectionTitle,
        Waves,
    },
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

#boats {
    padding-bottom: 180px;

    .waves-icon {
        position: absolute;
        right: 15px;
        top: -40px;
    }
}

#boats-images {
    position: relative;

    > #boats-img-1 {
        position: absolute;
        right: 90px;
        top: -40px;
        width: 75%;
    }

    > #boats-img-2 {
        position: absolute;
        top: 180px;
        left: 0;
        width: 65%;
        @include box-shadow(0 2px 16px 0 rgba($black, 0.33));
    }

}

</style>
