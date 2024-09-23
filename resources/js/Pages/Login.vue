<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

.login-container h2 {
    margin-bottom: 20px;
}

.login-container input[type="text"],
.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.login-container input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
}

.login-container input[type="submit"]:hover {
    background-color: #45a049;
}

.login-container .message {
    margin-top: 15px;
    font-size: 14px;
}

.login-container .message a {
    color: #4CAF50;
    text-decoration: none;
}

.login-container .message a:hover {
    text-decoration: underline;
}
</style>

<template>

    <head>

        <Head title="Login - Tarefas do dia"></Head>
    </head>

    <body>
        <div class="login-container">
            <h2>Login</h2>
            <form @submit.prevent="form.post(route('auth'))">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" v-model="form.email" />

                <label for="password">Password</label>
                <input type="password" name="password" id="password" v-model="form.password" />
                <Link :href="route('auth')"> <input type="submit" value="Entrar"></Link>

            </form>
            <div class="message">
                <Link :href="route('Register')">Registre-se aqui</Link>
            </div>
        </div>
    </body>

</template>

<script>

import { Link, Head, useForm } from '@inertiajs/vue3'

export default {

    components: {
        useForm,
        Head,
        Link
    },

    data() {

        const form = useForm({
            email: "",
            password: ""
        })

        return {
            form
        }
    }
}
</script>