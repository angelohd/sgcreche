@can('list_crianca')

    @extends('layout.index')
    @section('titulo', 'Crianças')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                {{-- <h5>Basic Data Tables example with responsive plugin</h5> --}}
                @can('add_crianca')
                    <a href="{{ route('alunos.create') }}" class="btn btn-primary">Registar criança</a>
                    / <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importe">
                        <i class="fa fa-edit"></i> Importar via xml
                    </button> /
                    <div class="modal inmodal" id="importe" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Importar apartie do fixheiro xml</h4>

                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('enviar') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" name="file" required class="control-form">
                                        </div>
                                        <button type="submit" class="btn btn-primary dim">exportar do excel</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('reciclagem_crianca')
                    <a href="{{ route('aluno.recilagem') }}" class="btn btn-dark">Reciclagem</a>
                @endcan
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo Doc.</th>
                                <th>Nº Doc.</th>
                                <th>Data Val.</th>
                                <th>Data Nasc.</th>
                                <th>Endereço</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alunos as $aluno)
                                <tr>
                                    <td>
                                        {{ $aluno->nome }}
                                    </td>
                                    <td>
                                        {{ $aluno->tipo_doc }}
                                    </td>
                                    <td>
                                        {{ $aluno->numero_doc }}
                                    </td>
                                    <td>
                                        {{ $aluno->data_validade }}
                                    </td>
                                    <td>
                                        {{ $aluno->data_nasc }}
                                    </td>
                                    <td>
                                        {{ $aluno->endereco }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                            data-target="#edit-{{ $aluno->id }}">
                                            <i class="fa fa-edit"></i> Opções
                                        </button>
                                        @can('delete_crianca')
                                            <button type="button" class="btn btn-danger dim" data-toggle="modal"
                                                data-target="#delete-{{ $aluno->id }}">
                                                <i class="fa fa-trash-o"></i> Remover
                                            </button>
                                        @endcan

                                    </td>


                                    <!-- remover aluno -->
                                    <div class="modal inmodal" id="delete-{{ $aluno->id }}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Remover aluno</h4>
                                                    <small class="font-bold">{{ $aluno->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ Route('alunos.destroy', $aluno->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="password" class="form-control"
                                                            placeholder="Palavra passe" required name="password">
                                                        <br>
                                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim de remover ano lectivo -->

                                    <!-- editar aluno -->
                                    <div class="modal inmodal" id="edit-{{ $aluno->id }}" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">O que deseja fazer?</h4>
                                                    <small class="font-bold">Nome: {{ $aluno->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    @can('edit_crianca')
                                                        <a href="{{ route('alunos.edit', $aluno->id) }}"
                                                            class="btn btn-primary">Editar</a> /
                                                    @endcan
                                                    @can('view_crianca')
                                                        <a href="{{ route('alunos.show', $aluno->id) }}"
                                                            class="btn btn-primary">Detalhe</a>
                                                    @endcan


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim de editar ano lectivo -->
                                </tr>

                            @empty
                            @endforelse

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
@endcan
