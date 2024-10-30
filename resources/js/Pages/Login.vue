<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #4CAF50 30%, #81C784 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}

.login-container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    width: 320px;
    text-align: center;
    animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.login-container h2 {
    margin-bottom: 24px;
    font-size: 24px;
    color: #4CAF50;
}

.login-container label {
    display: block;
    text-align: left;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
}

.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 14px;
    background-color: #f9f9f9;
}

.login-container input:focus {
    border-color: #4CAF50;
    outline: none;
}

.login-container button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 12px;
    width: 100%;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-container button[type="submit"]:hover {
    background-color: #45a049;
}

.login-container .message {
    margin-top: 20px;
    font-size: 15px;
}

.login-container .message button {
    background-color: transparent;
    border: none;
    color: #4CAF50;
    font-size: 15px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.login-container .message button:hover {
    color: #388E3C;
}

.login-container .message a {
    text-decoration: none;
    color: #4CAF50;
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
            <form @submit.prevent=(form.post(login()))>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" v-model="form.email" required />

                <label for="password">Password</label>
                <input type="password" name="password" id="password" v-model="form.password" required />

                <button type="submit">Logar</button>
            </form>

            <div class="message">
                <p>Não tem uma conta?</p>
                <Link :href="route('register')"><button>Registre-se aqui</button></Link>
            </div>
        </div>
    </body>

</template>

<script>
import { router, Link, Head, useForm } from '@inertiajs/vue3';
import axios from 'axios';

export default {

    components: {
        useForm,
        Head,
        Link,
        router
    },

    data() {
        const form = useForm({
            email: useForm.email,
            password: useForm.password
        });

        function login() {
            axios({
                method: "post",
                url: "/api/login",
                data: {
                    email: form.email,
                    password: form.password
                }
            }).then(response => {
                if (response.data.access_token) {
                    localStorage.setItem("_token", response.data.access_token)
                    console.log(router.get("/home", "", {
                        headers: {
                            Authorization: "Bearer" + localStorage.setItem("_token", response.data.access_token)
                        }
                    }))
                }
            })
        }

        return {
            form,
            login
        };
    }
};
</script>
