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

.register-container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

.register-container h2 {
    margin-bottom: 20px;
}

.register-container input[type="text"],
.register-container input[type="email"],
.register-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.register-container input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
}

.register-container input[type="submit"]:hover {
    background-color: #45a049;
}

.register-container .message {
    margin-top: 15px;
    font-size: 14px;
}

.register-container .message a {
    color: #4CAF50;
    text-decoration: none;
}

.register-container .message a:hover {
    text-decoration: underline;
}
</style>

<template>

    <Head title="Registrar Usuário"></Head>

    <body>
        <div class="register-container">
            <h2>Registrar</h2>
            <form @submit.prevent="form.post(route('new-user'))">

                <input v-model="form.email" type="email" name="email" placeholder="Email" required>
                <input v-model="form.user" type="text" name="username" placeholder="Usuário" required>
                <input v-model="form.password" type="password" name="password" placeholder="Senha" required>

                <Link :href="route('new-user')">
                <input type="submit" value="Registrar" />
                </Link>
            </form>
            <div class="message">
                <p>Já tem uma conta?
                    <Link :href='route("Login")'>Faça login aqui</Link>
                </p>
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

        const form = {
            email: "",
            user: "",
            password: "",

        }

        return {
            form
        }
    }

}
</script>
