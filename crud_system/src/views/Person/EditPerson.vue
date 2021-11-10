<template>
    <div>
      <Navbar/>
        <div class="container">
        <div class="row"> 
          <h3 class="text-center">Editar Pessoa</h3>
          <div class="row">
              <div class="col-md-12">
                  <form @submit.prevent="updatePerson">
                      <div class="form-group">
                          <label>Name</label>
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
                          <option v-for="item in categories" :key="item.id" :value="item.id">{{item.name}}</option>
                      </select>
                      <br>
                      <button type="submit" class="btn btn-primary">Atualizar</button>
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
        components:{
          Navbar
        },
        data() {
            return {
                person: {},
                categories: []
            }
        },
        created() {
            const config = {
                  headers: { Authorization: 'Bearer' + localStorage.getItem('_tAthenas') }
            };
            this.$http
                .get(`/persons/${this.$route.params.id}`, config)
                .then((res) => {
                    this.person = res.data;
                });
        },
        mounted(){
          this.getCategories();
        },
        methods: {
            updatePerson() {
              const config = {
                  headers: { Authorization: 'Bearer' + localStorage.getItem('_tAthenas') }
              };
                this.$http
                    .put(`/persons/${this.$route.params.id}`, this.person, config)
                    .then((res) => {
                        this.$router.push({ name: 'Person' });
                        console.log(res)
                    }).catch((error) => {
                      console.log(error);
                  });
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