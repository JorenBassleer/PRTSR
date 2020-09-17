<template>
    <div>
        <form @submit.prevent="addProduct">
            <label for="name">Name:</label>
            <input type="text" name="name" id="" v-model="product.name">
            <label for="name">Slug:</label>
            <input type="text" name="slug" id="" v-model="product.slug">
            <label for="name">Details:</label>
            <input type="text" name="details" id="" v-model="product.details">
            <label for="name">Description:</label>
            <input type="text" name="description" id="" v-model="product.description">
            <label for="name">Gender:</label>
            <input type="text" name="gender" id="" v-model="product.gender">
            <label for="materials[1]">materials:</label>
            <input type="text" name="materials[1]" id="" v-model="product.materials">
            <label for="types[1]">types:</label>
            <input type="text" name="types[1]" id="" v-model="product.types">
            <material-list-form  v-model="product.materials"/>
            <type-list-form  v-model="product.types" />
            <button>Submit</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            product: {
                name:'',
                slug: '',
                details: '',
                description: '',
                gender: '',
                materials: '',
                types: ''
            }
        }
    },
    methods: {
        addProduct() {
            fetch('/api/products' ,{
                method: 'post',
                body: JSON.stringify(this.product),
                headers: {
                    'content-type': 'application/json'
                },
            })
            .then(res => res.json())
            .then(data => {
                console.log(JSON.stringify(this.product));
                // this.product.name = '';
                // this.product.slug = '';  
                // this.product.details = '';
                // this.product.description = '';
                // this.product.gender = '';
                // this.product.types = '';
                // this.product.materials = '';
                // alert('Product added');
                
            })
            .catch(err => console.warn(xhr.responseText));
        }
    }
}
</script>
<style scoped>

</style>