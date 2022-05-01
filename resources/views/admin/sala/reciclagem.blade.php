@extends('layout.index')
@section('titulo', 'Sala / Reciclagem')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
              @can('list_sala')
                <a href="{{ route('salas.index') }}" class="btn btn-info">Ver sala</a>
                @endcan
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Sala</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($salas as $sala)
                                <tr>
                                    <td>
                                        {{ $sala->sala }}
                                    </td>
                                    <td>
                                        @can('restor_sala')
                                        <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                            data-target="#restaurar-{{ $sala->id }}">
                                            <i class="fa fa-level-up"></i> Restaurar
                                        </button>
                                        @endcan

                                    </td>

                                    <!-- Restaurar ano lectivo -->
                                    <div class="modal inmodal" id="restaurar-{{ $sala->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Restaurar ano lectivo</h4>
                                                    <small class="font-bold">{{ $sala->sala }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ Route('sala.restaurar',$sala->id) }}">
                                                        @csrf
                                                       <input type="password" class="form-control" placeholder="Palavra passe" required name="password">
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
