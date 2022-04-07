<template>
  <div>
    <form @submit.prevent="userLogin">
      <div>
        <label>Username</label>
        <input type="text" v-model="login.username" />
      </div>
      <div>
        <label>Password</label>
        <input type="text" v-model="login.password" />
      </div>
      <div>
        <button type="submit">Submit</button>

        <button @click="$auth.logout()">logout</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      login: {
        username: 'test@test.com',
        password: '123456'
      }
    }
  },
  methods: {
    async userLogin() {
      // await this.$auth.loginWith('local', { data: this.login }).then(() => {
        
      // }).catch((error)=> {
      //   console.log(error)
      // })

      
      await this.$auth.loginWith('laravelSanctum', {
          data: {
              email: 'test@test.com',
              password: '123456'
          }
      }).then(() => {
          console.log('Login successfully')
          // this.$router.push({path: '/main'});
      })
    }
  }
}
</script>