@extends('layouts.dashboard')

@section('title', 'Edit Profile | DIANNE')

@section('content')
    <div class="row col-lg-offset-3">
        <div class="col-lg-12">
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <br>
                        <p class="card-category col-lg-5">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ $profile->first_name }}"/>
                        </p>

                        <p class="card-category col-lg-5">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ $profile->last_name }}"/>
                        </p>

                        <p class="card-category col-lg-5">
                            <label for="mobile">Mobile:</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                   placeholder="Mobile" value="{{ $profile->mobile }}"/></p>

                        <p class="card-category col-lg-5">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                   value="{{ $profile->city }}">
                        </p>

                        <p class="card-category col-lg-5">
                            <label for="price_range">Price Range:</label>
                            <select class="form-control" id="price_range" name="price_range" required>
                                <option>Budget</option>
                                <option>Midrange</option>
                                <option>Highend</option>
                            </select>
                        </p>

                        <div class="row">
                            <button type="submit" class="btn button_1" id="updateProfile">Save Profile</button>
                            <a class="btn button_1" role="button" href="/vendor/dashboard">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection