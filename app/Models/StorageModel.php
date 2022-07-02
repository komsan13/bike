<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageModel extends Model
{
    use HasFactory;
    protected $table = 'detail';
    protected $primaryKey = 'id';
    protected $fillable = ['storage_id','id_type','model_number','tank_number','price','down','finance','interest','discount','status',
    'accessories01','accessories02','accessories03','accessories04','accessories05','accessories06','accessories07','expire_date','book','img','transcript'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
