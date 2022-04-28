@extends('layout.index')
@section('titulo', 'Alunos')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
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

                                        <button type="submit" class="btn btn-primary dim" data-toggle="modal"
                                            data-target="#edit-{{ $aluno->id }}">
                                            <i class="fa fa-edit"></i> Presente
                                        </button>
                                    </td>
                                    <div class="modal inmodal" id="edit-{{ $aluno->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Confirmar a presença da criança ?</h4>
                                                    <small class="font-bold">{{ $aluno->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('aluno.presente',$aluno->id) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-primary dim">SIM</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
