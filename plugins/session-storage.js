import Vue from 'vue'

Vue.mixin({
    methods: {
        isLoginUser() {
            var session = sessionStorage.getItem("no_branch")
            
            if (session != 'undefined' && session != null) {
                this.$router.push('/teller2')
            } else {
                this.$router.push('/login')
            }
            console.log(session)
        },
        saveLoggedInData(data) {
            sessionStorage.setItem('no_branch', data.no_branch)
            sessionStorage.setItem('pc_branch', data.pc_branch)
            sessionStorage.setItem('pc_name', data.pc_name)
            sessionStorage.setItem('user_name', data.user_name)
            this.isLoginUser()
        }
    }
})