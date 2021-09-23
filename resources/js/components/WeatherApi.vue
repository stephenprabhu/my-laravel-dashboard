<script>
export default {
    data(){
        return{
            location_name:'Fetching...',
            current_temp:'Fetching...',
            current_weather:'Fetching...',
            weather_img_link:'test',
        }
    },
    mounted(){
        const myContext=this;
        $.ajax({url: "https://api.weatherapi.com/v1/current.json",
            data:{
                'key':'9f03045b610d42089d6144800212108',
                'q':'mangalore',
                'aqi':'no',
                'Access-Control-Allow-Origin':'*'
            },
            success: function(result){
                const locationObject=result.location;
                const currentObject=result.current;
                myContext.location_name=locationObject.name+', '+locationObject.country;
                myContext.current_temp=currentObject.temp_c;
                myContext.current_weather=currentObject.condition.text;
                myContext.weather_img_link=currentObject.condition.icon;
            }});
    }
}
</script>
<template>
    <div class="card" id="weather">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <h6 class= "simpleStyle1 mb-0 pb-0" v-text="current_weather"></h6>
                        <h4 class="font-weight-bolder mb-0 pb-0">{{ current_temp }}&deg;C</h4>
                        <span class=" simpleStyle1 text-blue-200 text-sm" v-text="location_name"></span>
                    </div>
                </div>
                <div class="col-4 mt-3 text-end">
                    <img :src="weather_img_link" width="50" height="50" />
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
