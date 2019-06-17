@extends('layouts.dashboard')

@section('title', 'Pay Vendor | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>Pay Vendor</h3>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                <?php Session::forget('success');?>
                @endif
                <hr/>
                <form method="POST" action="{!! URL::to('paypal') !!}">
                    @csrf

                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input class="form-control" type="number" min="0" max="9999999999.99" placeholder="0.00"/>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-lg button_1" href="#" role="button">Pay with Paypal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection