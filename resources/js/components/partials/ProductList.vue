<template>
    <div>
        <h2>Clothes</h2>
        <div v-for="product in products" v-bind:key="product.id">
            <product-item :product="product"/>
        </div>
        <nav>
            <ul>
                <li :class="{disabled: !pagination.prev_page_url}"><a href="#"
                @click="fetchProducts(pagination.prev_page_url)">Previous</a></li>

                <li><a href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a></li>

                <li :class="{disabled: !pagination.next_page_url}"><a href="#"
                @click="fetchProducts(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            product: {
                id: '',
                name: '',
                details:'',
                gender: '',
            },
            product_id: '',
            pagination: {},
        }
    },

    created() {
        this.fetchProducts();
    },

    methods: {
        fetchProducts(page_url) {
            let vm= this;
            page_url = page_url || '/api/products'
            fetch(page_url)
             .then(res => res.json())
             .then(res => {
                 this.products = res.data[0];
                 vm.makePagination(res.meta, res.links);
             })
             .catch(err => console.log(err));
        },
        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }

            this.pagination = pagination;
        }
    }
}
</script>

<style scoped>
.disabled {
    pointer-events: none;
}
</style>