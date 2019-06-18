@extends('layouts.admindash')

@section('title', 'Vendor Reports | DIANNE')

@section('content')
    <div class="container" style="margin-top: 5%">
        <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-danger">
                <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#new" data-toggle="tab">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#resolved" data-toggle="tab">Resolved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#history" data-toggle="tab">History</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body" style="margin-left: 1%">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="new">
                        <div class="card" style="padding: 5%;">
                            <div class="table-responsive">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <table class="table">
                                    <tr>
                                        <th>Reported By</th>
                                        <th>Vendors</th>
                                        <th>Status</th>
                                        <th>Time of Report</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    @forelse ($reports as $report)
                                        <tr>
                                            <td>{{ $report->bride_first_name }} {{ $report->bride_last_name }} & {{ $report->groom_first_name }} {{ $report->groom_last_name }}</td>
                                            <td>{{ $report->first_name }} {{ $report->last_name }}</td>
                                            <td>{{ $report->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d F Y g:i A')}}</td>
                                            <td><a href="#" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#vendor_details">Details</a></td>
                                            <td><a href="#" class="btn btn-primary btn-sm">Resolve</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No new reports have been submitted.</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="resolved">
                        <div class="card" style="padding: 5%;">
                            <div class="table-responsive">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <table class="table">
                                    <tr>
                                        <th>Reported By</th>
                                        <th>Vendors</th>
                                        <th>Status</th>
                                        <th>Time of Report</th>
                                        <th></th>
                                    </tr>
                                    @forelse ($reports as $report)
                                        @if($report->status == 'Resolved')
                                        <tr>
                                            <td>{{ $report->bride_first_name }} {{ $report->bride_last_name }} & {{ $report->groom_first_name }} {{ $report->groom_last_name }}</td>
                                            <td>{{ $report->first_name }} {{ $report->last_name }}</td>
                                            <td>{{ $report->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d F Y g:i A')}}</td>
                                            <td><a href="#" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#vendor_details">Details</a></td>
                                        </tr>
                                        @else
                                            <tr>
                                                <td>No reports have been resolved.</td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="4">No reports have been resolved.</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="history">
                        <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if(!$reports->isEmpty())
        <div class="modal fade" id="vendor_details" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="details">Report Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach($reports as $report)
                            <p><b>User:</b> {{ $report->first_name }} {{ $report->last_name }}</p>
                            <br>
                            <p><b>Reported by:</b> {{ $report->bride_first_name }} {{ $report->bride_last_name }}
                                & {{ $report->groom_first_name }} {{ $report->groom_last_name }}
                            </p>
                            <p><b>Subject:</b> {{ $report->subject }}</p>
                            <p><b>Report Type: </b>{{ $report->report_type }}</p>
                            <p><b>Details: </b> {{ $report->report }}</p>
                            <p><b>Status:</b> {{ $report->status }}</p>
                            <p><b>Report submitted at:</b> {{ \Carbon\Carbon::parse($report->created_at)->format('d m Y g:i A')}}</p>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-custom" role="button" href="/view/profile/{{ $report->id }}">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection