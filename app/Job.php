<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    public function checkApplication()
    {
        return \DB::table('job_user')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }
}
