<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.form-container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #dddddd;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #dddddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-group textarea {
    resize: vertical;
}

.btn-criar-tarefa {
    padding: 10px 20px;
    background-color: #0418c9;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-criar-tarefa:hover {
    background-color: #020d6b;
}

.action-buttons {
    border-radius: 5px;
    display: flex;
    gap: 5px;
}

.btn-editar {
    background-color: #FFA500;
    color: white;
}
</style>

<template>

    <Head title="Criar Tarefa">
    </Head>

    <div class="action-buttons">
        <Link :href="route('home.index')"><button type="submit" class="btn-editar">Voltar</button> </Link>
    </div>

    <div class="form-container">
        <h1>Criar Tarefa</h1>
        <form @submit.prevent="form.post()">
            <div class="form-group">
                <label for="task">Tarefa</label>
                <input v-model="form.task" type="text" id="task" name="task" required>
                <br><br>
                <label for="description">Descrição</label>
                <textarea v-model="form.description" id="description" name="description" rows="3" required></textarea>
            </div>
            <button @click="create(form)" type="submit" class="btn-criar-tarefa">Criar Tarefa</button>

        </form>
    </div>

</template>

<script>

import { Link, Head, useForm } from "@inertiajs/vue3"
import axios from "axios";
import { ref } from "vue"
export default {

    props: {
        task: Object
    },

    components: {
        Link,
        Head,
        useForm
    },

    data() {
        const form = useForm({
            "task": "",
            "description": ""
        })

        const create = (form) => {

            axios.post("/api/store", form).then((response) => {
                if (response.status == 200) {
                    alert(response.data.response);
                    this.$inertia.visit('/home')
                } else {
                    alert("Houve um erro ao tentar executar a criação de uma nova task")
                }
            });
        }

        return {
            form,
            create
        }
    }
}
</script>
