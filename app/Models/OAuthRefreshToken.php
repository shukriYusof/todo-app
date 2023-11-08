<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OAuthRefreshToken extends Model
{
    use HasFactory;

    protected $table = 'oauth_refresh_tokens';

    public function scopeCurrentUser($query, $id)
    {
        $query->where('access_token_id', $id);
    }
}
