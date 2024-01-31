<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'user_id',
        'body'];


        //To get the user to display in the post table
        public function user(){


            return $this->belongsTo('App\Models\User');
        }


        //
        public function photo(){

            return $this->belongsTo('App\Models\Photo');
        }


        public function catogory(){

            return $this->belongsTo('App\Models\Category');
        }





}



