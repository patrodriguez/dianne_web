@extends('layouts.dashboard')

@section('title', 'Couple Page | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Couple Page</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-12">
                        <br>
                        @if(!$pages->isEmpty())
                            @foreach($pages as $page)
                                <p>{!! $page->couple_page !!}</p>
                                <a class="btn button_1 float-right" role="button" href="/couple-page/{{ Auth::id() }}/edit">Edit Page</a>
                            @endforeach
                        @else
                            You have not created a couple page yet.
                            <a class="btn button_1" role="button" href="/couple-page/{{ Auth::id() }}/create">Create Page</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection