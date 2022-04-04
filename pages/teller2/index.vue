<template>

    <v-container class="teller2-content">
        <v-container class="teller-header flex justify-start items-center">
            <img src="~assets/images/page-logo.jpg" alt="">
            
            <span>
                Fight #9
                <p class="block">
                    A2 - CEBU 4 COCK/BULLSTAG DERBY DAY 1 (AMENIC N' CALAJOAN)
                </p>
            </span>
        </v-container>

        <div class="betting-selection-container">

            <v-container class="bet-status w-full bg-red-600 text-center">
                <span>Closed</span>
            </v-container>
            
            <v-row no-gutters class="bet-side">
                <v-col cols="6" class="bg-red-600 flex flex-col">
                    <v-container class="text-center bg-red-800"><span>MERON</span></v-container>
                    <v-container class="text-center">
                        <span class="total-amt">
                            452,745.00
                            <span class="block odds">180.59%</span>
                        </span>
                        <v-btn class="w-full bet-button meron" @click="openBetModal('M')">CHOOSE<br>MERON</v-btn>
                    </v-container>
                    
                </v-col>
                
                <v-col cols="6" class="bg-blue-600 flex flex-col">
                    <v-container class="text-center bg-blue-800"><span>WALA</span></v-container>
                    <v-container class="text-center">
                        <span class="total-amt">
                            412,453.15
                            <span class="block odds">198.23%</span>
                        </span>
                        <v-btn class="w-full bet-button wala" @click="openBetModal('W')">CHOOSE<br>WALA</v-btn>
                    </v-container>
                    
                </v-col>
            </v-row>

            <v-dialog v-model="betData.isOpen" max-width="500px">
                <card-bet @close="closeBetModal" @open-confirmation="openConfirmation" :betInfo="betData"></card-bet>
            </v-dialog>
            
            <v-dialog persistent v-model="betConfirmation" max-width="500px">
                <card-confirmation @close="closeConfirmation" @add-bet="closeConfirmation, closeBetModal">
                    <template #confirmation-title>
                        <span>Confirm</span>
                    </template>
                    <template #confimation-msg>
                        
                        <span>
                            Are you sure you want to choose
                            <span class="block">{{betDetails.bet.toLocaleString()}}</span>
                            <span class="block">{{betDetails.betside == 'M' ? 'Meron' : 'Wala'}}</span>
                        </span>
                    </template>

                    <template #confirmation-btn>
                        <v-btn color="primary" @click="addBet(), closeBetModal()">Yes</v-btn>
                    </template>
                </card-confirmation>
            </v-dialog>
        </div>
    </v-container>
    
</template>

<style lang="scss">

    @import '~assets/scss/colors';
    @import '~assets/scss/fonts';
    @import '~assets/scss/variants/media-queries';

    .teller2-content {
        &.container {
            padding: 0px;
        }
        .container {
            @include josefinsans-font(12px, 14px, 700, $white);
        }
        .teller-header {
            
            span {
                @include josefinsans-font(16px, 18px, 700, $white);
                p {
                    @include josefinsans-font(14px, 16px, 500, $white);
                    margin-bottom: 0px;
                }
            }
            > img {
                width: 80px;
            }

        }

        span {
            @include josefinsans-font(12px, 14px, 700, $white);
        }


        .bet-status {   
            span {
                letter-spacing: 1.5px;
            }
            
        }

        .bet-side {
            min-height: 100px;
            .total-amt {
                @include josefinsans-font(16px, 18px, 700, $white);
                letter-spacing: 1.2px;
            }

            .odds {
                @include josefinsans-font(16px, 18px, 500, $white);
                margin-bottom: 5px;
            }
        }

        .bet-button {
            height: auto !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;

            &.meron {
               span {
                   color: $red;
               }
            }

            &.wala {
                span {
                    color: $blue;
                }
            }
        }

    }
    
</style>

<script>
export default {
    layout: 'siteller',
    data() {
        return {
            betData : {
                betType : '',
                isOpen: false,
                betAmt: null,
                betSuggest : [
                        {suggestedAmt : 100},
                        {suggestedAmt : 200},
                        {suggestedAmt : 300},
                        {suggestedAmt : 400},
                        {suggestedAmt : 500},
                        {suggestedAmt : 600},
                        {suggestedAmt : 700},
                        {suggestedAmt : 800},
                        {suggestedAmt : 900},
                        {suggestedAmt : 1000},
                        {suggestedAmt : 1500},
                        {suggestedAmt : 2000},
                        {suggestedAmt : 2500},
                        {suggestedAmt : 3000},
                        {suggestedAmt : 3500},
                        {suggestedAmt : 4000},
                        {suggestedAmt : 4500},
                        {suggestedAmt : 5000},
                ],
            },
            betConfirmation: false,
            betDetails: {},

        }
    },
    methods: {
        openBetModal(betSide) {
            this.betData.isOpen = true
            this.betData.betType = betSide
            this.betData.betAmt = 0
        },

        closeBetModal() {
            this.betData.isOpen = false
        },

        openConfirmation(data) {
            
            this.betDetails = data

            if (this.betDetails.bet != 0) {
                this.betDetails = data
                this.betConfirmation = true
            } else {

            }
        },

        addBet() {
            console.log(this.betDetails)
            this.betConfirmation = false
        },

        closeConfirmation() {
            this.betConfirmation = false
        }
    },
    mounted() {
        setInterval(() => {
            console.log('t')
        }, 1000);
    }
}
</script>