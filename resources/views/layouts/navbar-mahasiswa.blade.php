<div class="col-lg order-lg-first">
    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
        <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                <i class="fe fe-home"></i> Beranda
            </a>
        </li>
        <li class="nav-item dropdown">
            <a href="javascript:void(0)"
                class="nav-link {{ request()->is('dashboard-user/isi-survey') || request()->is('dashboard-user/hasil-survey') ? 'active' : '' }}"
                data-toggle="dropdown">
                <i class="fe fe-calendar"></i> Survey
            </a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ url('/dashboard-user/isi-survey') }}"
                    class="dropdown-item {{ request()->is('dashboard-user/isi-survey') ? 'active' : '' }}">Isi
                    Survey</a>
                <a href="{{ url('/dashboard-user/hasil-survey') }}"
                    class="dropdown-item {{ request()->is('dashboard-user/hasil-survey') ? 'active' : '' }}">Hasil
                    Survey</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="javascript:void(0)"
                class="nav-link
                {{ request()->is('dashboard-user/tugas-belum-dikerjakan') || request()->is('dashboard-user/tugas-selesai') || request()->is('dashboard-user/nilai-tugas') ? 'active' : '' }}"
                data-toggle="dropdown">
                <i class="fe fe-file"></i> Tugas
            </a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ url('/dashboard-user/tugas-belum-dikerjakan') }}"
                    class="dropdown-item {{ request()->is('dashboard-user/tugas-belum-dikerjakan') ? 'active' : '' }}">Tugas
                    Belum Dikerjakan</a>
                <a href="{{ url('/dashboard-user/tugas-selesai') }}"
                    class="dropdown-item {{ request()->is('dashboard-user/tugas-selesai') ? 'active' : '' }}">Tugas
                    Selesai</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ url('/dashboard-user/materi') }}"
                class="nav-link {{ request()->is('dashboard-user/materi') ? 'active' : '' }}">
                <i class="fe fe-book-open"></i> Materi
            </a>
        </li>

        <li class="nav-item dropdown">
            <a href="javascript:void(0)"
                class="nav-link
                {{ request()->is('dashboard-user/quiz-belum-dikerjakan') || request()->is('dashboard-user/quiz-selesai') || request()->is('dashboard-user/nilai-tugas') ? 'active' : '' }}"
                data-toggle="dropdown">
                <i class="fe fe-file"></i> Quiz
            </a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ url('/dashboard-user/quiz-belum-dikerjakan') }}"
                    class="dropdown-item {{ request()->is('dashboard-user/quiz-belum-dikerjakan') ? 'active' : '' }}">Quiz
                    Belum Dikerjakan</a>
                <a href="{{ url('/dashboard-user/quiz-selesai') }}"
                    class="dropdown-item {{ request()->is('dashboard-user/quiz-selesai') ? 'active' : '' }}">Quiz
                    Selesai</a>
            </div>
        </li>

    </ul>
</div>
