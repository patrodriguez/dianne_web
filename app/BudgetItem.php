<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    protected $table = 'budget_items';

    protected $fillable = [
    'budget_item', 'cost', 'is_paid', 'notes'
];

    public function soon_to_weds_items()
    {
        return $this->belongsTo('App\User');
    }
}
