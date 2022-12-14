<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
        'description',
        'category_id',
        'advertiser_id',
        'start_date'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function advertiser(){
        return $this->belongsTo(Advertiser::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class , 'advertise_tags');
    }
}
