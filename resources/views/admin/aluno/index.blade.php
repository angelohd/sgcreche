@extends('layout.index')
@section('titulo', 'Crianças')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                {{-- <h5>Basic Data Tables example with responsive plugin</h5> --}}
                <a href="{{ route('alunos.create') }}" class="btn btn-primary">Registar aluno</a>
                / <a href="{{ route('aluno.recilagem') }}" class="btn btn-dark">Reciclagem</a>
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
                                    <i class="fa fa-edit" ></i> Opções
                                </button>
                                        <button type="button" class="btn btn-danger dim" data-toggle="modal"
                                            data-target="#delete-{{ $aluno->id }}">
                                            <i class="fa fa-trash-o"></i> Remover
                                        </button>
                                    </td>


                                    <!-- remover aluno -->
                                    <div class="modal inmodal" id="delete-{{ $aluno->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <form method="post" action="{{ Route('alunos.destroy',$aluno->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                       <input type="password" class="form-control" placeholder="Palavra passe" required name="password">
                                                       <br>
                                                       <button type="submit" class="btn btn-danger">Confirmar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim de remover ano lectivo -->

                                    <!-- editar aluno -->
                                    <div class="modal inmodal" id="edit-{{ $aluno->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Pretende editar os dados deste aluno?</h4>
                                                    <small class="font-bold">{{ $aluno->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ route('alunos.edit',$aluno->id) }}" class="btn btn-primary">Editar</a> /
                                                    <a href="{{ route('alunos.show',$aluno->id) }}" class="btn btn-primary">Detalhe</a>
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
