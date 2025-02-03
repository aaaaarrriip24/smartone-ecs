<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="{{ url('/') }}"
            class="nav-item nav-link {{ url()->current()==url('/') ? 'active' : '' }}">  {{ trans('Beranda') }} </a>
        <a href="{{ url('about') }}"
            class="nav-item nav-link {{ url()->current()==url('about') ? 'active' : '' }}">{{ __("Tentang") }}</a>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link {{ url()->current()==url('our-konsultasi') || url()->current()==url('our-inquiries') || url()->current()==url('our-bm') || url()->current()==url('our-panduan') || url()->current()==url('other-service') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __("Layanan") }}
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('our-konsultasi') }}">{{  __("Konsultasi Ekspor") }}</a>
                <a class="dropdown-item" href="{{ url('our-inquiries') }}">{{  __("Penyebaran Inquiry") }}</a>
                <a class="dropdown-item" href="{{ url('our-bm') }}">{{  __("Bussiness Matching") }}</a>
                <a class="dropdown-item" href="{{ url('our-panduan') }}">{{  __("Pendampingan InaExport") }}</a>
                <a class="dropdown-item" href="{{ url('other-service') }}">{{  __("Layanan Lainnya") }}</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link {{ url()->current()==url('our-supplier') || url()->current()==url('our-market') || url()->current()==url('other-relasi') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __("Rekan") }}
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('our-supplier') }}">{{ __("Pemasok") }}</a>
                <a class="dropdown-item" href="{{ url('our-market') }}">{{ __("Pasar") }}</a>
                <a class="dropdown-item" href="{{ url('other-relasi') }}">{{ __("Relasi Lain") }}</a>
            </div>
        </li>

        <a href="{{ url('news') }}" class="nav-item nav-link {{ url()->current()==url('news') ? 'active' : '' }}">{{ __("Kegiatan") }}</a>
        <a href="{{ url('dashboard') }}"
            class="nav-item nav-link {{ url()->current()==url('dashboard') ? 'active' : '' }}">{{ __("Informasi") }}</a>
        <a href="{{ url('contact') }}"
            class="nav-item nav-link {{ url()->current()==url('contact') ? 'active' : '' }}">{{ __("Kontak") }}</a>

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
                @if( empty(session('locale')) )
                <img src="{{ asset('assets/images/negara/en.png') }}" width="25px">
                @else
                <img src="{{ asset('assets/images/negara/id.png') }}" width="25px">
                @endif
                @endswitch
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('change.language', 'en') }} "><img
                        src="{{ asset('assets/images/negara/en.png') }}" width="25px"> English</a>
                <a class="dropdown-item" href="{{ route('change.language', 'id') }}"><img
                        src="{{ asset('assets/images/negara/id.png') }}" width="25px"> Indonesia</a>
            </div>
        </li>

        <a href="https://www.instagram.com/exportcenter_sby/" class="nav-item nav-link"><i
                class="fab fa-instagram fa-lg"></i></a>
    </div>

</div>