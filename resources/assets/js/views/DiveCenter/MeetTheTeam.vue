<template lang="html">
    <div id="meet-the-team" class="container">
        <div class="row">
            <div class="col-12 pb-5">
                <section-title title="Meet The Team" number="02" align="center"/>
                <waves class="waves-icon"/>
            </div>
            <div class="col-12">
                <div class="row team-mates">
                    <div class="col-md-6 team-mate">
                        <div class="d-flex justify-content-center">
                            <scuba />
                        </div>
                        <div class="team-pic">
                            <img src="/images/jp-circle.jpg" class="img-fluid"/>
                        </div>
                        <div class="team-name">
                            Jean Paul
                        </div>
                        <div class="team-role">
                            Owner & Instructor
                        </div>
                        <div class="description">
                            <p>
                                A pralinois with extensive experiences and
                                knowledge of the Indian ocean. Passionated by
                                the ocean he has been in the diving industry for
                                over 20 years, taught and certified more than
                                300 divers with over 4000 logged dives to date.
                                He is ready to take you for a dive tour,
                                knowing the dive sites as the back of his hands
                                you are sure to be in safe hands.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 team-mate">
                        <div class="d-flex justify-content-center">
                            <sailor align="center"/>
                        </div>
                        <div class="team-pic">
                            <img src="/images/guest-circle.jpg" class="img-fluid"/>
                        </div>
                        <div class="team-name">
                            Ted Charles
                        </div>
                        <div class="team-role">
                            Skipper & Dive Master
                        </div>
                        <div class="description">
                            <p>
                                A pralinois with extensive experiences and
                                knowledge of the Indian ocean. Passionated by
                                the ocean he has been in the diving industry for
                                over 20 years, taught and certified more than
                                300 divers with over 4000 logged dives to date.
                                He is ready to take you for a dive tour,
                                knowing the dive sites as the back of his hands
                                you are sure to be in safe hands.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sailor from '../../components/icons/Sailor.vue'
import Scuba from '../../components/icons/Scuba.vue'
import SectionTitle from '../../components/SectionTitle.vue'
import Waves from '../../components/icons/Waves.vue'


export default {
    name: 'MeetTheTeam',
    components: {
        Sailor,
        Scuba,
        SectionTitle,
        Waves,
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';

#meet-the-team {
    padding-bottom: 122px;

    .waves-icon {
        position: absolute;
        z-index: 2;
        top: 60px;
        left: 50%;
        transform: translateX(-50%);
    }

    .team-mates {
        padding-top: 130px;

        .team-mate {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            .team-pic {
                width: 128px;
                padding-top: $spacer;
                padding-bottom: $spacer;
            }

            .team-name {
                font-weight: 700;
                font-size: 36px;
                text-transform: uppercase;
                display: flex;
                justify-content: center;
            }

            .team-role {
                text-transform: uppercase;
                display: flex;
                justify-content: center;
            }

            .description {
                padding-top: 26px;
                text-align: justify;
                line-height: 1.618;
            }
        }
    }
}

</style>
