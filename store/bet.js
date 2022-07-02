import axios from "~/nuxt-dist/axios"

//state
export const state = () => ({
    betting: [],
})

//getter
export const getters = {

    getUserList(state) {
        return state.betting
    }

}
//action
export const actions = {
    async addUser({commit}, payload) {
        const users = await this.$axios.$post('http://localhost:8000/api/bet', payload)
        console.log(payload)
        commit('getUsers', users)

    }
}
//mutation

export const mutations = {
    getUsers(state, payload) {
        state.betting = payload
    }
}