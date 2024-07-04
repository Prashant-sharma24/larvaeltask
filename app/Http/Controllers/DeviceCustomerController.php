<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Device;

class DeviceCustomerController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        $devices = Device::whereDoesntHave('customers')->get(); // Devices not assigned to any customer
        return view('assign.create', compact('customers', 'devices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'device_ids' => 'required|array',
            'device_ids.*' => 'exists:devices,id', // Validate each device ID exists in devices table
        ]);

        $customer = Customer::findOrFail($request->customer_id);

        // Detach previously assigned devices (if needed)
        $customer->devices()->detach();

        // Attach the selected devices
        $customer->devices()->attach($request->device_ids);

        return redirect()->route('assign.create')->with('success', 'Devices assigned successfully');
    }

    public function edit(Customer $customer)
    {
        $devices = Device::whereDoesntHave('customers')->get(); // Devices not assigned to any customer
        return view('assign.edit', compact('customer', 'devices'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'device_ids' => 'required|array',
            'device_ids.*' => 'exists:devices,id', // Validate each device ID exists in devices table
        ]);

        // Detach previously assigned devices (if needed)
        $customer->devices()->detach();

        // Attach the selected devices
        $customer->devices()->attach($request->device_ids);

        return redirect()->route('assign.edit', $customer->id)->with('success', 'Device assignment updated successfully');
    }
}
