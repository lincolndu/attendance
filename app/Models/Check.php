<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Check extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'check_in', 'check_out', 'check_time','user_id'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
