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

                    <post-component inline-template>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Operaciones</th>
                            </thead>
                            <body>
                                <tr v-for="pokemon in pokemons">
                                <td v-text="pokemon.nombre"></td>
                                <td>
                                <button data-target="#exampleModalCenter" title="Ver Materia" type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                <button type="button" class="btn btn-secondary"><i class="fas fa-pen"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                </tr>
                            </body>

                    </post-component>
                    
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection

