@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Device</h1>
        <div class="row">
            <div class="md-10 text-end">

            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('devices.update', $device->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="device_id">Device ID</label>
                <input type="text" class="form-control" id="device_id" name="device_id" value="{{ $device->device_id }}" required>
            </div>
            <div class="form-group">
                <label for="name">Device Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $device->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Device</button>
        </form>
    </div>
    @endsection
