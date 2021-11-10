<template>
    <div>
      <Navbar/>
        <div class="container">
        <div class="row"> 
          <h3 class="text-center">Editar Categoria</h3>
          <div class="row">
              <div class="col-md-12">
                  <form @submit.prevent="updateCategory">
                      <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" v-model="category.name">
                      </div>
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
                category: {},
            }
        },
        created() {
            const config = {
                  headers: { Authorization: 'Bearer' + localStorage.getItem('_tAthenas') }
            };
            this.$http
                .get(`/categories/${this.$route.params.id}`, config)
                .then((res) => {
                    this.category = res.data;
                });
        },
        methods: {
            updateCategory() {
                const config = {
                    headers: { Authorization: 'Bearer' + localStorage.getItem('_tAthenas') }
                };
                this.$http
                    .put(`/categories/${this.$route.params.id}`, this.category, config)
                    .then((res) => {
                        this.$router.push({ name: 'Category' });
                        console.log(res)
                    }).catch((error) => {
                      console.log(error);
                  });
            },   
        }
    }
</script>