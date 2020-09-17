<template>
    <div>
        <label :for="`types[${type.id}]`">{{type.name}}</label>
        <input type="checkbox" id="" :name="`types[${type.id}]`" :value="type.name">
    </div>
</template>
<script>
export default {
    props: ['type']
}
</script>