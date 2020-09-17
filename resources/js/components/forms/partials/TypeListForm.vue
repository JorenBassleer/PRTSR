<template>
    <div>
        <div v-for="type in types" v-bind:key="type.id">
            <type-item-form :type="type"/>
        </div>
    </div>
</template>

<script>
export default {
    props: ['product'],
    data() {
        return {
            types: ''
        }
    },
    created() {
        this.fetchTypes();
    },
    methods: {
        fetchTypes() {
            var url = '/api/types';
            fetch(url)
            .then(res=>res.json())
            .then(res => {
                this.types = res.data[0];
            })
            .catch(err => console.log(err));
        }
    }
}
</script>
<style scoped>

</style>