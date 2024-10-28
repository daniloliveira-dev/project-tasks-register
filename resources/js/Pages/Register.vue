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

.register-container {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    width: 350px;
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

.register-container h2 {
    margin-bottom: 24px;
    font-size: 24px;
    color: #4CAF50;
}

.register-container label {
    display: block;
    text-align: left;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
}

.register-container input[type="text"],
.register-container input[type="email"],
.register-container input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 14px;
    background-color: #f9f9f9;
}

.register-container input:focus {
    border-color: #4CAF50;
    outline: none;
}

.register-container button[type="submit"] {
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

.register-container button[type="submit"]:hover {
    background-color: #45a049;
}

.register-container .message {
    margin-top: 20px;
    font-size: 15px;
}

.register-container .message button {
    background-color: transparent;
    border: none;
    color: #4CAF50;
    font-size: 15px;
    cursor: pointer;
    transition: color 0.3s ease;
}

.register-container .message button:hover {
    color: #388E3C;
}

.register-container .message a {
    text-decoration: none;
    color: #4CAF50;
}

.register-container .message a:hover {
    text-decoration: underline;
}
</style>

<template>

    <head>

        <Head title="Registro - Tarefas do dia"></Head>
    </head>

    <body>
        <div class="register-container">
            <h2>Registrar</h2>
            <form>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" required />

                <label for="username">Nome de Usuário</label>
                <input type="text" name="username" id="username" required />

                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required />

                <button type="submit">Registrar</button>
            </form>

            <div class="message">
                <p>Já tem uma conta?</p>
                <Link :href="route('login')">
                <button>Faça login aqui</button>
                </Link>
            </div>
        </div>
    </body>

</template>

<script>
import { Link, Head, useForm } from '@inertiajs/vue3';

export default {
    components: {
        useForm,
        Head,
        Link
    },

    data() {
        const form = useForm({
            email: '',
            password: ''
        });

        function register() {

        }

        return {
            form,
            register
        };
    }
};
</script>
