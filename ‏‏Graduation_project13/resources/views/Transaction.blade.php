@extends('app.layout')
@section('title', 'BlockWise - transaction')
@section('content')
    <div id="Service" class="container-xxl ">
        <div class="container py-3  wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="wallet-box bg-light text-center ">
                    <h3 class="mb-3 fw-bold"><img src="{{asset('img/Transtion.png')}}" width="50" height="50"> Send Cryptocurrency</h3>
                    <p class="text-info mb-4">Send digital currencies securely and easily</p>
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Choose Currency -->
                        <div class="mb-3 text-start">
                            <label class="form-label">Choose Currency</label>
                            <select class="form-select mb-3" id="currency" name="currency">
                                <option selected value="BTC">BTC</option>
                                <option value="ETH">ETH</option>
                                <option value="USDT">USDT</option>
                            </select>
                        </div>

                        <!-- Wallet Address -->
                        <div class="mb-3 text-start">
                            <label class="form-label">Wallet Address</label>
                            <input type="text" class="form-control mb-3" name="wallet_address">
                        </div>
                        <!-- Amount -->
                        <div class="mb-3 text-start">
                            <label class="form-label">Amount</label>
                            <div class="amount-input mb-3">
                                <input type="number" class="form-control" id="amount" min="0" step="any" name="amount">
                                <div class="text-end"><span id="balance-text">your balance: 0.25 BTC</span></div>
                            </div>
                        </div>

                        <!-- Fee -->
                        <div class="mb-3 text-start">
                            <label class="form-label">Fee</label>
                            <input type="text" class="form-control mb-4" id="fee" name="fee">
                        </div>
                        <!-- Button -->
                        <button type="submit" class="btn exchange-btn text-white w-50">Send Now</button>
                    </form>
                    @if(session('success'))
                        <script>
                            alert('{{ session('success') }}');
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // أرصدة ثابتة
        const balances = {
            BTC: 0.25,
            ETH: 1.5,
            USDT: 500
        };

        // رسوم ثابتة
        const fixedFees = {
            BTC: "0.0005",
            ETH: "0.005",
            USDT: "3"
        };

        const currencySelect = document.getElementById("currency");
        const balanceText = document.getElementById("balance-text");
        const feeInput = document.getElementById("fee");
        const amountInput = document.getElementById("amount");

        function updateForm() {
            const selected = currencySelect.value;
            const balance = balances[selected];
            balanceText.textContent = "your balance: " + balance + " " + selected;
            feeInput.value = fixedFees[selected];
            amountInput.value = "";
        }

        // تحديث الرصيد بعد كتابة المبلغ
        function updateBalance() {
            const selected = currencySelect.value;
            const totalBalance = balances[selected];
            const amount = parseFloat(amountInput.value) || 0;
            const newBalance = totalBalance - amount;
            balanceText.textContent = "your balance: " + newBalance.toFixed(6) + " " + selected;
        }

        // أول تشغيل
        updateForm();

        // عند تغيير العملة
        currencySelect.addEventListener("change", updateForm);

        // عند إدخال المبلغ
        amountInput.addEventListener("input", updateBalance);
    </script>
    <script>
        document.getElementById("aboutLink").addEventListener("click", function(e) {
            // لو أنا على index.html بالفعل
            if (window.location.pathname.includes("index.html")) {
                e.preventDefault(); // منع فتح الدروب داون فقط
                document.getElementById("About").scrollIntoView({
                    behavior: "smooth"
                });
            }
            // لو أنا في صفحة ثانية
            else {
                window.location.href = "index.html#About";
            }
        });

        document.getElementById("currenciesLink").addEventListener("click", function(e) {
            // لو أنا على index.html بالفعل
            if (window.location.pathname.includes("index.html")) {
                e.preventDefault(); // منع فتح الدروب داون فقط
                document.getElementById("Currencies").scrollIntoView({
                    behavior: "smooth"
                });
            }
            // لو أنا في صفحة ثانية
            else {
                window.location.href = "index.html#Currencies";
            }
        });
    </script>
@endsection
