<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' // temp
    ];
    
    protected $dates = ['published_at'];


    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }
    
    public function scopeUnpublished($query) {
        $query->where('published_at', '>', Carbon::now());
    }
    
    // setFieldNameAttribute
    public function setPublishedAtAttribute($date) {
        //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);// Setting time for midnight
    }
    
    public function getPublishedAtAttribute($date) {
        //return new Carbon($date);
        //return (new Carbon($date))->format('Y-m-d');
        return Carbon::parse($date)->format('Y-m-d');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    public function getTagListAttribute() {
        return $this->tags->lists('id')->toArray();
    }
}
