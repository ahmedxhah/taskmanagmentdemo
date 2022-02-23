<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','employer_id','employee_id','completed','feedback'
    ];

    public function assign_to()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}
