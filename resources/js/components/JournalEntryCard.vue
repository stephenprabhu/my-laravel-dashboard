<script>
export default {
    props:{
        slug:String,
        title:String,
        date:String,
        snippet:String,
    },
}
</script>

<template>
    <div style="border-radius: 1rem" class="card p-2 m-1" >
        <!--first is odd -->
        <a class="card-block stretched-link text-decoration-none" :href="'/journal/entry/'+ slug">
            <h3 class="card-title pl-1 handwritten pb-0 display-6" v-text="title"></h3>
            <span  class="card-text subText">{{date}}</span>
            <p class="card-text text-muted pl-1" v-html="snippet">
                ......
            </p>
        </a>
    </div>
</template>

<style>
.subText{
    font-family: 'Acme', sans-serif;
    color:lightseagreen;
}
</style>
