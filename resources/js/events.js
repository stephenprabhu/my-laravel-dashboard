import Vue from 'vue';

Vue.component('entry-card',require('./components/JournalEntryCard.vue').default);

new Vue({
    el:'#journal',
    data:{
        entries:[],
    },
    mounted() {
        const state=this;
        $.ajax({url: "http://127.0.0.1:8000/events/all",
            success: function(result){
                result.forEach(function (entry){
                    state.entries.push(entry);
                });
            }});
    }
});
