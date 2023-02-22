<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\UserScore;

class apicontroller extends Controller
{
    
    
    public function LeaderBoard()
    {
        $topuserids = UserScore::orderby('score','desc')->limit(10)->get(['user_id'])->ToArray();//query to get top 10 scorers id's
        foreach ($topuserids as $index => $data) {
            $tmp[] = [$data['user_id']]; //array with top 10 user id's
        }
        $users = User::whereIn('user_id',$tmp)->select('name'); //query to select top 10 uers names from id's
        return response()->json([
            'message'=>'top 10 users',
            'users'=>$users
        ],200)
  }

  public function user_score(Request $request){
    $user_id=$request->id;
    $user_score=UserScore::where('user_id',$user_id)->select('score');
    foreach($user_score as $value)
    {
        $userscore[]=[$value->score]; //we are using -> here as the reult of query is in collection we haven;y converted it to array
    }


  }

  public function join_game(Reqest $request){
    $data=$request->all();//will ger gameid and userid as parametre
    foreach($data as $index as $subdata){
        $temp[]=[
            'id'=>$subdata->game_id,
            'user_id'=>$subdata->user_id
        ]
    }
    Game::insert($temp); //$temp has keys similar to that of column name in game table
                        //and values that we want to insert in game table

  return->response()->json([
    'messgae'=>'game joined'
  ],200)

  }

  
    
}