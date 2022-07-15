<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;

    protected $table = 'Ask';
    protected $primaryKey = 'id';
    protected $fillable = [
        'survey_id',
        'questions',
        'votes'
         ];

    public function survey()
    {
        return $this->belongsTo(related: survey::class);
    }
}
