@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Device</h1>
        <div class="row">
            <div class="md-10 text-end">

            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('devices.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="device_id">Device ID</label>
                <input type="text" class="form-control" id="device_id" name="device_id" pattern="[0-9]+" title="Please enter only numeric values" required>
            </div>
            <div class="form-group">
                <label for="name">Device Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Device</button>
        </form>

        <h2 class="mt-5">Devices List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Device ID</th>
                    <th>Device Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $device->device_id }}</td>
                    <td>{{ $device->name }}</td>
                    <td>
                        <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
