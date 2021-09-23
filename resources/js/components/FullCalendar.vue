<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    props:{
        entries:[]
    },
    data() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin ],
                initialView: 'dayGridMonth',
                dateClick: this.handleDateClick,
                datesSet: this.handleMonthChange,
                currentDate:'',                         //At The Start Its Null. Then It contains the month title
                events: []
            },
        }
    },
    methods: {
        handleDateClick: function(arg) {
            this.calendarOptions.events.push({title:'event me',date:arg.dateStr});
            alert('date click! ' + arg.dateStr)
        },
        handleMonthChange: function (arg){
            //Handles The Month Changed Event
            if(this.currentDate==null){
                this.currentDate=arg.view.title;
            }else if(this.currentDate!==arg.view.title){
                this.currentDate=arg.view.title;
            }
        },

    },
    mounted() {

        let calEntries=this.entries;
       calEntries.forEach(function (entry){
           this.calendarOptions.events.push({
                   'title':entry.title,
                   'date':entry.created_date
               });
               console.log("After push",this.calendarOptions.events)
       })
        console.log('PROP: ',this.entries[0 ])
    }
}
</script>
<template>

    <FullCalendar :options="calendarOptions" />
</template>
