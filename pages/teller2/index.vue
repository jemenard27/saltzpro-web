<template>

    <v-container class="teller2-content">
        <v-container class="teller-header flex justify-start items-center">
            <img src="~assets/images/page-logo.jpg" alt="">
            
            <span>
                Fight # {{sultada.sltd_number}}
                <p class="block">
                    {{sultada.ev_name}}
                </p>
            </span>
        </v-container>

        <div class="betting-selection-container">

            <v-container class="bet-status w-full bg-red-600 text-center" :class="{'open-bet': sultada.bet_stat == 'OB' && sultada.sltd_odds != 0}">
                <span v-if="sultada.sltd_res == 'NR'">{{sultada.bet_stat == 'OB' && sultada.sltd_odds != 0 ? 'Open' : 'Closed'}}</span>
                <span v-else-if="sultada.sltd_res != 'NR'">Finished</span>
            </v-container>
            
            <div v-if="sultada.sltd_res == 'NR'">
                <v-row no-gutters class="bet-side" v-if="sultada.sltd_odds != 0">
                    <v-col cols="6" class="bg-red-600 flex flex-col">
                        <v-container class="text-center bg-red-800"><span>MERON</span></v-container>
                        <v-container class="text-center">
                            <span class="total-amt">
                                {{sultada.sum_meron != null ? getDecimalFormat(sultada.sum_meron) : '0.00'}}
                                <span class="block odds">{{sultada.odds_meron}}%</span>
                            </span>
                            <v-btn v-if="sultada.bet_stat == 'OB' && sultada.sltd_odds != 0" class="w-full bet-button meron" @click="openBetModal('M')">CHOOSE<br>MERON</v-btn>
                        </v-container>
                        
                    </v-col>
                    
                    <v-col cols="6" class="bg-blue-600 flex flex-col">
                        <v-container class="text-center bg-blue-800"><span>WALA</span></v-container>
                        <v-container class="text-center">
                            <span class="total-amt">
                                {{sultada.sum_wala != null ? getDecimalFormat(sultada.sum_wala) : '0.00'}}
                                <span class="block odds">{{sultada.odds_wala}}%</span>
                            </span>
                            <v-btn v-if="sultada.bet_stat == 'OB' && sultada.sltd_odds != 0" class="w-full bet-button wala" @click="openBetModal('W')">CHOOSE<br>WALA</v-btn>
                        </v-container>
                        
                    </v-col>
                </v-row>
            </div>


            <div v-if="sultada.sltd_res != 'NR'" class="winner-container flex items-center justify-center">
                <span v-if="sultada.sltd_res == 'M'" class="text-center">Fight #{{sultada.sltd_number}} Winner:
                    <span class="block meron">MERON</span>
                </span>
                <span v-else-if="sultada.sltd_res == 'W'" class="text-center">Fight #{{sultada.sltd_number}} Winner:
                    <span class="block wala">WALA</span>
                </span>
                <span v-else-if="sultada.sltd_res == 'D'" class="text-center">Fight #{{sultada.sltd_number}} Winner:
                    <span class="block draw">DRAW</span>
                </span>
                <span v-else-if="sultada.sltd_res == 'V'" class="text-center">Fight #{{sultada.sltd_number}} Winner:
                    <span class="block cancel">CANCEL</span>
                </span>
            </div>  

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
        .betting-selection-container {
            .open-bet {
                background-color: $green_1 !important;
            }
        }
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

        .winner-container {
            background: transparent;
            height: 151px;
            span {
                font-size: 14px;
                color: $white;
                line-height: 20px;
                font-weight: 500;
                span {
                    font-size: 18px;
                    line-height: 24px;
                    font-weight: 700;
                    &.meron {
                        color: $red !important;
                    }
                    &.wala {
                        color: $blue !important;
                    }
                    &.draw {
                        color: $green_600 !important;
                    }
                    &.cancel {
                        color: $gray_1 !important;
                    }
                }
            }
        }

    }
    
</style>

<script>
import Worker from 'web-worker';
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
            sultada: {},
            isRunQuery: false,
            oldSltd : 0,
            oldResult: "NR",
            curResult: {},
            bolTrig: false

        }
    },
    watch: {
        isRunQuery: {
            handler(newValue, oldValue) {
                this.currentSltd()
            }
        },
        
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

        closeConfirmation() {
            this.betConfirmation = false
        },
        
        async currentSltd() {
            var id = sessionStorage.getItem('pc_branch')
            await Promise.all([
                // this.$axios.$get(this.$axios.defaults.baseURL + `/sultada/${this.$auth.user.branch_id}`).then((res) => {
                this.$axios.$get(this.$axios.defaults.baseURL + `/sultada/${id}`).then((res) => {
                    this.sultada = res
                    
                    setTimeout(() => {
                        this.isRunQuery = !this.isRunQuery
                    }, 1000);
                }).catch(() => {
                    setTimeout(() => {
                        this.isRunQuery = !this.isRunQuery
                    }, 1000);
                })
            ])
                
            
            // console.log(this.sultada.bet_stat)
        },

        getDecimalFormat(amt) {
            var currency = parseFloat(amt)
            var res = 0
            if (currency == 0) {
                res = '0.00'
            } else {
                res = currency.toLocaleString(undefined, {minimumFractionDigits: 2})
            }
            return res
        },

        getresult(oldSltd) {
            this.$axios.$put(this.$axios.defaults.baseURL + `/result/${oldSltd}`).then((res) => {
                this.curResult = res
                this.bolTrig = true
            })
                
            setTimeout(() => {
            }, 6000);
            this.bolTrig = false
            
            // console.log(this.sultada.bet_stat)
        },

        getNext(branchId) {
            var data = {
                branch: branchId
            }

            this.$axios.$put(this.$axios.defaults.baseURL + '/nextsultada', data).then(() => {
                setTimeout(() => {
                    this.isRunQuery = !this.isRunQuery
                }, 4000);
            })
            
            
        },

        addBet() {
            var data = {
                odds_sltd: this.sultada.odds_sltd,
                bet_amt: this.betDetails.bet,
                bet_side: this.betDetails.betside == 'M' ? 'MERON' : 'WALA',
                branch_id: this.$auth.user.branch_id,
                bet_pc: this.$auth.user.pc_number,
                sltd_odds: this.sultada.sltd_odds,
                bet_plasada: this.$auth.user.brnch_plasada
            }
            this.$axios.$post(this.$axios.defaults.baseURL + '/addbet', data).then((res) => {

            })
            this.betConfirmation = false
        },
        // webWorking() {
        //     const worker = new Worker();
        //     var i = 0
        //     worker.postMessage('59')
        //     worker.addEventListener('message', e => {
        //         console.log(e.data)  // 42
        //     });

        // }
    },
    mounted() {
        this.isRunQuery = true
        this.isLoginUser()
    }
}
</script>