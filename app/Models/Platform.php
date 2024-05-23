<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
 
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_has_platforms', 'platform_id', 'client_id');
    }
}
