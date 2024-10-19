<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="{{ url('/') }}"
            class="nav-item nav-link active">{{ session('locale') == 'id' ? 'Beranda' : 'Home' }}</a>
        <a href="{{ url('about') }}"
            class="nav-item nav-link">{{ session('locale') == 'id' ? 'Tentang ECS' : 'About ECS' }}</a>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ session('locale') == 'id' ? 'Layanan Kami' : 'Our Services' }}
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('our-konsultasi') }}">{{ session('locale') == 'id' ? 'Konsultasi Ekspor' : 'Export Consultation' }}</a>
                <a class="dropdown-item" href="{{ url('our-inquiries') }}">{{ session('locale') == 'id' ? 'Penyebaran Inquiry' : 'Inquiry Dissemination' }}</a>
                <a class="dropdown-item" href="{{ url('our-bm') }}">{{ session('locale') == 'id' ? 'Bussiness Matching' : 'Business Matching' }}</a>
                <a class="dropdown-item" href="{{ url('our-panduan') }}">{{ session('locale') == 'id' ? 'Pendampingan InaExport' : 'InaExport Mentoring' }}</a>
                <a class="dropdown-item" href="{{ url('other-service') }}">{{ session('locale') == 'id' ? 'Layanan Lainnya' : 'Other Services' }}</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ session('locale') == 'id' ? 'Rekan Kami' : 'Our Partner' }}
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('our-supplier') }}">{{ session('locale') == 'id' ? 'Pemasok' : 'Suppliers' }}</a>
                <a class="dropdown-item" href="{{ url('our-market') }}">{{ session('locale') == 'id' ? 'Pasar' : 'Market' }}</a>
                <a class="dropdown-item" href="{{ url('other-relasi') }}">{{ session('locale') == 'id' ? 'Relasi Lain' : 'Other Relations' }}</a>
            </div>
        </li>

        <a href="{{ url('news') }}" class="nav-item nav-link">{{ session('locale') == 'id' ? 'Kegiatan' : 'News' }}</a>
        <a href="{{ url('dashboard') }}"
            class="nav-item nav-link">{{ session('locale') == 'id' ? 'Sistem Informasi' : 'Information System' }}</a>
        <a href="{{ url('contact') }}"
            class="nav-item nav-link">{{ session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us' }}</a>

        @php $locale = session()->get('locale'); @endphp
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                @switch($locale)
                @case('en')
                <img src="{{ asset('assets/images/negara/en.png') }}" width="25px">
                @break
                @case('fr')
                <img src="{{ asset('assets/images/negara/id.png') }}" width="25px">
                @break
                @default
                <img src="{{ asset('assets/images/negara/id.png') }}" width="25px">
                @endswitch
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('change-language', ['locale' => 'en']) }}"><img
                        src="{{ asset('assets/images/negara/en.png') }}" width="25px"> English</a>
                <a class="dropdown-item" href="{{ route('change-language', ['locale' => 'id']) }}"><img
                        src="{{ asset('assets/images/negara/id.png') }}" width="25px"> Indonesia</a>
            </div>
        </li>

        <a href="https://www.instagram.com/exportcenter_sby/" class="nav-item nav-link"><i
                class="fab fa-instagram fa-lg"></i></a>

        @if(Auth::check())
        <a class="nav-item nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle"
                data-key="t-logout"><i class="fas fa-sign-out-alt"></i></span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @else
        <a href="{{ route('login') }}" class="nav-item nav-link"><i class="fas fa-sign-in-alt"></i></a>
        @endif

        <a href="#" class="nav-item nav-link"><i class="fas fa-users"></i></a>

    </div>

</div>
