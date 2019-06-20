@extends('layouts.home')

@section('title', 'Add Item | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Add Item</h3>
            <hr>
                <form method="POST">
                 @csrf

                    <div class="form-group">
                        <label for="budget_item">Item Name</label>
                        <input class="form-control" type="text" id="budget_item" name="budget_item" placeholder="Eg. Wedding Dress" required>
                    </div>

                    <div class="form-group">
                        <label for="vendor_name">Vendor</label>
                        <select class="form-control" name="vendor_id" required>
                            @foreach($vendor as $vendors)
                                <option value="{{ $vendors->id }}">{{ $vendors->first_name }} {{ $vendors->last_name }}</option>
                            @endforeach
                        </select>
                        <small>*If the vendor you intend to pay is not listed above, please make sure they are saved to your list of vendors.</small>
                    </div>

                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input class="form-control" type="number" id="cost" name="cost" placeholder="Estimated cost or actual cost" required>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="paid">Paid</label>
                        <input class="form-check-input" style="margin-left: 10px" type="checkbox" id="paid" name="is_paid"/>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <br><textarea class="form-control" id="notes" name="notes" placeholder="Ex. Pay extra for alterations..." rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/budget-tracker" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn button_1">Add Item</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection