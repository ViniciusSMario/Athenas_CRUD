<template>
    <div class="container py-3">
        <div class="row text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">{{title}}</h4>
                </div>
                <div class="card-body">
                    <a style="text-decoration:none; color: #000" :href="url">
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">
                            Acessar
                        </button>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: [
        'title',
        'url'
    ]
}
</script>

<style>
</style>