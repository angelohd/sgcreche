@extends('layout.index')
@section('titulo', 'Ano Lectivo / Reciclagem')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                @can('list_ano_lectivo')
                    <a href="{{ route('ano_lectivos.index') }}" class="btn btn-info">Ver Ano lectivos</a>
                @endcan
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
                                        @can('restor_ano_lectivo')
                                            <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                                data-target="#restaurar-{{ $ano_lectivo->id }}">
                                                <i class="fa fa-level-up"></i> Restaurar
                                            </button>
                                        @endcan

                                    </td>

                                    <!-- Restaurar ano lectivo -->
                                    <div class="modal inmodal" id="restaurar-{{ $ano_lectivo->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Restaurar ano lectivo</h4>
                                                    <small class="font-bold">{{ $ano_lectivo->ano_lectivo }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ Route('ano_lectivo.restaurar', $ano_lectivo->id) }}">
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
                                    <!-- fim de Restaurar ano lectivo -->
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
