<?php

namespace App;

use App\User as User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Summon extends Model
{
    protected $dates = ['due_date'];

    protected $fillable = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::parse($value);
    }

    public function getDateHumanAttribute()
    {
        return $this->created_at->diffForHumans() . ' ( ' . date('d M Y', strtotime($this->created_at)) . ' )';
    }
}
