<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = ['user_id', 'name', 'bio', 'age', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
