<template>
    <div>
        <Navbar/>
            <div class="container">
                <div class="row"> 
                    <h3 class="text-center">Cadastrar pessoa</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <form @submit.prevent="addPerson">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" v-model="person.name">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" v-model="person.email">
                                </div>
                                <br>
                                <label>Categoria</label>
                                <select class="form-select" aria-label="Default select example" v-model="person.categories_id">
                                    <option v-for="item in categories" :key="item.id"  :value="item.id">{{item.name}}</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import Navbar from '../../components/Navbar.vue'

    export default {
        name: 'Create',
        components: {
            Navbar
        },
        data() {
            return {
                person: {},
                categories: []
            }
        },
        mounted() {
            this.getCategories();
        },
        methods: {
            addPerson() {
                const config = {
                    headers: { Authorization: 'Bearer' + localStorage.getItem('_tAthenas') }
                };
                this.$http
                    .post('/persons', this.person, config)
                    .then(response => (
                        this.$router.push({ name: 'Person' }),
                        console.log(response)
                    ))
                    .catch(err => console.log(err))
                    
            },
            async getCategories() {
                const url = '/categories';
                await this.$http.request({url,
                    method:'GET',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_tAthenas') 
                    }
                })
                .then(({ data }) => {
                    this.categories = data.data;
                }).catch((error) => {
                    console.log(error);
                });
            },
        }
    }
</script>

<style>
.container{
    margin-top: 100px;
}
</style>