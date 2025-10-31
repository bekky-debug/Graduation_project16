@extends('app.layout')

@section('title', '  Currency order details '.$request->id)

@section('content')
    <div class="container">
        <a href="{{ route('admin.wallet.requests.index') }}" class="btn btn-link mb-3">← Back to list </a>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong> Request currency {{ $request->id }}</strong>
                        <small class="text-muted">{{ $request->created_at->format('Y-m-d H:i') }}</small>
                    </div>
                    <div class="card-body">
                        <p><strong>User :</strong> {{ $request->user->name ?? $request->user->email }}</p>
                        <p><strong> Email :</strong> {{ $request->user->email ?? '—' }}</p>
                        <p><strong>Currency :</strong> {{ $request->walletCurrency->currency->symbol ?? '—' }}</p>
                        <p><strong> Required amount :</strong> {{ $request->amount }}</p>
                        <p><strong>Status :</strong>
                            @if($request->status === 'pending') <span class="badge bg-warning text-dark"> On hold </span>
                            @elseif($request->status === 'approved') <span class="badge bg-success">Ok</span>
                            @else <span class="badge bg-danger">unacceptable</span> @endif
                        </p>

                        @if($request->reference)
                            <p><strong> Payment reference :</strong> {{ $request->reference }}</p>
                        @endif

                        @if($request->receipt_path)
                            <p>
                                <strong>The receipt :</strong>
                                <a target="_blank" href="{{ asset('storage/'.$request->receipt_path) }}"> Show</a>
                            </p>
                        @endif

                        @if($request->admin_note)
                            <div class="mt-3">
                                <strong> Director's notes :</strong>
                                <div class="border p-2 bg-light">{{ $request->admin_note }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Transaction history if any -->
                <div class="card">
                    <div class="card-header"><strong> Record associated transactions </strong></div>
                    <div class="card-body">
                        @if($transactions->count())
                            <ul class="list-group mb-3">
                                @foreach($transactions as $t)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div><strong>{{ strtoupper($t->type ?? '—') }}</strong> — {{ $t->amount }}</div>
                                            <div class="text-muted" style="font-size:0.85em;">{{ $t->created_at->format('Y-m-d H:i') }}</div>
                                        </div>
                                        <div class="text-end">
                                            <div>{{ $t->currency->symbol ?? '' }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- ✅ روابط الباجنيشن -->
                            <div class="d-flex justify-content-center">
                                {{ $transactions->links() }}
                            </div>
                        @else
                            <div class="text-muted">There are no transactions associated yet..</div>
                        @endif

                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header"><strong>procedures</strong></div>
                    <div class="card-body">
                        @if($request->status === 'pending')
                            <form action="{{ route('admin.wallet.requests.approve', $request) }}" method="POST" class="mb-2">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label"> User Note (Optional)</label>
                                    <textarea name="admin_note" class="form-control" rows="3" placeholder=" Note upon approval "></textarea>
                                </div>
                                <button class="btn btn-success w-100" onclick="return confirm('   Confirm approval of the request')">Ok</button>
                            </form>

                            <form action="{{ route('admin.wallet.requests.reject', $request) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label">  Reason for rejection (optional)</label>
                                    <textarea name="admin_note" class="form-control" rows="3" placeholder=":  Example: unclear receipt "></textarea>
                                </div>
                                <button class="btn btn-danger w-100" onclick="return confirm(' Confirm the request was rejected ')">unacceptable</button>
                            </form>
                        @else
                            <div class="mb-2">
                                <strong> Processed by:</strong>
                                <div>{{ $request->approver->name ?? '—' }} <div class="text-muted" style="font-size:0.9em;">{{ optional($request->updated_at)->format('Y-m-d H:i') }}</div></div>
                            </div>
                            <a href="{{ route('admin.wallet.requests.index') }}" class="btn btn-outline-secondary w-100"> Back to list</a>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><strong> Additional information</strong></div>
                    <div class="card-body">
                        <p><strong>WalletCurrency ID:</strong> {{ $request->wallet_currency_id }}</p>
                        <p><strong>Created at:</strong> {{ $request->created_at->diffForHumans() }}</p>
                        <p><strong>Request ID:</strong> #{{ $request->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
