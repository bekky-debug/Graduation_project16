@extends('app.layout')

@section('title', 'طلبات شحن المحفظة - لوحة المدير')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3> Wallet charging requests </h3>
            <form method="GET" class="row gx-2 gy-1 align-items-center" style="max-width:800px;">
                <div class="col-auto">
                    <input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="بحث باسم المستخدم أو الإيميل">
                </div>
                <div class="col-auto">
                    <select name="status" class="form-select">
                        <option value="">كل الحالات</option>
                        <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>مقبول</option>
                        <option value="rejected" {{ request('status')=='rejected' ? 'selected' : '' }}>مرفوض</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="text" name="currency" value="{{ request('currency') }}" class="form-control" placeholder="رمز العملة (BTC...)">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary">فلتر</button>
                </div>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>المستخدم</th>
                    <th>العملة / المحفظة</th>
                    <th>المبلغ</th>
                    <th>الحالة</th>
                    <th>التاريخ</th>
                    <th class="text-end">إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($requests as $req)
                    <tr>
                        <td>{{ $req->id }}</td>
                        <td>
                            <div><strong>{{ $req->user->name ?? '—' }}</strong></div>
                            <div class="text-muted" style="font-size:0.9em;">{{ $req->user->email ?? '' }}</div>
                        </td>
                        <td>
                            {{ $req->walletCurrency->currency->symbol ?? '—' }}
                            <div class="text-muted" style="font-size:0.85em;">
                                wallet_id: {{ $req->walletCurrency->wallet_id ?? '—' }}
                            </div>
                        </td>
                        <td>{{ $req->amount }}</td>
                        <td>
                            @if($req->status === 'pending')
                                <span class="badge bg-warning text-dark">قيد الانتظار</span>
                            @elseif($req->status === 'approved')
                                <span class="badge bg-success">موافَق</span>
                            @else
                                <span class="badge bg-danger">مرفوض</span>
                            @endif
                        </td>
                        <td>{{ $req->created_at->format('Y-m-d H:i') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.wallet.requests.show', $req) }}" class="btn btn-sm btn-outline-primary">عرض</a>

                            <!-- approve form -->
                            @if($req->status === 'pending')
                                <form action="{{ route('admin.wallet.requests.approve', $req) }}" method="POST" class="d-inline-block" onsubmit="return confirm('تأكيد الموافقة على الطلب #{{ $req->id }}؟');">
                                    @csrf
                                    <button class="btn btn-sm btn-success">موافقة</button>
                                </form>

                                <form action="{{ route('admin.wallet.requests.reject', $req) }}" method="POST" class="d-inline-block" onsubmit="return confirm('تأكيد الرفض على الطلب #{{ $req->id }}؟');">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">رفض</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">لا توجد طلبات لعرضها.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $requests->links() }}
        </div>
    </div>
@endsection
