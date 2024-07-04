@extends('layouts.app')
<style>
    /* Optional: Custom CSS for select dropdown */
    .form-group select[multiple] {
        height: auto !important; /* Ensures dropdown height adjusts based on content */
        min-height: 100px; /* Adjust as needed for your layout */
        max-height: 200px; /* Adjust as needed for your layout */
        overflow-y: auto; /* Enables vertical scrolling if options exceed max-height */
    }
</style>

@section('content')
    <div class="container">
        <h1>Assign Devices to Customer</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('assign.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Select Customer</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="device_ids">Select Devices (multiple)</label>
                <select multiple class="form-control" id="device_ids" name="device_ids[]" required>
                    @foreach($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->device_id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Devices</button>
        </form>

        <h2 class="mt-5">Assigned Devices</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Customer Name</th>
                    <th>Device IDs</th>
                    <th>Device Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    @if($customer->devices->isNotEmpty())
                        @foreach($customer->devices as $device)
                            <tr>
                                <td>{{ $loop->parent->index + 1 }}</td> <!-- Parent loop's index for Sr. No. -->
                                <td>{{ $customer->name }}</td>
                                <td>{{ $device->device_id }}</td>
                                <td>{{ $device->name }}</td>
                                <td>
                                    <a href="{{ route('assign.edit', ['customer' => $customer->id, 'device' => $device->id]) }}" class="btn btn-primary">Edit Assignment</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
