<script>
export default {
    data(){
        return{
            topNewsHeadlines:[]
        }
    },
    mounted(){
        const myContext=this;
        $.ajax({url: "https://newsapi.org/v2/top-headlines",
            data:{
                'sources':'bbc-news',
                'apiKey':'9e042d32f93a46c6b3660eb8fe6dce37',
            },
            success: function(result){
                const articlesArray=result.articles;
                for(let i=0;i<5;i++){
                    const currentItem=articlesArray[i];
                    myContext.topNewsHeadlines.push({
                        headline:currentItem.title,
                        link:currentItem.url,
                        description:currentItem.description,
                        urlToImage:currentItem.urlToImage
                    });
                }
            }});
    }
}
</script>
<template>
    <div class="card card-tasks">
        <div class="card-header ">
            <h6 class="title d-inline">News Headlines(5)</h6>
            <p class="card-category d-inline">today</p>
            <div class="dropdown">
                <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                    <i class="tim-icons icon-settings-gear-63"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#pablo">Action</a>
                    <a class="dropdown-item" href="#pablo">Another action</a>
                    <a class="dropdown-item" href="#pablo">Something else</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-full-width table-responsive">
                <table class="table">
                    <tbody>
                    <tr v-for="newsItem in topNewsHeadlines">
                        <td>
                            <a :href="newsItem.link">
                                <p class="title">{{newsItem.headline}}</p>
                                <p class="text-muted" v-text="newsItem.description"></p>
                            </a>
                        </td>
                        <td class="td-actions text-right">
                            <img class="border-radius-sm" width="140px" height="90px" :src="newsItem.urlToImage" alt="News Image"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
