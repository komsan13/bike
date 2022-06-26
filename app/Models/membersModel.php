<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membersModel extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = ['name','phone','personal','created_at','updated_at'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
