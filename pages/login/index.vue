<template>
    <v-container class="login-form-container mt-4" transition="scale-transition">
        <section class="logo">
            <img src="~assets/images/si_logo.png" class="bg-gray-700" alt="">
            <span class="block text-center">OCB</span>
        </section>

        <section class="flex flex-col mt-4 px-2">
            <form>
                <input v-model="user" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white leading-tight focus:outline-none focus:shadow-outline my-2" type="text" placeholder="Username">

                <input v-model="pass" class="shadow appearance-none border rounded w-full py-2 px-3 bg-white leading-tight focus:outline-none focus:shadow-outline my-2" type="text" placeholder="Password">

                
                <v-btn @click.prevent="login()" class="my-2 login-btn"
                block
                elevation="4"
                >Log in</v-btn>
            </form>

            <span class="mt-4 px-4 text-center note">{{bottomText}}</span>

        </section>
    </v-container>
</template>

<style lang="scss">
@import '~assets/scss/colors';
@import '~assets/scss/fonts';
    .login-form-container {
        max-width: 600px !important;

        .logo {
            img {
                margin: auto;
                width: 90px;
                background-color: transparent;
            }

            span {
                color: $orange_1;
                font-weight: 500;
                font-size: 18px;
                line-height: 19px;
            }
        }

        .login-btn {
            background-color: $red !important;
            color: $white;
        }

        span.note {
            color: $white;
            font-size: 14px;
            line-height: 18px;
        }
    }
</style>

<script>
export default {
    data() {
        return {
            user: null,
            pass: null,
            bottomText: 'OCB Platform should only be used inside authorized cockpits or outlets.',
        }
    },
    layout: 'login',
    methods: {
        click() {
            // console.log(this.username, this.password)
            this.bottomText = 'This is me'
        },
        login() {
            this.$auth.loginWith('laravelSanctum', {
                data: {
                    email: this.user,
                    password: this.pass
                }
            }).then(() => {
                location.reload();
                this.bottomText = this.$auth.user
            })
        }
    }
}
</script>