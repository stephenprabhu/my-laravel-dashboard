<script>
export default {
    data(){
        return{
            topDiscussions:[]
        }
    },
    mounted(){
        const myContext=this;
        $.ajax({url: "https://www.reddit.com/r/marvelstudios.json",
            success: function(result){
                const headlinesArray=result.data.children;
                for(let i=0;i<6;i++){
                    const currentItem=headlinesArray[i].data;
                    myContext.topDiscussions.push({
                        'headline':currentItem.title,
                        'link':"https://www.reddit.com" + currentItem.permalink
                    });
                }
            }});
    }
}
</script>

<template>
    <div class="card ">
        <div class="card-header">
            <img src="/assets/img/reddit.svg"  style="margin-right: 5px;margin-bottom: 10px;width: 94px;height: 34px;">
            <span class="card-title">/r/MarvelStudios</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter" id="">
                    <tbody>
                    <tr v-for="discussion in topDiscussions">
                        <td>
                            <a rel="noopener noreferrer"
                               target="_blank"
                               :href="discussion.link"
                            ><p class="title">{{discussion.headline}}</p>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
