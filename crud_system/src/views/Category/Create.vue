<template>
    <div>
        <Navbar/>
            <div class="container">
                <div class="row"> 
                    <h3 class="text-center">Cadastrar Categoria</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <form @submit.prevent="addCategory">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" v-model="category.name">
                                </div>
                                <br>
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
                category: {},
            }
        },
        methods: {
            addCategory() {
                const config = {
                    headers: { Authorization: 'Bearer' + localStorage.getItem('_tAthenas') }
                };
                this.$http
                    .post('/categories', this.category, config)
                    .then(response => (
                        this.$router.push({ name: 'Category' }),
                        console.log(response)
                    ))
                    .catch(err => console.log(err))
                    
            },
        }
    }
</script>

<style>
.container{
    margin-top: 100px;
}
</style>