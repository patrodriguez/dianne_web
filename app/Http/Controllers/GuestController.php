<?php

namespace App\Http\Controllers;

use App\Mail\GuestRsvp;
use DB;
use App\User;
use App\MealType;
use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $couple = User::find($id);

        $stw = $couple->where('id', $id)->first();

        //$meal_type = MealType::where('soon_to_wed_id', $id)->orderBy('meal_type')->pluck('meal_type', '');

        $data = [
            'bride_first_name' => $stw->bride_first_name,
            'bride_last_name' => $stw->bride_last_name,
            'groom_first_name' => $stw->groom_first_name,
            'groom_last_name' => $stw->groom_last_name,
            'email' => $stw->email,
        ];

        Mail::send(new GuestRsvp($request, $data), ['data' => $data]);

        //Mail::send(new GuestRsvp($request));

        return back()->withMessage('You have successfully responded to this invite.');
    }
}
