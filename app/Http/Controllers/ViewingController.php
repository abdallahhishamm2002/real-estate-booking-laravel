<?php

namespace App\Http\Controllers;

use App\Models\Viewing;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewingController extends Controller
{
    public function index()
    {
        $viewings = Viewing::with(['property', 'user'])
            ->where('user_id', Auth::id())
            ->orderBy('viewing_time', 'desc')
            ->get();

        return view('viewings.index', compact('viewings'));
    }

    public function reservation(Property $property)
    {
        \Log::info('Reservation method called for property: ' . $property->id);
        return view('viewings.reservation', compact('property'));
    }

    public function store(Request $request, Property $property)
    {
        try {
            $request->validate([
                'viewing_date' => 'required|date|after:today',
                'viewing_time' => 'required|date_format:H:i',
                'notes' => 'nullable|string|max:500'
            ]);

            \Log::info('Request data:', $request->all());

            $viewingTime = \Carbon\Carbon::createFromFormat(
                'Y-m-d H:i',
                $request->viewing_date . ' ' . $request->viewing_time
            );

            \Log::info('Formatted viewing time:', ['viewing_time' => $viewingTime]);

            $viewing = Viewing::create([
                'user_id' => Auth::id(),
                'property_id' => $property->id,
                'viewing_time' => $viewingTime,
                'notes' => $request->notes,
                'status' => 'pending'
            ]);

            \Log::info('Viewing created successfully:', ['viewing_id' => $viewing->id]);

            return redirect()->route('viewings.index')
                ->with('success', 'Viewing scheduled successfully!');
        } catch (\Exception $e) {
            \Log::error('Error creating viewing:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Failed to schedule viewing. Please try again.');
        }
    }

    public function destroy(Viewing $viewing)
    {
        if ($viewing->user_id !== Auth::id()) {
            abort(403);
        }

        $viewing->delete();

        return redirect()->route('viewings.index')
            ->with('success', 'Viewing cancelled successfully!');
    }
} 