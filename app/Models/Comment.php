<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    protected $fillable = ['body','image','user_id','support_ticket_id'];
    public function user(){
       return  $this->belongsTo(User::class);
    }

    // Image Path Accessor

    public function getImagePathAttribute(){
        return Storage::disk('public')->url($this->image);
    }
}
