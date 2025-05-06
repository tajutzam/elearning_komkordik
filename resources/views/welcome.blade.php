@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Dashboard
            </h1>
        </div>
        <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            6%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">43</div>
                        <div class="text-muted mb-4">Mahasiswa</div>
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
                        <div class="h1 m-0">17</div>
                        <div class="text-muted mb-4">Quiz</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            9%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">7</div>
                        <div class="text-muted mb-4">Survey</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            3%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">27.3K</div>
                        <div class="text-muted mb-4">Admin</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
