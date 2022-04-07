<template>
    <v-container>
        <card-login buttonText="Login me" :submitForm="loginUser"></card-login>
    </v-container>
</template>

<script>
export default {
    layout: 'login',

    methods: {
        async loginUser(logininfo) {
            // try {
            //     let response = await this.$auth.loginWith('local', { data: logininfo })
            //     console.log(response)
            // } catch (err) {
            //     console.log(err)
            // }
        }
    }
}
</script>