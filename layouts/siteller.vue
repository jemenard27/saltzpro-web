<template>
    <v-app>
        <v-container class="teller2-container bg-black">
           <layout-topbar></layout-topbar>
            <Nuxt />
        </v-container>
    </v-app>
</template> 

<style lang="scss">

    @import '~assets/scss/variants/media-queries';
    @import '~assets/scss/colors';
    @import '~assets/scss/fonts';
    .teller2-container {
        max-width: 600px !important;
        height: 100vh;
        padding: 0px;

        
    }

</style>

<script>
export default {
    
}
</script>