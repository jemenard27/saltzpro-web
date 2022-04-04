<template>
    <div class="mobile-footer-container w-full">
        <v-bottom-navigation
        color="indigo"
        height="70"
        >
        <v-btn>
            <span>Bet</span>

            <v-icon>mdi-dialpad</v-icon>
        </v-btn>

        <v-btn>
            <span>Payout</span>

            <v-icon>mdi-ticket</v-icon>
        </v-btn>

        <v-btn>
            <span>Cancel</span>

            <v-icon>mdi-ticket-percent</v-icon>
        </v-btn>

        
        <v-btn @click="clearBet">
            <span>Clear</span>

            <v-icon>mdi-eraser</v-icon>
        </v-btn>
        </v-bottom-navigation>
    </div>
    
</template>

<style lang="scss">
    @import '~assets/scss/variants/media-queries';
    .mobile-footer-container {
        padding: 0px !important;
        position: fixed;
        height: 70px !important;
        bottom: 0;
        display: none;
        @include mobile-lg {
            display: block !important;
        }

        .v-bottom-navigation {
            button {
                height: 76px !important;
            }
        }
    }
    
</style>

<script lang="ts">
import { Vue, Component, Prop, } from 'vue-property-decorator'
@Component
export default class mobileFooterClass extends Vue {

    $nuxt! : any

    clearBet() {
        this.$nuxt.$emit('clear-bet')
    }

}   
</script>