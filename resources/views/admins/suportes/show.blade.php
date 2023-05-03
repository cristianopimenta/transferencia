<h1>Detalhe do  Chamado Nº.: {{$suporte->id}}</h1>

<hr>

<ul>
    <li>Assunto: {{$suporte->assunto}}</li>
    <li>Status: {{$suporte->status}}</li>
    <li>Conteudo: {{$suporte->conteudo}}</li>
    <li>Data Chamado: {{$suporte->created_at}}</li>

</ul>
<hr>
<form action="{{route('suportes.destroy', $suporte->id)}}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
<a href="{{route('suportes.index')}}">Voltar</a>