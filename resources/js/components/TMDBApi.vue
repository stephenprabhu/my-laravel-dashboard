<script>
export default {
    data(){
        return{
            popularMedia:[]
        }
    },
    mounted(){
        const myContext=this;
        $.ajax({url: "https://api.themoviedb.org/3/trending/all/day",
            data:{
                'api_key':'ac138a9526a6bd770c0e1200057e1416',
            },
            success: function(result){
                const mediaArray=result.results;
               for(let i=0;i<5;i++){
                   const currentItem=mediaArray[i];
                   myContext.popularMedia.push({
                       title:currentItem.title,
                       overview:currentItem.overview,
                       media_type:currentItem.media_type,
                       poster_path:'https://image.tmdb.org/t/p/w200'+currentItem.poster_path
                   });
               }
            }});
    }
}
</script>
<template>
        <div class="card mt-3 mr-2 p-3">
            <div class="card-header">
              <b>Trending Entertainment</b>
            </div>
            <ul class="list-group list-group-flush pb-2">
                <li v-for="mediaItem in popularMedia" class="list-group-item">
                    <div class="row">
                        <div class="col-9">
                            <h6 v-text="mediaItem.title"></h6>
                            <p class="text-sm text-muted" v-text="mediaItem.overview"></p>
                        </div>
                        <div class="col-3 text-center">
                            <img class="border-radius-sm" width="100px" :src="mediaItem.poster_path" alt="movie poster"/>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</template>

<style>
.card{
    border-radius: 1.3rem;
}
</style>
