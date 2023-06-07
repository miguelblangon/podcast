<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Podcast extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='podcast';
  
/**
 * The attributes that are mass assignable.
 *  
 * @var array
 */
protected $fillable = [
    'name', 
    'detail',
    'podcasts_url',
    'caratula_url'
];
protected $guarded=['users_id'];

public function autor(){
    return $this->belongsTo(User::class,'users_id','id' );
}




}
