<template>
    <div class="dark:text-white">
        Build something great!

        <div v-for="i in 3" :key="i">
            <CounterItem />
        </div>
    </div>
</template>

<script>
import CounterItem from './CounterItem.vue'

export default {

    components: { CounterItem },

    // $wire: App\Livewire\MultipleCounters
    props: ['wire', 'mingleData'],

    data: () => ({
        count: 0,
    }),

}
</script>
