@extends('app.layout')
@section('title', 'BlockWise - Transfer Funds')
@section('content')
    <div id="Service" class="container-xxl">
        <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="wallet-box bg-light text-center p-4 rounded shadow-sm">
                <h2 class="mb-1">
                    <img src="{{ asset('img/wallet.png') }}" width="40" height="40"> Transfer Funds
                </h2>
                <p class="text-info">Send cryptocurrency from one user to another</p>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-start mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show text-start mt-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('wallet.transfer') }}" method="POST" class="mt-4 text-start">
                    @csrf

{{--                    <div class="mb-3">--}}
{{--                        <label for="sender_id" class="form-label">Sender</label>--}}
{{--                        <select name="sender_id" id="sender_id" class="form-select" required>--}}
{{--                            <option value="">Select sender</option>--}}
{{--                            @foreach($users as $user)--}}
{{--                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label class="form-label">Sender</label>
                        <input type="hidden" name="sender_id" value="{{ auth()->id() }}">
                        <input type="text" class="form-control" value="{{ auth()->user()->name }} ({{ auth()->user()->email }})" disabled>
                    </div>


                    <div class="mb-3">
                        <label for="receiver_id" class="form-label">Receiver</label>
                        <select name="receiver_id" id="receiver_id" class="form-select" required>
                            <option value="">Select receiver</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="currency_id" class="form-label">Currency</label>
                        <select name="currency_id" id="currency_id" class="form-select" required>
                            <option value="">Select currency</option>
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ strtoupper($currency->symbol) }} - {{ $currency->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" step="0.00000001" min="0.00000001" class="form-control" placeholder="Enter amount to transfer" required>
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn exchange-btn text-white w-100">Submit Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
