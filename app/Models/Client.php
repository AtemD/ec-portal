<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // client has many contacts, therefore, a contact belongs to a client 
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    // client belongs to many platforms, therefore, platform belongs to many clients 
    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'client_has_platforms', 'client_id', 'platform_id');
    }

    // client has may sites, therefore, a site belongs to a client 
    public function sites()
    {
        return $this->hasMany(Site::class);
    }

}
