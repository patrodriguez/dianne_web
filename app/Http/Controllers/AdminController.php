<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Vendor;
use App\Notifications\VendorApproved;
use App\Notifications\VendorRejected;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function vendors()
    {
        $vendors = Vendor::whereNull('approved_at')
            ->get();

        return view('admin.vendors', compact('vendors'));
    }

    public function approve($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->update(['approved_at' => now()]);

        if ($vendor) {
            $vendor->notify(new VendorApproved($vendor));
        }

        return redirect()->route('admin.vendors.index')->withMessage('Vendor has been approved successfully.');
    }

    public function reject($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        if ($vendor) {
            $vendor->notify(new VendorRejected($vendor));
        }

        return redirect()->route('admin.bookings.index')->withMessage('Vendor has been rejected.');
    }

    public function view_stw($id)
    {
        $profile = User::find($id);

        return view('admin.view-stw')->with(['profile' => $profile]);
    }

    public function view_vendor($id)
    {
        $profile = Vendor::find($id);

        return view('admin.view-vendor')->with(['profile' => $profile]);
    }

    public function stw_reports()
    {
        $reports = DB::table('report_soon_to_weds')
            ->select('report_soon_to_weds.*', 'soon_to_weds.bride_first_name', 'soon_to_weds.bride_last_name', 'soon_to_weds.groom_first_name',
                'soon_to_weds.groom_last_name', 'vendors.first_name', 'vendors.last_name')
            ->join('soon_to_weds', 'soon_to_weds.id', '=', 'report_soon_to_weds.soon_to_wed_id')
            ->join('vendors', 'vendors.id', '=', 'report_soon_to_weds.vendor_id')
            ->get();

        return view('admin.stw-reports')->with(['reports' => $reports]);
    }

    public function vendor_reports()
    {
        $reports = DB::table('report_vendors')
            ->select('report_vendors.*', 'soon_to_weds.bride_first_name', 'soon_to_weds.bride_last_name', 'soon_to_weds.groom_first_name',
                'soon_to_weds.groom_last_name', 'vendors.first_name', 'vendors.last_name')
            ->join('soon_to_weds', 'soon_to_weds.id', '=', 'report_vendors.soon_to_wed_id')
            ->join('vendors', 'vendors.id', '=', 'report_vendors.vendor_id')
            ->get();

        return view('admin.vendor-reports')->with(['reports' => $reports]);
    }
}
