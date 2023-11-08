<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OAuthClients extends Model
{
    use HasFactory;

    protected $table = 'oauth_clients';

    public function scopeClient($query)
    {
        return $query->where('password_client', true);
    }
}
