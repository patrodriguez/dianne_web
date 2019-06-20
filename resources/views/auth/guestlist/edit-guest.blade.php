@extends('layouts.home')

@section('title', 'Edit Guest | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Edit Guest Details</h3>
            <hr>
                <form method="POST">
                 @csrf

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" id="first_name" name="first_name"
                               value="{{ $guest->first_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="text" id="last_name" name="last_name"
                               value="{{ $guest->last_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="meal_type_id">Meal Type</label>
                        <select class="form-control" name="meal_type_id" required>
                            @foreach($meal as $meals)
                                <option value="{{ $meals->id }}">{{ $meals->meal_type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="allergy">Allergy</label>
                        <input class="form-control" type="text" id="allergy" name="allergy"
                               value="{{ $guest->allergy }}">
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="plus_one">Plus One</label>
                        <input class="form-check-input" style="margin-left: 10px" type="checkbox" id="plus_one" name="plus_one" @if(old('plus_one')) checked @endif/>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" required>
                            <option>Invite Not Sent</option>
                            <option>Pending</option>
                            <option>Attending</option>
                            <option>Declined</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/guestlist" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn button_1">Save Details</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection