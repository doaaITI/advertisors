<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiseTag extends Model
{
    use HasFactory;
    protected $table="advertise_tags";

    protected $fillable = [
        'tag_id',
        'advertise_id'
    ];
}
