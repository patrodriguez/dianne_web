<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function view_rsvp($id)
    {
        $couple = User::find($id);

        $meals = array('meal' => DB::table('meal_types')
            ->join('soon_to_weds', 'soon_to_weds.id', '=', 'meal_types.soon_to_wed_id')
            ->where('meal_types.soon_to_wed_id', $id)
            ->get());

        return view('rsvp', $meals)->with(['couple' => $couple]);
    }

    public function submit_rsvp(Request $request, $id)
    {
        /*$couple = User::find($id);

        $rsvp = new Guest();*/
        $rsvp = Guest::find($id);

        $rsvp->first_name = $request->first_name;
        $rsvp->last_name = $request->last_name;
        //$rsvp->email = $request->email;
        $rsvp->meal_type_id = $request->meal_type_id;
        $rsvp->plus_one = $request->input('plus_one')=='on' ? 1:0;
        $rsvp->allergy = $request->allergy;
        $rsvp->is_attending = $request->input('is_attending')=='on' ? 1:0;

        $rsvp->update(['first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'meal_type_id' => $request->meal_type_id,
            'plus_one' => $request->input('plus_one')=='on' ? 1:0,
            'allergy' => $request->allergy,
            'is_attending' => $request->input('is_attending')=='on' ? 1:0
            ]);
        //$couple->guests()->save($rsvp);
        return back()->withMessage('You have successfully responded to this invite.');
    }
}
