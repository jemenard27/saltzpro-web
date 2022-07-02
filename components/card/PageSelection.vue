<template>
    <div>
        <a href="/teller" class="block">go to teller00</a>
        <a href="/teller2" class="block">go to teller2</a>
        <a class="block" @click="getLink()">go to teller2</a>
    </div>
</template>

<script>
export default {
    methods: {
        getLink() {
            console.log(this.$axios.defaults.baseURL)
        }
    }
}
</script>