<template>
    <div class="category">
        <Navbar/>
        <h2>Lista de Categorias</h2>
        <button class="btn btn-primary">
            <router-link to="/categories/create" style="text-decoration: none; color: #FFF;">Cadastrar Categoria</router-link>
        </button> 
        <table class="table" id="datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in categories" :key="item.id">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link class=" btn btn-group btn-success" :to="{name: 'EditCategory', params: { id: item.id }}">Edit</router-link>
                    </div>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteCategory(item.id)">Excluir</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>    
        <Pagination :source="pagination" @navigate="navigate"></pagination>
    </div>
</template>

<script>
import Navbar from '../../components/Navbar.vue'
import Pagination from '../../components/Pagination.vue'
import axios from 'axios'
import 'jquery/dist/jquery.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"

export default {
    name:'Category',
    components: {
        Navbar,
        Pagination
    },
    data(){
        return {
            categories: [],
            pagination: {}
        };
    },
    created() {
        this.getCategories();
    },

    methods: {
        async getCategories() {
            const url = '/categories';
            await this.$http(
                {
                    url,
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                    }
            })
            .then(({ data }) => {
                this.categories = data.data;
                this.pagination = data;
            }).catch((error) => {
                console.log(error);
            });
        },
        deleteCategory(id) { 
            const url = `/categories/${id}`;

            this.$http.request({
                url, 
                method:'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                }})
                .then(res => {
                    let i = this.categories.map(data => data.id).indexOf(id);
                    this.categories.splice(i, 1)
                    console.log(res)
                });
        },
        navigate(page){
            const url = '/categories?page=' + page;
            axios.request({url,
                method:'GET',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                }
            })
            .then(({ data }) => {
                this.categories = data.data;
                this.pagination = data;
            }).catch((error) => {
                console.log(error);
            });
        }
    },
}
</script>

<style> 
.category{
    margin: 70px;
}

</style>