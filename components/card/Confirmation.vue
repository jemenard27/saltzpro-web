<template>
    <v-card class="confirmation-container relative">
        <v-card-title class="flex justify-center">
            <slot name="confirmation-title">
                <span>Title here...</span>
            </slot>
        </v-card-title>
        <v-card-actions class="flex justify-center flex-column text-center">
            
            <slot name="confimation-msg">
                <span>
                    Message display here...
                </span>
            </slot>
            
        </v-card-actions>

        
        <v-container class="confirmation-btn flex justify-center">
            <slot name="confirmation-btn">
                <v-btn color="primary">Yes</v-btn>
            </slot>
            <v-btn color="error" class="ml-2" @click="closeConfirmation">No</v-btn>
        </v-container>
    </v-card>
</template>

<style lang="scss">

    @import '~assets/scss/colors';
    @import '~assets/scss/fonts';

    .confirmation-container {

        .v-card__actions {
            border-top: 1px solid $gray_1;
            border-bottom: 1px solid $gray_1;
        }
    }
</style>

<script lang="ts">
        import { Vue, Component, Prop, Emit } from 'vue-property-decorator'
        @Component
        export default class confirmationCLass extends Vue {

            closeConfirmation() {
                this.$emit('close')
            }
            
        }
</script>