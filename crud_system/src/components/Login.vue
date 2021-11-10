<template>
  <main class="form-signin">
  <form @submit.stop.prevent="submit">
    <h1 class="h3 mb-3 fw-normal">Faça login para continuar</h1>

    <div class="form-floating">
      <input 
      v-model="email"
      type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">E-mail</label>
    </div>
    <br>
    <div class="form-floating">
    <input
      v-model="password"
    type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
  </form>
</main>
</template>

<script>
export default {
    name: 'Login',
    data(){
        return {
            email: '',
            password:''
        }        
    },
    methods:{
        submit(){
            const payload = {
                email: this.email,
                password: this.password
            }

            fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Access': 'application/json'
                },
                body: JSON.stringify(payload)
            }).then(response => response.json())
            .then(
                res => (
                  localStorage.setItem('_tAthenas', res.token),
                  this.$router.push({ name: 'Home' })
                )
            ).catch((error) =>{
                console.log(error);
            })
        }
    }
}
</script>

<style>

.form-signin {
  width: 100%;
  max-width: 630px;
  padding: 15px;
  margin:100px auto auto auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>