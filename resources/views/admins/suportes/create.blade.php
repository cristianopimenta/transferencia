<h1>Novo Suporte</h1>

<x-alert/>

<form action="{{ route('suportes.store') }}" method="POST">

@include('admins.suportes.partials.form')

</form>
<a href="{{ route('suportes.index') }}">Voltar</a>
