@csrf()
<input type="text" placeholder="Assunto" name="assunto" value="{{$suporte->assunto ?? old('assunto') }}">
<textarea name="conteudo" id="" cols="30" rows="5" placeholder="Descricao">{{$suporte->descricao ?? old('descricao') }}</textarea>
<button type="submit">Enviar</button>