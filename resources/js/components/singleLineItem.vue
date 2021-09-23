<script>
export default {
    props:{
        title:String,
        startDate:String,
        endDate:String,
    },
    mounted() {
    }
}
</script>

<template>
    <span class="text-lg">{{title}}</span>
    <span class="text-bold">{{startDate}}</span>
    <span class="text-bold">{{endDate}}</span>
    <hr class="line-info"/>
</template>

<style>
.subText{
    font-family: 'Acme', sans-serif;
    color:lightseagreen;
}
</style>
