@extends('layouts.dashboard')

@section('title', 'Leave Feedback | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Leave Feedback</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-6 text-center">
                        <form method="POST">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label for="value" class="control-label">Value for Money</label>
                                <p>Rating of your perceived satisfaction when taking into consideration
                                 the money you spent on their product or service.</p>
                                <input id="value" name="value" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>

                            <div class="form-group">
                                <label for="promptness" class="control-label">Promptness</label>
                                <p>Rating of the ability of this vendor to cater to a customer's needs without delay,
                                 while delivering high quality service.</p>
                                <input id="promptness" name="promptness" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>

                            <div class="form-group">
                                <label for="quality" class="control-label">Quality of Product or Service</label>
                                <p>Rating the quality of the product or service delivered by this vendor.</p>
                                <input id="quality" name="quality" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>

                            <div class="form-group">
                                <label for="professionalism" class="control-label">Professionalism</label>
                                <p>Rating the competency of the vendor with their service, as well as their attitude
                                 towards you as a customer.</p>
                                <input id="professionalism" name="professionalism" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>

                            <div class="form-group">
                                <label for="overall">Overall rating</label>
                                <p>The overall rating you would give this vendor, taking into consideration the above
                                 qualities, as well as other factors.</p>
                                <input id="overall" name="overall" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                            </div>

                            <div class="form-group">
                                <a class="btn button_1" role="button" href="/dashboard">Back</a>
                                <button type="submit" class="btn button_1">Submit Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection