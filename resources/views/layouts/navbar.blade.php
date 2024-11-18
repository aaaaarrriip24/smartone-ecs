<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="{{ url('/') }}"
            class="nav-item nav-link {{ url()->current()==url('/') ? 'active' : '' }}">{{ GoogleTranslate::trans("Beranda", app()->getLocale()) }}</a>
        <a href="{{ url('about') }}"
            class="nav-item nav-link {{ url()->current()==url('about') ? 'active' : '' }}">{{ GoogleTranslate::trans("Tentang", app()->getLocale()) }}</a>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link {{ url()->current()==url('our-konsultasi') || url()->current()==url('our-inquiries') || url()->current()==url('our-bm') || url()->current()==url('our-panduan') || url()->current()==url('other-service') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ GoogleTranslate::trans("Layanan", app()->getLocale()) }}
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
            <a id="navbarDropdown" class="nav-link {{ url()->current()==url('our-supplier') || url()->current()==url('our-market') || url()->current()==url('other-relasi') ? 'active' : '' }} dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ GoogleTranslate::trans("Rekan", app()->getLocale()) }}
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('our-supplier') }}">{{ GoogleTranslate::trans("Pemasok", app()->getLocale()) }}</a>
                <a class="dropdown-item" href="{{ url('our-market') }}">{{ GoogleTranslate::trans("Pasar", app()->getLocale()) }}</a>
                <a class="dropdown-item" href="{{ url('other-relasi') }}">{{ GoogleTranslate::trans("Relasi Lain", app()->getLocale()) }}</a>
            </div>
        </li>

        <a href="{{ url('news') }}" class="nav-item nav-link {{ url()->current()==url('news') ? 'active' : '' }}">{{ GoogleTranslate::trans("Kegiatan", app()->getLocale()) }}</a>
        <a href="{{ url('dashboard') }}"
            class="nav-item nav-link {{ url()->current()==url('dashboard') ? 'active' : '' }}">{{ GoogleTranslate::trans("Informasi", app()->getLocale()) }}</a>
        <a href="{{ url('contact') }}"
            class="nav-item nav-link {{ url()->current()==url('contact') ? 'active' : '' }}">{{ GoogleTranslate::trans("Kontak", app()->getLocale()) }}</a>

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
                <a class="dropdown-item" href="{{ route('change-language', ['locale' => 'en']) }}"><img
                        src="{{ asset('assets/images/negara/en.png') }}" width="25px"> English</a>
                <a class="dropdown-item" href="{{ route('change-language', ['locale' => 'id']) }}"><img
                        src="{{ asset('assets/images/negara/id.png') }}" width="25px"> Indonesia</a>
            </div>
        </li>

        <a href="https://www.instagram.com/exportcenter_sby/" class="nav-item nav-link"><i
                class="fab fa-instagram fa-lg"></i></a>
    </div>

</div>