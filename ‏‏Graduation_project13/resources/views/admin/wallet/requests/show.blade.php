@extends('app.layout')

@section('title', 'تفاصيل طلب الشحن #'.$request->id)

@section('content')
    <div class="container">
        <a href="{{ route('admin.wallet.requests.index') }}" class="btn btn-link mb-3">← رجوع للقائمة</a>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>طلب شحن #{{ $request->id }}</strong>
                        <small class="text-muted">{{ $request->created_at->format('Y-m-d H:i') }}</small>
                    </div>
                    <div class="card-body">
                        <p><strong>المستخدم:</strong> {{ $request->user->name ?? $request->user->email }}</p>
                        <p><strong>البريد الإلكتروني:</strong> {{ $request->user->email ?? '—' }}</p>
                        <p><strong>العملة:</strong> {{ $request->walletCurrency->currency->symbol ?? '—' }}</p>
                        <p><strong>المبلغ المطلوب:</strong> {{ $request->amount }}</p>
                        <p><strong>الحالة:</strong>
                            @if($request->status === 'pending') <span class="badge bg-warning text-dark">قيد الانتظار</span>
                            @elseif($request->status === 'approved') <span class="badge bg-success">موافق</span>
                            @else <span class="badge bg-danger">مرفوض</span> @endif
                        </p>

                        @if($request->reference)
                            <p><strong>مرجع الدفع:</strong> {{ $request->reference }}</p>
                        @endif

                        @if($request->receipt_path)
                            <p>
                                <strong>الإيصال:</strong>
                                <a target="_blank" href="{{ asset('storage/'.$request->receipt_path) }}">عرض / تنزيل الإيصال</a>
                            </p>
                        @endif

                        @if($request->admin_note)
                            <div class="mt-3">
                                <strong>ملاحظة المدير:</strong>
                                <div class="border p-2 bg-light">{{ $request->admin_note }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Transaction history if any -->
                <div class="card">
                    <div class="card-header"><strong>سجل العمليات المرتبطة</strong></div>
                    <div class="card-body">
                        @php $transactions = $request->transactions ?? $request->relatedTransactions ?? []; @endphp

                        @if($transactions && count($transactions))
                            <ul class="list-group">
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
                        @else
                            <div class="text-muted">لا توجد معاملات مرتبطة حتى الآن.</div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header"><strong>أجراءات</strong></div>
                    <div class="card-body">
                        @if($request->status === 'pending')
                            <form action="{{ route('admin.wallet.requests.approve', $request) }}" method="POST" class="mb-2">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label">ملاحظة للمستخدم (اختياري)</label>
                                    <textarea name="admin_note" class="form-control" rows="3" placeholder="ملاحظة عند الموافقة"></textarea>
                                </div>
                                <button class="btn btn-success w-100" onclick="return confirm('تأكيد الموافقة على الطلب؟')">موافقة</button>
                            </form>

                            <form action="{{ route('admin.wallet.requests.reject', $request) }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label">سبب الرفض (اختياري)</label>
                                    <textarea name="admin_note" class="form-control" rows="3" placeholder="مثلاً: إيصال غير واضح"></textarea>
                                </div>
                                <button class="btn btn-danger w-100" onclick="return confirm('تأكيد رفض الطلب؟')">رفض</button>
                            </form>
                        @else
                            <div class="mb-2">
                                <strong>المعالج بواسطة:</strong>
                                <div>{{ $request->approver->name ?? '—' }} <div class="text-muted" style="font-size:0.9em;">{{ optional($request->updated_at)->format('Y-m-d H:i') }}</div></div>
                            </div>
                            <a href="{{ route('admin.wallet.requests.index') }}" class="btn btn-outline-secondary w-100">رجوع للقائمة</a>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><strong>معلومات إضافية</strong></div>
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
