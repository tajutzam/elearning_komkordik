@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p class="text-muted">Selamat Datang {{ auth()->user()->name }} Di Dashboard E-Learning KOMKORDIK</p>
            </div>
        </div>
        <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            6%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">{{ $survey }}</div>
                        <div class="text-muted mb-4">Survey</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            -3%
                            <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">{{ $quizes }}</div>
                        <div class="text-muted mb-4">Quiz</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            -3%
                            <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">{{ $tugas }}</div>
                        <div class="text-muted mb-4">Tugas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
