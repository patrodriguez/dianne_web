@extends('layouts.index')

@section('title', 'RSVP | DIANNE')

@section('content')
<section class="main">
    <div class="container">
        <div class="row justify-content-center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <br>
            <i>You have been cordially invited by {{ $couple->bride_first_name }} {{ $couple->bride_last_name }} &
                {{ $couple->groom_first_name }} {{ $couple->groom_last_name }} to their wedding on
                {{ \Carbon\Carbon::parse($couple->wedding_date)->format('d F Y')}}.</i>
            <br>
            <form method="POST">
                @csrf

                <div class="form-group row">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" maxlength="30" required class="form-control">
                </div>

                <div class="form-group row">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" maxlength="30" required>
                </div>

                <div class="form-group row">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group row">
                    <label for="meal_type">Meal Type</label>
                    <select class="form-control" name="meal_type" required>
                        @foreach($meal as $meals)
                            <option value="{{ $meals->meal_type }}">{{ $meals->meal_type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="plus_one">Plus One</label>
                    <input class="form-check-input" style="margin-left: 10px" type="checkbox" id="plus_one" name="plus_one"/>
                </div>

                <div class="form-group row">
                    <label for="allergy">Please note down any possible allergies.</label>
                    <input type="text" id="allergy" name="allergy" class="form-control">
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="is_attending">Attending?</label>
                    <input class="form-check-input" style="margin-left: 10px" type="checkbox" id="is_attending" name="is_attending"/>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="button_1" value="Submit">RSVP</button>
                    </div>
                    <div class="col-sm">
                        <button type="reset" class="button_1" value="Reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
