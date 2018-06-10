<template lang="html">
    <div class="d-inline-block">
        <coral v-if="this.icon_id == 6" :size="size + 'px'"/>
        <macro v-if="this.icon_id == 3" :size="size + 'px'"/>
        <ray v-if="this.icon_id == 5" :size="size + 'px'"/>
        <school-of-fish v-if="this.icon_id == 4" :size="size + 'px'"/>
        <shark v-if="this.icon_id == 1" :size="size + 'px'"/>
        <soft-coral v-if="this.icon_id == 7" :size="size + 'px'"/>
        <turtle v-if="this.icon_id == 2" :size="size + 'px'"/>
    </div>
</template>

<script>
import Coral from './icons/sea-creatures/Coral.vue'
import Macro from './icons/sea-creatures/Macro.vue'
import Ray from './icons/sea-creatures/Ray.vue'
import SchoolOfFish from './icons/sea-creatures/SchoolOfFish.vue'
import Shark from './icons/sea-creatures/Shark.vue'
import SoftCoral from './icons/sea-creatures/SoftCoral.vue'
import Turtle from './icons/sea-creatures/Turtle.vue'

export default {
    name: 'FishIcons',
    props: {
        icon_id: {
            type: Number,
            default: 0,
        },
        size: {
            type: String,
            default: '64'
        }
    },
    components: {
        Coral,
        Macro,
        Ray,
        SchoolOfFish,
        Shark,
        SoftCoral,
        Turtle,
    },
}
</script>

<style lang="css">
</style>
