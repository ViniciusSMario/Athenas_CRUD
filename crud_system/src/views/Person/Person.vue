<template>
    <div class="person">
        <Navbar/>
        <div>
            <h2>Lista de Pessoas</h2>
            <button class="btn btn-primary">
                <router-link to="/persons/create" style="text-decoration: none; color: #FFF;">Cadastrar pessoa</router-link>
            </button> 
              <table class="table" id="datatable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in persons" :key="item.id">
                        <td>{{item.id}}</td>
                        <td>{{item.name}}</td>
                        <td>{{item.email}}</td>
                        <td>{{item.categories_id}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link class=" btn btn-group btn-success" :to="{name: 'EditPerson', params: { id: item.id }}">Edit</router-link>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-danger" @click="deletePerson(item.id)">Excluir</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
            </table>    
            <div class="card-footer">
              <Pagination :source="pagination" @navigate="navigate"></pagination>
          </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../../components/Navbar.vue'
import Pagination from '../../components/Pagination.vue'
import 'jquery/dist/jquery.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"

export default {
    name:'Person',
    components: {
        Navbar,
        Pagination
    },
    data(){
        return {
            persons: [],
            pagination: {}
        };
    },
    created() {
        this.getPersons();
    },

    methods: {
        async getPersons() {
            const url = '/persons';
            await this.$http.request({url,
                method:'GET',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                }
            })
            .then(({ data }) => {
                this.persons = data.data;
                this.pagination = data;

            }).catch((error) => {
                console.log(error);
            });
        },
        deletePerson(id) { 
            const url = `/persons/${id}`;

            this.$http
                .request({
                url, 
                method:'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                }})
                .then(res => {
                    let i = this.persons.map(data => data.id).indexOf(id);
                    this.persons.splice(i, 1)
                    console.log(res)
                });
        },
        navigate(page){
            const url = '/persons?page=' +page;
            this.$http.request({url,
                method:'GET',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                }
            })
            .then(({ data }) => {
                this.persons = data.data;
                this.pagination = data;

            }).catch((error) => {
                console.log(error);
            });
        }
    },

}
</script>

<style> 
.person{
    margin: 70px;
}
</style>