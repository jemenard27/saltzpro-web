export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: true,

  server: {
    host: '192.168.1.19',
    port: '3000',
  },

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'saltzpro-app',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'initial-scale=1, user-scalable=no, width=device-width, height=device-height, viewport-fit=cover' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/typescript
    '@nuxt/typescript-build',
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
    // Simple usage
    '@nuxtjs/vuetify',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    'vue-sweetalert2/nuxt',
    '@nuxtjs/axios',
    '@nuxtjs/auth-next'
  ], 
  sweetalert: {
    confirmButtonColor: '#2563eb',
    cancelButtonColor: '#ff0000'
  },
  axios: {
    
    baseURL: 'http://localhost:3000',
  },
  
  router: {
    middleware: ['auth']
  },

  auth: {
    strategies: {
      laravelSanctum: {
        provider: 'laravel/sanctum',
        url: 'http://192.168.1.19:8000',
        endpoints: {
          login: {
            url: '/api/login'
          },
          user: {
            url: '/api/user'
          },
          logout: {
            url: 'api/logout'
          }
        }
      },
    },
    
    redirect: {
      login: '/login',
      logout: '/',
      home: '/teller2',
      // callback: '/login'
    },
    watchLoggedIn: true
  },



  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    publicPath: '/nuxt/',
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  },

  buildDir: 'nuxt-dist'
  
}
