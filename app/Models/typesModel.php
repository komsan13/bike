<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typesModel extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = ['type','model','created_at','updated_at'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
