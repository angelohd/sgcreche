@extends('layout.index')
@section('titulo', 'Reciclagem')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                {{-- <h5>Basic Data Tables example with responsive plugin</h5> --}}
                @can('list_crianca')
                    <a href="{{ route('alunos.index') }}" class="btn btn-primary"> Crianças</a>
                @endcan
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nº Id.</th>
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
                                        {{ $aluno->numero_doc }}
                                    </td>
                                    <td>
                                        @can('restor_crianca')
                                            <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                                data-target="#delete-{{ $aluno->id }}">
                                                <i class="fa fa-level-up"></i> Restaurar
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
                                                    <h4 class="modal-title">Restaurar aluno</h4>
                                                    <small class="font-bold">{{ $aluno->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ Route('aluno.restaurar', $aluno->id) }}">
                                                        @csrf
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
