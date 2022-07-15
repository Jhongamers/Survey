<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ask;
use App\Models\Survey;
use App\Events\publicChannel;
use Illuminate\Http\Request;

class askController extends Controller
{
    
    public function update(Request $request, $id)
    {

    
       $ask = Ask::where('id',$request->id)->first();
   
         $votes = 1+$ask->votes;    
         broadcast(new publicChannel($request->id));
        $data = [
            'votes' => $votes,
         ];
       
        Ask::where('id',$request->id)->where('survey_id',$id)->update($data);
         return redirect()->route('survey-show',['id' => $id]);

          
    }
  


}
