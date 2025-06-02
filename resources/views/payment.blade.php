@extends('master')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8 space-y-6">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="rounded-md bg-green-50 p-4">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Header --}}
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Secure Payment</h2>
            <p class="mt-2 text-gray-600">Please enter your card details below</p>
            <p class="mt-2 text-xl font-bold text-gray-900">
                Amount: ${{ number_format($amount ?? 29, 2) }}
            </p>
        </div>

        {{-- Form --}}
        <form id="payment-form" action="{{ route('payment.process') }}" method="POST" class="space-y-6">
            @csrf

            <input type="hidden" name="amount" value="{{ $amount ?? 0 }}">

            {{-- Name on Card --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Name on Card</label>
                <input
                    type="text"
                    name="cardholder_name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Jane Doe"
                    required
                >
            </div>

            {{-- Card Number --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Card Number</label>
                <input
                    type="text"
                    name="card_number"
                    maxlength="16"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="1234 5678 9012 3456"
                    required
                >
            </div>

            {{-- Expiry Date --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Expiry Date (MM/YY)</label>
                <input
                    type="text"
                    name="expiry_date"
                    maxlength="5"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="12/24"
                    required
                >
            </div>

            {{-- CVC --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">CVC</label>
                <input
                    type="text"
                    name="cvc"
                    maxlength="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="123"
                    required
                >
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Pay ${{ number_format($amount ?? 29, 2) }}
            </button>

        </form>
    </div>
</div>
@endsection
