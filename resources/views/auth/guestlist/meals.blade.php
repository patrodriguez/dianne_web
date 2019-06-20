@extends('layouts.dashboard')

@section('title', 'Meals | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>My Meals</h3>
                <div class="table-responsive">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <a href="/guestlist" role="button" class="btn button_1">Back</a>
                        <a class="btn button_1" role="button" href="/guestlist/{{ Auth::id() }}/meals/add">Add Meal</a>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Meal</th>
                            <th>Date Added</th>
                            <th></th>
                        </tr>
                        @forelse ($meals as $meal)
                            <tr>
                                <td>{{ $meal->meal_type }}</td>
                                <td>{{ \Carbon\Carbon::parse($meal->created_at)->format('d F Y h:m A')}}</td>
                                <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">You have not added any meals yet.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection