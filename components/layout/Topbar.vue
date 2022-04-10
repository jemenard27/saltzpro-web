<template>
    <v-app-bar elevation="4" color="#111827" class="app-bar-container flex">
        <v-btn class="menu-button" @click.prevent="logoutUser">
            <v-icon>mdi-menu</v-icon>
        </v-btn>

        <div class="credits h-full items-center">
            <span class="credit-amt px-2">1,977.00</span>
            <v-btn class="menu-button remove-padding rotate-180">
                <v-icon>mdi-cards</v-icon>
            </v-btn>
            <v-btn class="menu-button remove-padding">
                <v-icon>mdi-refresh</v-icon>
            </v-btn>
        </div>
    </v-app-bar>
</template>

<script>
export default {
    
    methods: {
        
        async logoutUser() {
            await this.$auth.logout().then(() => {
                location.reload();
            })
        }
    }
}
</script>

<style lang="scss">
@import '~assets/scss/colors';
@import '~assets/scss/fonts';
.app-bar-container {
    .v-toolbar__content {
        padding: 0px !important;
        justify-content: space-between !important;
        .menu-button {
            background: transparent;
            box-shadow: none;
            height: 100%;

            &.remove-padding {
                padding-left: 4px !important;
                padding-right: 4px !important;
                min-width: 33px;
            }
        }

        .v-icon {
            font-size: 2.3em;
            color: $white;
        }

        
    }

    .credits {
        display: flex;
        padding-right: 16px
    }

    .credit-amt {
        @include josefinsans-font(20px, 20px, 500, $white);
        
    }

    .rotate-180 {
        transform: rotate(180deg);
    }
}
</style>