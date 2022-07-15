<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\survey;
use App\Models\Ask;
use Illuminate\Http\Request;

class surveyController extends Controller
{
        public function index()
        {
            $surveys = survey::all();
            return view('survey.index',['surveys' =>$surveys]);
        }

        public function create()
        {
            return view('survey.create');
        }
        
        public function store(Request $request)
        {

           
           $id = survey::create($request->all())->id;
                foreach($request->answer as $answer){
                Ask::create(['survey_id' => $id,'questions' => $answer,'votes' => 0]);
              
                }
                return redirect()->route('survey-index');

           
        }

       
        public function show($id)
        {
            $surveys = survey::where('id',$id)->first();
        
            $asks = $surveys->questions()->get();
               return view('survey.preview',['asks' =>$asks,'surveys' => $surveys]);

        
        }
        
}
