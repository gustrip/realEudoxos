<?php

namespace realEudoxos\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use realEudoxos\Student;

class UpdateStudentEudoxos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    public $timeout = 120;
    public $tries = 3;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $st_id=$this->data['st_id'];
        unset($this->data['st_id']);
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://10.0.2.2:8080/Eudoksos/API']);
        $response = $client->request('POST', '10.0.2.2:8080/Eudoksos/API/students/update/student/', 
                ['json' => $this->data]);
        if($response->getStatusCode()==200){
            $st_updated=json_decode($response->getBody());
            $st=Student::find($st_id);
            if($st){
                $st->points=$st->{'points'};
                $st->save();
            }
        }
                 
    }
}
