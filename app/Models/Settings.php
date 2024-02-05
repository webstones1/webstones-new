<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [
        'logoTagLine',
        'logoLink',
        'copyRightText',
        'description',
        'contactInfo',
        'emailId',
        'facebookInfo',
        'twitterInfo',
        'linkedInInfo',
        'instagramInfo',
        'youtubeInfo',
        'image',
        'is_enabled',
        'is_deleted',
    ];
}
