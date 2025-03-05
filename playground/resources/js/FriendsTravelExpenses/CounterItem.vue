<template>
    <div class="flex gap-4 mt-4">

        <button class="btn btn-sm btn-primary" @click="count++">Increment</button>
        Count: {{ count }}
        <button class="btn btn-sm btn-primary" @click="count--">Decrement</button>
    </div>
</template>

<script>
export default {
    data: () => ({
        count: 0,
    }),

    methods: {
        saveCount() {
            // App.Livewire.CounterItem
            this.wire.saveCount(this.count)
        },
    },
}
</script>
