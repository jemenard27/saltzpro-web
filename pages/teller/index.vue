<template>
    <v-container class="content-container">
        <v-row>
            <v-col sm="7" md="8">
                <div class="amt-display-container flex justify-between w-full">
                    <span> Logged in: {{$auth.loggedIn}} </span>
                    <span>{{ betAmt.toLocaleString() }}</span>
                </div>
            </v-col>
        </v-row>
        <v-row>
            <v-col sm="7" md="8">
                <table class="bet-container w-full">
                    <tbody>
                        
                        <tr>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(10)">10</v-btn></td>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(10)">20</v-btn></td>
                        </tr>
                        <tr>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(50)">50</v-btn></td>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(100)">100</v-btn></td>
                        </tr>
                        <tr>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(200)">200</v-btn></td>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(500)">500</v-btn></td>
                        </tr>
                        <tr>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(1000)">1000</v-btn></td>
                            <td><v-btn class="btn-amt" elevation="3" block @click="addBet(5000)">5000</v-btn></td>
                        </tr>
                        <tr>
                            <td><v-btn class="btn-bet" color="error" elevation="3" block>BET MERON</v-btn></td>
                            <td><v-btn class="btn-bet" color="primary" elevation="3" block>BET WALA</v-btn></td>
                        </tr>
                    </tbody>
                </table>
                <!-- <v-row>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>10</v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>20</v-btn>
                    </v-col>
                </v-row>
                
                <v-row>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>50</v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>100</v-btn>
                    </v-col>
                </v-row>
                
                <v-row>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>200</v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>500</v-btn>
                    </v-col>
                </v-row>
                
                <v-row>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>1000</v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn class="btn-amt" elevation="3" block>5000</v-btn>
                    </v-col>
                </v-row>
                
                <v-row>
                    <v-col cols="6">
                        <v-btn class="btn-bet" color="error" elevation="3" block>BET MERON</v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn class="btn-bet" color="primary" elevation="3" block>BET WALA</v-btn>
                    </v-col>
                </v-row> -->
            </v-col>
        </v-row>
    </v-container>
</template>


<script lang="ts">
    import { Vue, Component, Prop } from 'vue-property-decorator'
    @Component
    export default class tellerClass extends Vue {
        
        betAmt: any = 0
        $nuxt! : any

        public addBet(amt: number): void {
            this.betAmt += amt
        }


        mounted() {
            this.$nuxt.$on('clear-bet', () => {
                this.betAmt = 0
            })
        }

    }

</script>

<style lang="scss" scoped>
    @import '~assets/scss/colors';
    @import '~assets/scss/fonts';
    .content-container {
        button {
            @include josefinsans-font(22px, 32px, 700, $white);
        }
        .amt-display-container {
            background-color: $black;
            padding: 1rem;
            span {
                @include josefinsans-font(32px, 32px, 700, $white);
                letter-spacing: 2px;
            }
        }

        .bet-container {
            height: calc(100vh - 300px);

            tr > td {
                padding: .5rem;
                width: 50%;
            }
        }

        .btn-bet {
            height: 100% !important;
        }

        .btn-amt {
            height: 100% !important;
            background-color: $green_600 !important;
            color: $white;
        }
        
    }

</style>