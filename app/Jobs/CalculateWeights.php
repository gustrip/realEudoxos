<?php

namespace realEudoxos\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use realEudoxos\University;

class CalculateWeights implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $timeout = 120;
    public $tries = 3;
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://10.0.2.2:8080/Eudoksos/API']);
        try{
            $headers=[
            'Content-Type'=>'application/json',
            'Accept'=>'application/json'
            ];
            $apireq = $client->request('GET','http://10.0.2.2:8080/Eudoksos/API/sums',$headers);
            if($apireq->getStatusCode()==200 && $apireq->getBody()!=null){
                $sums= json_decode($apireq->getBody());
                $total_students=0;
                foreach ($sums as $s) {
                    $total_students=$total_students+$s->numberOfStudents;
                }
                $alluni=University::all();
                if($alluni){
                    foreach ($alluni as $uni) {
                        $uni->weight=1-($uni->number_of_students/$total_students);
                        $uni->save();
                    }
                }
            }else{
                return redirect()->route('admin.dashboard')->with('status','Problem with calculating weights(eudoksos response).Try again!!!');
            }


        }catch(\GuzzleHttp\Exception\ClientException $e) {
            return redirect()->route('admin.dashboard')->with('status','Problem with calculating weights(eudoksos connection).Try again!!!');
        }
    }
}
