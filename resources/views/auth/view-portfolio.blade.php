@extends('layouts.dashboard')

@section('title', 'Vendor Portfolio | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="card col-lg-12 text-center">
                        <br>
                        @if(!$portfolios->isEmpty())
                            @foreach($portfolios as $portfolio)
                                <p>{!! $portfolio->vendor_portfolio !!}</p>
                            @endforeach
                        @else
                            You have not created a couple page yet.
                            <a class="btn button_1" role="button" href="#">Back</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection