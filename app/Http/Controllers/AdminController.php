<?php

namespace realEudoxos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use realEudoxos\Book;
use realEudoxos\Limit;
use realEudoxos\University;

use realEudoxos\Jobs\CalculateWeights;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function startBattle(){
        $limit=$this->isALimit();
        if($limit){
            if($limit->active==0){
                $limit->active=1;
                $limit->save();
                $this->clearUniversitiesPoints();
                dispatch(new CalculateWeights());
                return redirect()->route('admin.dashboard')->with('status','The battle is started with limit '.$limit->limit);
            }
            return redirect()->route('admin.dashboard')->with('status','the battle is already running with limit '.$limit->limit);

        }else{
            $limit=Limit::FirstOrCreate(['limit'=>500,'active'=>1]);
            $this->clearUniversitiesPoints();
            dispatch(new CalculateWeights());
            return redirect()->route('admin.dashboard')->with('status','A new battle is started with default limit 500 ');
        }
    }
    public function showSetLimit(){
        return view('limit.setlimit');
    }
    public function setLimit(Request $request){
        $limit=$this->isALimit();
        if($limit){
            $limit->limit=$request->limit;
            $limit->save();
            return redirect()->route('admin.dashboard')->with('status','New limit is '.$limit->limit);
        }else{
            $limit=Limit::FirstOrCreate(['limit'=>$request->limit,'active'=>0]);
            return redirect()->route('admin.dashboard')->with('status','The limit is set to'.$limit->limit);
        }
        
    }

    public function updateWeights(){
        $this->calculateWeights();
        return redirect()->route('admin.dashboard')->with('status','Universities Weigths are updated');
    }

    public function restartBattle(){
        $limit=$this->isALimit();
        if($limit){
            if($limit->active==1){
                $this->clearUniversitiesPoints();
                return redirect()->route('admin.dashboard')->with('status','Battle is restarted');
            }else{
                return redirect()->route('admin.dashboard')->with('status','Battle is not running right now');
            }
            
        }else{
            return redirect()->route('admin.dashboard')->with('status','Battle is not running right now');
        }
    }
    public function stopBattle(){
        $limit=$this->isALimit();
        if($limit){
            $this->clearUniversitiesPoints();
            $limit->active=0;
            $limit->save();
            return redirect()->route('admin.dashboard')->with('status','Battle is stoped');
        }else{
            return redirect()->route('admin.dashboard')->with('status','Battle is not running right now');
        }
    }

    public function seeBattle(){
        $limit=$this->isALimit();
        if($limit){
            if($limit->active==1){
                $winner=$this->isWinner();
                if($winner){
                    return view('battle.battle')->with('winner',$winner);
                }
                $uni=University::all();
                return view('battle.battle',compact('uni','limit','winner'));
            }else{
                $winner=$this->isWinner();
                if($winner){
                    return view('battle.battle')->with('winner',$winner);
                }
                return redirect()->route('admin.dashboard')->with('status','Battle is not running right now');
            }      
        }else{
            return redirect()->route('admin.dashboard')->with('status','Battle is not running right now');
        }
    }

    protected function clearUniversitiesPoints(){
            $alluni=University::all();
            foreach($alluni as $uni){
                $uni->total_points=0;
                $uni->won=0;
                $uni->save();
            }
    }

    protected function isALimit(){
        $limit=Limit::first();
        return $limit;
    }

    protected function calculateWeights(){
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
    protected function isWinner(){
        $uni=University::all();
        $uni=$uni->sortByDesc('updated_at');
        $limit=$this->isALimit();
        if($uni){
            foreach ($uni as $u) {
                if(100*($u->total_points*$u->weight)/$limit->limit>=100){
                    return $u;
                }
            }
        }else{
            return null;
        }
        return null;
    }

}
