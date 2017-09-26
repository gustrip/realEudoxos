<?php

namespace realEudoxos\Listeners;

use realEudoxos\Events\OrderDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use realEudoxos\University;
use realEudoxos\Student;
use realEudoxos\Limit;

class AddPointToUnivercity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderDone  $event
     * @return void
     */
    public function handle(OrderDone $event)
    {   
        
        $data=$event->data;
        $uni=University::find($data['uni_id']);
        $uni->total_points=$uni->total_points+$data['points_used'];
        $limit=Limit::first();
        if($limit){
            if(100*($uni->total_points*$uni->weight)/$limit->limit>=100){
                $uni->won=1;
                $limit->active=0;
                $limit->save();
            }
        }
        
        $uni->save();
    }
}
