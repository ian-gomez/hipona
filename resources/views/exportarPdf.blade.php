@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading"></div>

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{url('/pdfPersonas')}}" method="get" id="form_pdf">
                        <input type="text" name="filtrar" id="filtrar" placeholder="Filtrar">
                        <button name="exportar" value="Exportar">Exportar PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection