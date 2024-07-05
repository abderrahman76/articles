<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','user_id'];

    public function articles(){
        return $this->hasMany(Article::class);
         }

    public function user(){
       return $this->belongsTo(User::class);
        }
}
