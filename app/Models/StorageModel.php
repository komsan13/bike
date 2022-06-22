<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageModel extends Model
{
    use HasFactory;
    protected $table = 'detail';
    protected $primaryKey = 'id';
    protected $fillable = ['id_type','license','bike_serial','tank_serial','price'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
