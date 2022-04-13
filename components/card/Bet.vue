<template>
    <v-card :class="{'meron' : betInfo.betType == 'M', 'wala' : betInfo.betType == 'W'}" class="betting-container relative">
        <div class="close-container absolute" @click="closeBetModal">
            <v-icon>mdi-close-thick</v-icon>
        </div>
        <v-card-title><span class="w-full text-center">{{betInfo.betType == 'M' ? 'CHOOSE MERON' : 'CHOOSE WALA'}}</span></v-card-title>
        <v-card-actions class="flex flex-column">
            <div class="suggestion flex flex-nowrap justify-start w-full ">
                <v-btn class="mx-1 my-1" v-for="(suggest, i) in betInfo.betSuggest" :key="i" elevation="8" fab outlined plain rounded text @click="openConfirmation(suggest.suggestedAmt, betInfo.betType)">{{suggest.suggestedAmt.toLocaleString()}}</v-btn>
            </div>
            
            <div class="divider-container flex justify-center w-full relative mb-3">
                <span class="px-2 relative text-center">OR</span>
                <div class="divider w-full"></div>
            </div>

            <div class="bet-input-container w-full flex justify-between">
                
                <v-text-field v-model="betInfo.betAmt" label="0" autofocus solo dense single-line type="number"></v-text-field>
                <v-btn class="close ml-2" @click="openConfirmation(betInfo.betAmt, betInfo.betType)">CHOOSE</v-btn>
            </div>
        </v-card-actions>
    </v-card>
</template>

<style lang="scss">
@import '~assets/scss/colors';
@import '~assets/scss/fonts';
@import '~assets/scss/variants/media-queries';
    .betting-container {
        border: none !important;
        &.meron {
            background-color: $red !important;
            .v-card__title {
                background-color: $red_2 !important;
            }

            .divider-container { 
                span {
                    background-color: $red !important;
                }
            }
        }

        &.wala {
            background-color: $blue !important;
            .v-card__title {
                background-color: $blue_2 !important;
            }

            .divider-container { 
                span {
                    background-color: $blue !important;
                }
            }
        }

        .suggestion {
            overflow: scroll;
            padding: 0px 0px 16px;
            button {
                background-color: $white;
            }
        }
        
        button {
            @include josefinsans-font(12px, 12px, 700, $black);
            letter-spacing: 0.5px;
        }

        .v-card__title {
            span {
                @include josefinsans-font(16px, auto, 700, $white);
            }
        }

        .divider-container {
            @include josefinsans-font(15px, auto, 700, $white);
            margin-bottom: 5px;
            .divider {
                border: 1px solid $white;
                position: absolute;
                top: 50%;
            }

            span {
                z-index: 10;
                top: 4px;
            }
        }

        .bet-input-container {
            .v-text-field__details {
                display: none;
            }

            .v-text-field__slot {
                input {
                    font-family: 'Josefin Sans', sans-serif;
                }
            }
        }

        .close-container {
            i {
                color: $white;
            }
            top: 1rem;
            right: 1rem;
        }
    }
</style>
<script lang="ts">
    import { Vue, Component, Prop } from 'vue-property-decorator'
    @Component ({
    })
    export default class Modal extends Vue {

        @Prop() betInfo!: any
        betamt : any = 0

        closeBetModal() {
            this.$emit('close')
            
        }

        openConfirmation(amt : any, side : any) {
            var data = {
                bet: amt, betside: side
            }
            this.$emit('open-confirmation', data)
            
            
        }


    }
</script>
