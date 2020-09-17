<template>
    <div>
        <div v-for="material in materials" v-bind:key="material.id">
            <material-item-form :material="material" />
        </div>
    </div>
</template>
<script>
export default {
    props: ['product'],
    data() {
        return {
            materials: []
        }
    },
    created() {
        this.fetchMaterials();
    },
    methods: {
        fetchMaterials() {
            var url = '/api/materials';
            fetch(url)
            .then(res=>res.json())
            .then(res=> {
                this.materials = res.data[0];
            })
            .catch(err => console.log(err));
        }
    }
}
</script>