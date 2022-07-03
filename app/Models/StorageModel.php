<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageModel extends Model
{
    use HasFactory;
    protected $table = 'detail';
    protected $primaryKey = 'id';
    protected $fillable = ['storage_id','id_type','model_number','tank_number','mile','price','down','finance','interest','discount','status',
    'accessories_id','expire_date','book','img','transcript'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
