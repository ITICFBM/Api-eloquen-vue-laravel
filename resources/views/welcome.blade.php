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
                            <!--<th>URL</th>-->
                            </thead>
                            <body>
                                <tr v-for="pokemon in pokemons">
                                <td v-text="pokemon.nombre"></td>
                                <!--<td v-text="pokemon.url"></td>-->
                                </tr>
                            </body>

                    </post-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection