<h1>Listagem dos Suportes</h2>

    <a href="{{route('suportes.create')}}">Abrir Chamado</a>
    <hr>


<table>
    <thead>
<th>Assunto</th>
<th>Status</th>
<th>Descrição</th>
<th></th>
    </thead>
<tbody>
    @foreach ($suportes as $suporte )
        <tr>
            <td>{{$suporte['assunto']}}</td>
            <td>{{$suporte['status']}}</td>
            <td>{{$suporte['conteudo']}}</td>
            <td>
                <a href="{{route('suportes.show', $suporte['id'])}}">Detalhes</a> |
                <a href="{{route('suportes.edit', $suporte['id'])}}">Alterar</a>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

