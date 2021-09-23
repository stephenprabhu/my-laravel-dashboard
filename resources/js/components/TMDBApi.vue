<script>
export default {
    data(){
        return{
            popularMedia:[],
            allMedia:[]
        }
    },
    methods:{
        changeMedia: function (event){
            if (event) {
                const buttonId=event.currentTarget.id;
               if(buttonId==0){
                   this.getAllMedia();
               }else if(buttonId==1){
                   this.getOnlyMovies();
               }else if(buttonId==2){
                   this.getOnlyShows()
               }else {
                   alert('does not match')
               }
            }else{
                alert('no event')
            }
        },
        getAllMedia(){
            this.popularMedia=[]
            let count=0;
            this.allMedia.every(currentItem=>{
                if(count>4){
                    return false;
                }
                this.pushDataToArray(currentItem)
                count+=1;
                return true;
            })
        },
        getOnlyMovies(){
            this.popularMedia=[]
            let count=0;
            this.allMedia.every(currentItem=>{
                if(count>4){
                    return false;
                }
                if(currentItem.media_type==="movie"){
                    this.pushDataToArray(currentItem)
                    count+=1;
                }
                return true;
            })
        },
        getOnlyShows(){
            this.popularMedia=[]
            let count=0;
            this.allMedia.every(currentItem=>{
                if(count>4){
                    return false;
                }
                if(currentItem.media_type==="tv"){
                    this.pushDataToArray(currentItem)
                    count+=1;
                }
                return true;
            })
        },
        pushDataToArray(mediaItem){
            let mediaTitle;
            if(mediaItem.name!=null){
                mediaTitle=mediaItem.name
            }else if(mediaItem.title!=null){
                mediaTitle=mediaItem.title
            }else{
                mediaTitle=mediaItem.original_name
            }
            this.popularMedia.push({
                title:mediaTitle,
                overview:mediaItem.overview,
                media_type:mediaItem.media_type,
                poster_path:'https://image.tmdb.org/t/p/w200'+mediaItem.poster_path
            });
        }
    },
    mounted(){
        const myContext=this;
        $.ajax({url: "https://api.themoviedb.org/3/trending/all/day",
            data:{
                'api_key':'ac138a9526a6bd770c0e1200057e1416',
            },
            success: function(result){
                myContext.allMedia=result.results;
                myContext.getAllMedia()
            }});
    }
}
</script>

<template>
    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <h5 class="card-category">Today</h5>
                    <h2 class="card-title">Trending Entertainment</h2>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                        <button v-on:click="changeMedia"  class="btn btn-sm btn-primary btn-simple active" id="0">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">All</span>
                        </button>
                        <button v-on:click="changeMedia"  class="btn btn-sm btn-primary btn-simple" id="1">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Movies</span>
                        </button>
                        <button v-on:click="changeMedia" class="btn btn-sm btn-primary btn-simple" id="2">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">TV Shows</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
              <div v-for="mediaItem in popularMedia" class="col">
                  <div class="text-center">
                      <img class="border-radius-sm" width="100px" :src="mediaItem.poster_path" alt="movie poster"/>
                  </div>
                  <h4 class="text-center" style="margin-top: 3%;margin-bottom:1%" v-text="mediaItem.title"></h4>
                  <p class="text-sm text-muted" v-text="mediaItem.overview"></p>
              </div>
          </div>
        </div>
    </div>
</template>

<style>
.card{
    border-radius: 1.3rem;
}
</style>
