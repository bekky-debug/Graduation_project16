@extends('app.layout')

@section('title', 'BlockWise - Wallet Top-up')

@section('content')
    <div class="container py-5">
        <div class="wallet-box bg-light text-center p-4 rounded shadow-sm">
            <h2 class="mb-1">
                <img src="{{ asset('img/wallet.png') }}" width="40" height="40"> Wallet Top-up
            </h2>
            <p class="text-info">Add funds to your cryptocurrency wallet</p>

            <form action="{{ route('wallet.requests.store') }}" method="POST" class="mt-4">
                @csrf

                <div class="mb-3 text-start">
                    <label for="currency" class="form-label">Select Currency</label>
                    <select name="currency_id" id="currency" class="form-control">
                        @foreach($currencies as $currency)
                            <option value="{{ $currency->id }}">{{ strtoupper($currency->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 text-start">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.0001" min="0" placeholder="Enter amount to top up">
                </div>

                <button type="submit" class="btn exchange-btn text-white w-100">Submit Request</button>
            </form>
        </div>
    </div>
@endsection
