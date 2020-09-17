<template>
    <div>
        <h3><a :href="product.links.self.replace('/api','')">{{product.name}}</a></h3>
        <p>{{product.details}}</p>
    </div>
</template>

<script>
export default {
    props: ['product']
}
</script>

<style scoped>
* {
    margin: 10px;
    font-size: 15px;
}
h3 {
    font-weight: 800;
}
</style>