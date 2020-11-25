@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <materias-index inline-template>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Materia</th>
                            <th>Operaciones</th>
                            </thead>
                            <body>
                            <tr v-for="materia in materias">
                                <td v-text="materia.id"></td>
                                <td v-text="materia.nombre"></td>
                                <td><button>Edit</button></td>
                                </tr>
                            </body>

                    </materias-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection