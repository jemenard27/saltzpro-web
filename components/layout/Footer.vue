<template>
    <footer class="footer-container p-4 bg-white w-full shadow md:px-6 md:py-8 dark:bg-gray-800 absolute">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com" class="hover:underline">Flowbite™</a>. All Rights Reserved.
        </span>
    </footer>
</template>

<style lang="scss">
@import '~assets/scss/variants/media-queries';
    .footer-container {
        bottom: 0;

        @include touchscreen() {
            display: none;
        }
    }
</style>