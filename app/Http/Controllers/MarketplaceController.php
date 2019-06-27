<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function bridalsalon()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Bridal Salon')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function beautysalon()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Beauty Salon')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function jewelers()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Jeweler')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function venue()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Venue')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function photographers()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Photographer')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function videographers()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Videographer')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function officiants()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Officiant')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function caterers()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'caterer')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function barservices()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Bar Service')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function florist()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Florist')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function photobooths()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Photobooth')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function decor()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Decor')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function transportation()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Transportation')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function invitations()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Invitation')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function weddingfavors()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Wedding Favors')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function weddingplanners()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Wedding Planner')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }

    public function others()
    {
        $items = DB::table('vendors')
            ->select(['id', 'company_name', 'profile_picture', 'price_range', 'first_name', 'last_name', 'vendor_type',
                'profile_picture'])
            ->where('vendor_type', 'Others')
            ->whereNotNull('approved_at')
            ->get();

        return view('marketplace')->with('items', $items);
    }
}
