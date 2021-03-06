<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageModel extends Model
{
    use HasFactory;
    protected $table = 'storages';
    protected $primaryKey = 'id';
    protected $fillable = ['storage_id', 'id_type', 'invoice', 'model_number', 'tank_number', 'mile', 'price', 'down', 'finance', 'interest', 'discount', 'status', 'expire_date', 'book', 'img', 'transcript', 'date'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
