<template>
    <div>
        <h3>{{product.name}}</h3>
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
    font-size: 20px;
}
</style>