<?php

namespace App\Library;

use Carbon\Carbon;

class DateTimeFormatter{

    public function getDateTime(){
        $timevar=Carbon::now()->timezone('Asia/Kolkata');
        return collect([
            'current_time'=>$timevar->format('h:m a'),
            'date'=>$timevar->isoFormat('Do MMMM Y'),
            'weekday'=>$timevar->isoFormat('dddd'),
        ]);

    }
}
