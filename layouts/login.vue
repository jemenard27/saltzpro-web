<template>
    <v-app>
        <layout-topbar></layout-topbar>
        <div class="login-container bg-gray-700">
            <Nuxt />
        </div>
    </v-app>
</template>

<style lang="scss">
@import '~assets/scss/colors';
    .login-container {
        height: 100vh;
        width: 100vw;
    }
</style>