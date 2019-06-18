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
                <h3 style="text-align: center">Vendor Portfolio</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-12">
                        <br>
                        @if(!$portfolios->isEmpty())
                            @foreach($portfolios as $portfolio)
                                <p>{!! $portfolio->vendor_portfolio !!}</p>
                                <a class="btn button_1 float-right" role="button" href="/vendor/{{ auth()->guard('vendor')->user()->id }}/portfolio/edit">Edit Portfolio</a>
                            @endforeach
                        @else
                            You have not created your portfolio yet.
                            <a class="btn button_1" role="button" href="/vendor/{{ auth()->guard('vendor')->user()->id }}/portfolio/create">Create Portfolio</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection