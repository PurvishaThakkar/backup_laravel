<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyQuestions;
use App\question_types;

class SurveyAddMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMore()
    {
        $listing= question_types::get(['type_name']);
        $data['listing']=$listing;
        return view("questions.addMore",$data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMorePost(Request $request)
    {
        //print('hiiii')
        $request->validate([
            'addmore.*.q_type' => 'required',
            'addmore.*.ques' => 'required',
        ]);
         //print_r($request->addmore);
         //exit;
        foreach ($request->addmore as $key => $value) {
            SurveyQuestions::create($value);
        }
    
        return back()->with('success', 'Record Created Successfully.');
    }
}
