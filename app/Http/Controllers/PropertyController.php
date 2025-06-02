<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        // Location filter
        if ($request->has('location') && $request->location != '') {
            $query->where('city', $request->location);
        }

        // Property type filter
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        // Price range filter
        if ($request->has('price_range') && $request->price_range != '') {
            $range = explode('-', $request->price_range);
            $query->whereBetween('price', [$range[0], $range[1]]);
        }

        // Bedrooms filter
        if ($request->has('bedrooms') && $request->bedrooms != '') {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        $properties = $query->paginate(9);
        return view('properties', compact('properties'));
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'nullable|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|numeric',
            'type' => 'required|string',
            'status' => 'required|string',
            'furnished' => 'boolean',
            'year_built' => 'nullable|integer',
            'amenities' => 'nullable|string',
            'image' => 'nullable|string',
            'broker_name' => 'nullable|string',
            'broker_phone' => 'nullable|string',
            'broker_email' => 'nullable|email',
        ]);

        Property::create($validated);

        return redirect()->route('properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'city' => 'required|string',
            'neighborhood' => 'nullable|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|numeric',
            'type' => 'required|string',
            'status' => 'required|string',
            'furnished' => 'boolean',
            'year_built' => 'nullable|integer',
            'amenities' => 'nullable|string',
            'image' => 'nullable|string',
            'broker_name' => 'nullable|string',
            'broker_phone' => 'nullable|string',
            'broker_email' => 'nullable|email',
        ]);

        $property->update($validated);

        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }
} 