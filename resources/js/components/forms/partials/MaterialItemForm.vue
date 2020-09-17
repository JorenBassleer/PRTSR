<template>
    <div>
        <label :for="`materials[${material.id}]`">{{material.name}}</label>
        <input type="checkbox" :for="`materials[${material.id}]`" id="">
    </div>
</template>
<script>
export default {
    props: ['material']
}
</script>
<style scoped>

</style>