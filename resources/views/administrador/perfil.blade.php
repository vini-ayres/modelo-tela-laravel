@extends('dashboard.administrador')

@section('content')

<h2>{{ ordem-> cd_solicitacao }}</h2>

    <p> Aqui há uma página de perfil do {{ {{ $ordem->cd_solicitacao }}  }}</p>

@endsection