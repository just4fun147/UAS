<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class JPesawat extends Model
{
    use HasFactory;
    protected $fillable = [
        'pesawat_id',
        'from_id',
        'to_id',
        'jadwal',
        'jam'
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
