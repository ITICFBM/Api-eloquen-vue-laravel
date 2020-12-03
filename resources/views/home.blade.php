@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Datos Información</div>
                    <!-- Se manda a llamar el componente de  materias -->
                    <materias>
                    </materias>
                    
                </div>
            </div>
        </div>
        
    </div>

</div>
@endsection

