<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'middle_name',
        'section_id',
        
    ] ; 
    protected $guarded = ['id']; 

    public function sections()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }
}