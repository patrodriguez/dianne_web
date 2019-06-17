<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function v_feedbacks()
    {
        return $this->belongsTo('App\Vendor');
    }
}
