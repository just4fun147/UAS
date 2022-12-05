<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Pesawat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'from_id',
        'to_id',
        'kelas',
        'jadwal_keberangkatan',
        'jam_keberangkatan',
        'jadwal_tiba',
        'jam_tiba'
    ];
    public function getCreatedAttribute(){
        if(!is_null($this->attributes['created_at'])){
            return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
        }
    }
    
    public function getUpdateAtAttribute(){
        if(!is_null($this->attributes['update_at'])){
            return Carbon::parse($this->attributes['update_at'])->format('Y-m-d H:i:s');
        }
    }
}
