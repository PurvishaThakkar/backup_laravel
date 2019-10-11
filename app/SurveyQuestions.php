<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestions extends Model
{
    public $table = "product_stocks";
    
    public $fillable = ['q_type', 'ques', 'subpart'];
}
