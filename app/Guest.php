<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use Notifiable;

    protected $table = 'guests';

    protected $fillable = [
        'first_name', 'last_name', 'allergy', 'plus_one', 'status', 'is_attending'
    ];

    public function soon_to_weds_guest()
    {
        return $this->belongsTo('App\User');
    }

    public function guests()
    {
        return $this->belongsToMany('App\User', 'guests', 'meal_type_id',
            'soon_to_wed_id')->withPivot('first_name', 'last_name', 'email', 'allergy',
            'plus_one', 'is_attending')
            ->withTimestamps();
    }
}
