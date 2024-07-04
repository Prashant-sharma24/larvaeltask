<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|unique:devices',
            'name' => 'required',
        ]);

        Device::create($request->all());
        return redirect()->route('devices.index')->with('success', 'Device updated successfully');
    }

    public function index()
    {
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }

    public function edit(Device $device){
        return view('devices.edit', compact('device'));
    }

    public function update(Request $request, Device $device)
    {
        $request->validate([
            'device_id' => 'required|numeric|unique:devices,device_id,' . $device->id,
            'name' => 'required',
        ], [
            'device_id.numeric' => 'Device ID must be numeric.',
            'device_id.unique' => 'Device ID already exists.',
        ]);

        $device->update($request->all());
        return redirect()->route('devices.index')->with('success', 'Device updated successfully');
    }
}

