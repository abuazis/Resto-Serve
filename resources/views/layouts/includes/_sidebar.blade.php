<div class="sidebar bg-salmon shadow">
    <div class="row">
        <a href="{{ url('/') }}" class="d-inline-block mx-auto mt-2">
            <img src="{{asset('img/logo-admin.png')}}" width="60" alt="">
        </a>
    </div>
    @if(Auth::user()->id_level == '1')
        <div class="row mt-3 pt-2">
            <a href="{{ url('/menu') }}" class="d-inline-block mx-auto mt-3">
                <img src="{{asset('img/menu-bar.png')}}" width="45" alt="">
            </a>
        </div>
    @endif
    @if(Auth::user()->id_level == '1' OR Auth::user()->id_level == '2')
        <div class="row mt-3">
            <a href="{{ url('/order') }}" class="d-inline-block mx-auto mt-3">
                <img src="{{asset('img/order-bar.png')}}" width="49" alt="">
            </a>
        </div>
    @endif
    @if(Auth::user()->id_level == '1' OR Auth::user()->id_level == '3')
        <div class="row mt-3">
            <a href="{{ url('/transaksi/order') }}" class="d-inline-block mx-auto mt-3">
                <img src="{{asset('img/transaction-bar.png')}}" width="52" alt="">
            </a>
        </div>
    @endif
    @if(Auth::user()->id_level == '1' OR Auth::user()->id_level == '2' OR Auth::user()->id_level == '3' OR Auth::user()->id_level == '4')
        <div class="row mt-3">
            <a href="{{ url('/laporan') }}" class="d-inline-block mx-auto mt-3 pt-1">
                <img src="{{asset('img/report-bar.png')}}" width="55" alt="">
            </a>
        </div>
    @endif
    @if(Auth::user()->id_level != '4')
        <div class="row mt-2">
            <a href="{{ url('/logout') }}" class="d-inline-block mx-auto mt-4 pt-1 text-decoration-none btn-logout">
                <i class="fas fa-tools fa-2x text-white text-center d-inline-block ml-1"></i><br>
                <span class="font-default text-white" style="font-size: 10px;">SETTING</span>
            </a>
        </div>
    @endif
    <div class="row mt-3 pt-0">
        <a href="{{ url('/logout') }}" class="d-inline-block mx-auto mt-4 pt-1 text-decoration-none btn-logout">
            <i class="fas fa-sign-out-alt fa-2x text-white text-center d-inline-block ml-2"></i><br>
            <span class="font-default text-white" style="font-size: 10px;">LOGOUT</span>
        </a>
    </div>
</div>
