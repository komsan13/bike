<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accessoriesModel extends Model
{
    use HasFactory;
    protected $table = 'accessories';
    protected $primaryKey = 'id';
    protected $fillable = ['invoice', 'pipe', 'hand', 'glass', 'acc_keys', 'rear', 'shield', 'seat', 'other'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamp = false;
}
