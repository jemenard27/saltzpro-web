<template>
    <div class="header-container w-full bg-green-600">
        <div class="container mx-auto">
            <span>
                <a href="" @click="$auth.logout()">logout</a>
            </span>
            <span class="block"> Logged in: {{$auth.user}} 
                <span>180-190</span>
            </span>
        </div>
    </div>
</template>

<style lang="scss">
@import '~assets/scss/colors.scss';
@import '~assets/scss/fonts.scss';

    .header-container {
        span {
            @include josefinsans-font(18px, 32px, 700, $white);
            span {
                @include josefinsans-font(18px, 32px, 500, $white);
            }
        }
    }
</style>