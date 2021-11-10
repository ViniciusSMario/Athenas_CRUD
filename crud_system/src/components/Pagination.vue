<template>
    <div class="navigation">
        <nav aria-label="Page navigation example" > 
            <ul class="pagination">
                <li v-for="page in pages" :key="page" class="page-item" :class="{active: source.current_page == page}">
                    <a class="page-link" @click="navigate($event, page)">{{page}}</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import {range} from 'lodash'
export default {
    name: "Pagination",
    props: ['source'],
    watch: {
        source(){
            this.pages = range(1, this.source.last_page+1)
            console.log(this.pages)
        }
    },
    data(){
        return{
            pages: [],    
        }
    },
    methods: {
        navigate(ev, page){
            ev.preventDefault()
            this.$emit('navigate',page);
        }
    }

}
</script>

<style>
.navigation{
    display: flex;
    justify-content: center;
}
</style>