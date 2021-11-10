<template>
<div>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">CRUD Athenas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categories">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/persons">Pessoas</a>
            </li>
        </ul>
        <form @click="logout" class="d-flex">
            <button class="btn btn-outline-danger" type="submit">Sair</button>
        </form>
        </div>
    </div>
    </nav>
</div>
</template>

<script>
export default {
    name: 'Navbar',
    methods: {
        logout(){
            localStorage.removeItem('_tAthenas')
        }
    }
}
</script>

<style>

</style>