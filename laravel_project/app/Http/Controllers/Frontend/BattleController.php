<?php

namespace realEudoxos\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use realEudoxos\Http\Controllers\Controller;

use realEudoxos\University;
use realEudoxos\Limit;


class BattleController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function getBattle(){
    	$limit=$this->isALimit();
        if($limit){
            if($limit->active==1){
                $winner=$this->isWinner();
                if($winner){
                    return view('frontend.battle.battle')->with('winner',$winner);
                }
                $uni=University::all();
                return view('frontend.battle.battle',compact('uni','limit','winner'));
            }else{
                $winner=$this->isWinner();
                if($winner){
                    return view('frontend.battle.battle')->with('winner',$winner);
                }else{
                    $uni=null;
                    return view('frontend.battle.battle',compact('uni','limit','winner'));
                }                
            }      
        }else{
            return redirect()->route('battle')->with('status','Η Μάχη δεν έχει ξεκινήσει ακόμα');
        }
    }
    protected function isALimit(){
        $limit=Limit::first();
        return $limit;
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
