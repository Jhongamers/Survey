<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    
    protected $table = 'Survey';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'survey_start',
        'survey_end'
     ];

     public function questions()
     {
         return $this->hasMany(related: Ask::class);
        
     }
}
