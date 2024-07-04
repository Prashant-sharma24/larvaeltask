<!-- resources/views/customers/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        <div class="row">
            <div class="md-10 text-end">

            </div>
        </div>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Customer Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name}}" required>
            </div>
            <div class="form-group">
                <label for="mobile_no">Mobile No.</label>
                <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ $customer->mobile_no}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $customer->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>


    </div>
    @endsection
