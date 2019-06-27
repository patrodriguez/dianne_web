@extends('layouts.home')

@section('title', 'Vendor Marketplace | DIANNE')

@section('content')
<div class="container-fluid padding" style="margin-top: 10%">
    <div class="row features text-left">
        <div class="sidenav">
            <h6>Vendor Categories</h6>
            <a href="/categories/bridalsalon">Bridal Salon</a>
            <a href="/categories/beautysalon">Beauty Salon</a>
            <a href="/categories/entertainment">Entertainment</a>
            <a href="/categories/jewelers">Jewelers</a>
            <a href="/categories/venue">Venue</a>
            <a href="/categories/photographers">Photographers</a>
            <a href="/categories/videographers">Videographers</a>
            <a href="/categories/officiants">Officiants</a>
            <a href="/categories/caterers">Caterers</a>
            <a href="/categories/barservices">Bar Service</a>
            <a href="/categories/florist">Florist</a>
            <a href="/categories/photobooths">Photobooths</a>
            <a href="/categories/decor">Decor</a>
            <a href="/categories/transportation">Transportation</a>
            <a href="/categories/invitations">Invitations</a>
            <a href="/categories/weddingfavors">Wedding Favors</a>
            <a href="/categories/weddingplanners">Wedding Planners</a>
            <a href="/categories/others">Others</a>
            <br>
            <h6>Price Range</h6>
            <select name="price">
                <option value="p">&#8369;</option>
                <option value="pp">&#8369;&#8369;</option>
                <option value="ppp">&#8369;&#8369;&#8369;</option>
            </select>
        </div>

        <div class="row">
            @foreach($items as $item)
            @if ($user->vendor_type == 'Wedding Favors')

            <div class="column">
                <div class="card">
                    <img src="storage/images/{{ $item->profile_picture }}" width="100" height="170" class="imgcenter img-responsive" alt="Dress">
                    <p class="vendorname">{{ $item->first_name }} {{ $item->last_name }}</p>
                    <p class="vendortype">{{ $item->vendor_type }}</p>

                    <p>
                        @if($item->price_range == 'Budget')
                        &#8369;
                        @elseif($item->price_range == 'Midrange')
                        &#8369;&#8369;
                        @elseif($item->price_range == 'Highend')
                        &#8369;&#8369;&#8369;
                        @endif
                    </p>

                    <p><a href="/view/profile/{{ $item->id }}" role="button" class="btn button_1">View Profile</a></p>
                </div><br>
            </div>
            @continue
            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection