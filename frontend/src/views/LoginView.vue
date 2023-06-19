<template>
    <h2>Login</h2>

    <form @submit.prevent="login">
        <input type="text" placeholder="Seu e-mail"
               v-model="user.email">
        <input type="password" placeholder="Sua senha"
               v-model="user.password">
        <button type="submit">Login</button>
    </form>
</template>

<script setup>
import http from "@/services/http";
import {reactive} from "vue";

const user = reactive({
    email: 'daniel.engca@outlook.com',
    password: '12345678'
})

async function login() {
    try {
        const {data} = await http.post("/auth",{user});
        console.log(data);
    } catch (error) {
        console.log(error.response);
    }
}
</script>

<style lang="scss" scoped>

</style>