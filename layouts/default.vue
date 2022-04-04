<template>
    <div class="main-container">
        <v-app>
            <layout-header></layout-header>
            <Nuxt />
            <!-- <layout-footer></layout-footer> -->
            <layout-mobile-footer></layout-mobile-footer>
        </v-app>
    </div>
</template> 

<style lang="scss">
    .main-container {
        height: 100vh;

        .container {
            max-width: unset !important;
        }
    }
</style>

<script>
export default {
    
}
</script>