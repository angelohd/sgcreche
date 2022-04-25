@extends('layout.index')
@section('titulo', 'funcionario')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                {{-- <h5>Basic Data Tables example with responsive plugin</h5> --}}
                <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Registar funcionario</a>
                / <a href="{{ route('funcionario.recilagem') }}" class="btn btn-dark">Reciclagem</a>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Função</th>
                                <th>E-Mail</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($funcionarios as $funcionario)
                                <tr>
                                    <td>
                                        {{ $funcionario->nome }}
                                    </td>
                                    <td>
                                        {{ $funcionario->funcao }}
                                    </td>
                                    <td>
                                        {{ $funcionario->email }}
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                    data-target="#edit-{{ $funcionario->id }}">
                                    <i class="fa fa-edit" ></i> Editar
                                </button>
                                        <button type="button" class="btn btn-danger dim" data-toggle="modal"
                                            data-target="#delete-{{ $funcionario->id }}">
                                            <i class="fa fa-trash-o"></i> Remover
                                        </button>
                                    </td>


                                    <!-- remover funcionario -->
                                    <div class="modal inmodal" id="delete-{{ $funcionario->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Remover funcionario</h4>
                                                    <small class="font-bold">{{ $funcionario->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ Route('funcionarios.destroy',$funcionario->id) }}">
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

                                    <!-- editar funcionario -->
                                    <div class="modal inmodal" id="edit-{{ $funcionario->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Pretende editar os dados deste funcionario?</h4>
                                                    <small class="font-bold">{{ $funcionario->nome }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{ route('funcionarios.edit',$funcionario->id) }}" class="btn btn-primary">Editar</a> /
                                                    <a href="{{ route('funcionarios.show',$funcionario->id) }}" class="btn btn-primary">Detalhe</a>
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
