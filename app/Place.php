<?php

namespace App;

use App\User as User;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['id'];

    protected $appends = ['date_human'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateHumanAttribute()
    {
        return $this->created_at->diffForHumans() . ' ( ' . date('d M Y', strtotime($this->created_at)) . ' )';
    }
}
