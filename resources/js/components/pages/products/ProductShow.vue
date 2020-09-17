<template>
    <div>
        <h1>{{product.name}}</h1>
        <p>{{product.details}}</p>
        <p><strong>{{product.gender.name}}</strong></p>
        <strong>Type:</strong>
        <div v-for="material in product.materials[0]" :key="material.id">
            <div v-if="material.name.length">{{ material.name }}</div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            product: {
                id: '',
                name: '',
                details: '',
                gender: '',
                materials: '',
            }
        }
    },
    created() {
        this.fetchProduct();
        // this.fetchImages();
    },
    methods: {
        fetchProduct() {
            var url = '/api/products/' + window.location.href.split('/').pop();
            fetch(url)
            .then(res => res.json())
            .then(res => {
                this.product = res.data;
            })
            .catch(err => console.log(err));
        },
        fetchImages() {
            var url = '/api/product/images' + window.location.href.split('/').pop();
            fetch(url)
            .then(res => res.json())
            .then(res => {
                this.product = res.data;
            })
            .catch(err => console.log(err));
        }
    }
}
</script>