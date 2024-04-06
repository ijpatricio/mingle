<script setup>
import {ref} from 'vue'
import Button from './Button.vue'

const props = defineProps({
    wire: {},
    mingleData: {},
})

const count = ref(1)

const doubleCurrentCount = () => {
    props.wire.doubleIt(count.value).then((data) => {
        count.value = data
    })
}

const message = props.mingleData.message

</script>

<template>
    <div class="m-10">

        <div class="text-lg">
            Counter component with Vue
        </div>

        <div class="mt-8">
            Initial message: {{ message }}
        </div>

        <div class="mt-8"></div>

        <div> Let's make the operation on the server, for demo purposes. </div>
        <div class="mt-2 flex gap-4 items-center">
            <Button @click="() => count = 1" label="Keep it (reset)" />
            <div> Current Count: {{ count }} </div>
            <Button @click="doubleCurrentCount" label="Double it - and give it to the next person" />
        </div>

    </div>
</template>
