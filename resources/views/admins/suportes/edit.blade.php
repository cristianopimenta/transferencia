<h1>Editar Suporte Nº.: {{ $suporte->id }}</h1>

<x-alert/>

<form action="{{ route('suportes.update', $suporte->id) }}" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
    @csrf()
    @method('PUT')
@include('admins.suportes.partials.form', 'suporte'=> $suporte)

</form>
<a href="{{ route('suportes.index') }}">Voltar</a>
