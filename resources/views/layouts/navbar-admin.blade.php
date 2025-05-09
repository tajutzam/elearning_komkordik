<div class="col-lg order-lg-first">
    <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ request()->is('/dashboard') ? 'active' : '' }}">
                <i class="fe fe-home"></i> Beranda
            </a>
        </li>

        <li class="nav-item dropdown">
            <a href="javascript:void(0)"
                class="nav-link {{ request()->is('mahasiswa*') || request()->is('materi*') || request()->is('tugas*') ? 'active' : '' }}"
                data-toggle="dropdown">
                <i class="fe fe-box"></i> Data
            </a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('mahasiswa.index', ['id' => 1]) }}"
                    class="dropdown-item {{ request()->is('mahasiswa*') ? 'active' : '' }}">Mahasiswa</a>
                <a href="{{ route('materi.index', ['id' => 1]) }}"
                    class="dropdown-item {{ request()->is('materi*') ? 'active' : '' }}">Materi</a>
                <a href="{{ route('tugas.index', ['id' => 1]) }}"
                    class="dropdown-item {{ request()->is('tugas*') ? 'active' : '' }}">Tugas</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="javascript:void(0)" class="nav-link {{ request()->is('survey*') ? 'active' : '' }}"
                data-toggle="dropdown">
                <i class="fe fe-calendar"></i> Survey
            </a>
            <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ url('/survey') }}"
                    class="dropdown-item {{ request()->is('survey/data') ? 'active' : '' }}">Data Survey</a>
            </div>
        </li>


        <li class="nav-item">
            <a href="/quiz" class="nav-link {{ request()->is('quiz') ? 'active' : '' }}">
                <i class="fe fe-activity"></i> Quiz
            </a>
        </li>


    </ul>
</div>
