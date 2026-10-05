
@extends('site.master')
@section('content')

    <form action="{{ url('/produto/cadastrar/5') }}" method="get">
        {{-- Proteção contra ataques CSRF --}}

        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" required>
        </div>
        <br><br>
        <div>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto">
        </div>
        <br><br>
        <div>
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" placeholder="0.00">
        </div>
        <br><br>
        <div>
            <label for="categoria_id">Categoria</label>
            <input type="text" name="categoria_id" id="categoria_id" placeholder="Digite a categoria">
        </div>

        <button type="submit">Cadastrar Produto</button>

    </form>

@endsection
