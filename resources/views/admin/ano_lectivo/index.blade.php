@can('list_ano_lectivo')

    @extends('layout.index')
    @section('titulo', 'Ano Lectivo')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                @can('add_ano_lectivo')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Registar ano lectivo
                    </button>
                @endcan
                @can('reciclagem_ano_lectivo')
                    / <a href="{{ route('ano_lectivo.recilagem') }}" class="btn btn-dark">Reciclagem</a>
                @endcan
                <!-- Registar ano lectivo -->
                <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Registar ano lectivo</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('ano_lectivos.store') }}">
                                    @include('admin.ano_lectivo.form')
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- fim de registar ano lectivo -->
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Ano Lectivos</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ano_lectivos as $ano_lectivo)
                                <tr>
                                    <td>
                                        {{ $ano_lectivo->ano_lectivo }}
                                    </td>
                                    <td>
                                        @can('edit_ano_lectivo')
                                            <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                                data-target="#myModal-{{ $ano_lectivo->id }}">
                                                <i class="fa fa-edit"></i> Editar
                                            </button>
                                        @endcan
                                        @can('delete_ano_lectivo')
                                            <button type="button" class="btn btn-danger dim" data-toggle="modal"
                                                data-target="#delete-{{ $ano_lectivo->id }}">
                                                <i class="fa fa-trash-o"></i> Remover
                                            </button>
                                        @endcan

                                    </td>
                                    <!-- editar ano lectivo -->
                                    <div class="modal inmodal" id="myModal-{{ $ano_lectivo->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Editar ano lectivo</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ Route('ano_lectivos.update', $ano_lectivo->id) }}">
                                                        @method("PUT")
                                                        @include('admin.ano_lectivo.form')
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim de editar ano lectivo -->

                                    <!-- remover ano lectivo -->
                                    <div class="modal inmodal" id="delete-{{ $ano_lectivo->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Remover ano lectivo</h4>
                                                    <small class="font-bold">{{ $ano_lectivo->ano_lectivo }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ Route('ano_lectivos.destroy', $ano_lectivo->id) }}">
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
