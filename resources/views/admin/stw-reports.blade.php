@extends('layouts.admindash')

@section('title', 'User Reports | DIANNE')

@section('content')
    <div class="container" style="margin-top: 5%">
        <div class="row col-lg-offset-3">
            <div class="col-lg-12">
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
                             <th>Soon-to-weds</th>
                             <th>Status</th>
                             <th>Time of Report</th>
                             <th></th>
                             <th></th>
                        </tr>
                        @forelse ($reports as $report)
                            <tr>
                                <td>{{ $report->first_name }} {{ $report->last_name }}</td>
                                <td>{{ $report->bride_first_name }} {{ $report->bride_last_name }} & {{ $report->groom_first_name }} {{ $report->groom_last_name }}</td>
                                <td>{{ $report->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d F Y g:i A')}}</td>
                                <td><a href="#" class="btn btn-custom btn-sm" data-toggle="modal" data-target="#stw_details">Details</a></td>
                                <td><a href="#" class="btn btn-primary btn-sm">Edit</a></td>
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
        </div>
    </div>

    <!-- Modal -->
    @if(!$reports->isEmpty())
        <div class="modal fade" id="stw_details" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                            <p><b>Users:</b> {{ $report->bride_first_name }} {{ $report->bride_last_name }}
                                & {{ $report->groom_first_name }} {{ $report->groom_last_name }}
                            </p>
                            <br>
                            <p><b>Reported by:</b> {{ $report->first_name }} {{ $report->last_name }}</p>
                            <p><b>Subject:</b> {{ $report->subject }}</p>
                            <p><b>Report Type: </b>{{ $report->report_type }}</p>
                            <p><b>Details: </b> {{ $report->report }}</p>
                            <p><b>Status:</b> {{ $report->status }}</p>
                            <p><b>Report submitted at:</b> {{ \Carbon\Carbon::parse($report->created_at)->format('d m Y g:i A')}}</p>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-custom" role="button" href="/view/soon-to-wed/{{ $report->id }}">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection