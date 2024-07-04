@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Device Assignment</h1>
<div>

</div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('assign.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer Name</label>
                <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $customer->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="device_ids">Select Devices (multiple)</label>
                <select multiple class="form-control" id="device_ids" name="device_ids[]" required>
                    @foreach($devices as $device)
                        <option value="{{ $device->id }}" {{ $customer->devices->contains($device->id) ? 'selected' : '' }}>{{ $device->device_id }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Assignment</button>
        </form>
    </div>
    @endsection
