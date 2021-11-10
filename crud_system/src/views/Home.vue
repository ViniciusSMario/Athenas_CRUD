<template>
    <div>
      <Navbar/>
      <Card title="Categorias" url="categories"/>
      <Card title="Pessoas" url="persons"/>
    </div>
</template>

<script>
import Navbar from '../components/Navbar'
import Card from '../components/Card'
export default {
    name: 'Home',
    components: {
        Navbar,
        Card
    }
}
</script>

<style>

</style>