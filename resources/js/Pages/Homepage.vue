<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.top-bar button,
.action-buttons button {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.top-bar button {
    background-color: #4CAF50;
    color: white;
}

.top-bar button:hover {
    background-color: #45a049;
}

.btn-tarefa {
    background-color: #007BFF;
    color: white;
    width: 150px;
}

.btn-tarefa:hover {
    background-color: #1600d9;
    width: 150px;
}

.action-buttons {
    display: flex;
    gap: 5px;
}

.btn-editar {
    background-color: #FFA500;
    color: white;
}

.btn-editar:hover {
    background-color: #FF8C00;
}

.btn-excluir {
    background-color: #FF0000;
    color: white;
}

.btn-excluir:hover {
    background-color: #DC143C;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table,
th,
td {
    border: 1px solid #dddddd;
}

th,
td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
</style>

<template>

    <Head title="Tarefas do dia"></Head>

    <div class="top-bar">
        <button onclick="location.href='#'">Logout</button>
    </div>
    <h1>Tarefas do dia</h1>
    <div class="action-buttons">
        <Link :href="route('home.create')"><button type="submit" class="btn-tarefa">Criar Tarefa</button></Link>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="task in tasks" :key="task.id">
                <td>{{ task.id }}</td>
                <td>{{ task.task }}</td>
                <td>{{ task.description }}</td>
                <td>{{ task.data_criacao }}</td>
                <td>
                    <div class="action-buttons">
                        <Link :href="route('home.edit', task.id)">
                        <button type="submit" class="btn-editar">Editar</button>
                        </Link>
                        <button type="submit" class="btn-excluir">Excluir</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>

import { Link, Head } from "@inertiajs/vue3";
export default {
    props: {
        tasks: Object
    },
    components: {
        Head,
        Link
    }
}
</script>
