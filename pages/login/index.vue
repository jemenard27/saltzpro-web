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

                
                <v-btn @click.prevent="isLoggedIn()" class="my-2 login-btn"
                block
                elevation="4"
                >Log in</v-btn>
                <!-- <NuxtLink to="/teller2">
                <v-btn class="my-2 login-btn" 
                block
                elevation="4"
                >Go to teller</v-btn>
                </NuxtLink> -->

                <v-btn @click.prevent="retreiveSession()" class="my-2 login-btn"
                block
                elevation="4"
                >get session</v-btn>
                <v-btn @click.prevent="getUsers()" class="my-2 login-btn"
                block
                elevation="4"
                >get data</v-btn>

                {{sampleData}}
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

import {mapGetters, mapActions} from 'vuex'

export default {
    data() {
        return {
            user: null,
            pass: null,
            bottomText: null,
            sampleData: 'Sample'
        }
    },
    layout: 'login',
    
    computed: {
        ...mapGetters('bet', ['getUserList'])
    },
    methods: {
        login() {
            this.$auth.loginWith('laravelSanctum', {
                data: {
                    email: this.user,
                    password: this.pass
                }
            }).then((res) => {
                console.log(res)
                // location.reload();
                this.sampleData = res
            }).catch((err) => {
                this.sampleData = err
            })
        },
        sample() {
            this.$axios.$get(this.$axios.defaults.baseURL + '/sample').then((res) => {
                this.sampleData = res
            })
        },

        getUser() {
            var data = {
            
                email: this.user,
                password: this.pass
            }
            this.$axios.$post(this.$axios.defaults.baseURL + '/getUser', data).then((res) => {
                
            })

            // localStorage.name = 'Menard Catayas'

            // this.sampleData = localStorage.name

            sessionStorage.setItem('userID', '1');
            sessionStorage.setItem('userName', 'Menard Catayas')
        },

        retreiveSession() {
            this.sampleData = sessionStorage.getItem('pc_name')
        }
        ,
        isLoggedIn() {
            var data = {
            
                email: this.user,
                password: this.pass
            }
            this.$axios.$post(this.$axios.defaults.baseURL+ '/loginUser', data).then(res => {
                if (res.message == 'success') {
                    this.saveLoggedInData(res.data)
                }
            }).catch(() => {
                this.sampleData = 'Incorrect username and password'
            })
        },
        
        ...mapActions('bet', ['addUser']),
        getUsers() {
            var data = {
                'bet_amt': '1234',
                'bet_plasada': '0'
            }
            this.addUser(data)
            console.log(this.getUserList)
        }
    },
    mounted() {
        this.isLoginUser()
    }
}
</script>