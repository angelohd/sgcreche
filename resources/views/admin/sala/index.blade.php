@extends('layout.index')
@section('titulo', 'Sala')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                {{-- <h5>Basic Data Tables example with responsive plugin</h5> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Registar ano sala
                </button>
                / <a href="{{ route('sala.recilagem') }}" class="btn btn-dark">Reciclagem</a>
                <!-- Registar sala -->
                <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Registar sala</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('salas.store') }}">
                                    @include('admin.sala.form')
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- fim de registar sala -->
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
                                        <button type="button" class="btn btn-primary dim" data-toggle="modal"
                                            data-target="#myModal-{{ $sala->id }}">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>
                                        <button type="button" class="btn btn-danger dim" data-toggle="modal"
                                            data-target="#delete-{{ $sala->id }}">
                                            <i class="fa fa-trash-o"></i> Remover
                                        </button>
                                    </td>
                                    <!-- editar ano lectivo -->
                                    <div class="modal inmodal" id="myModal-{{ $sala->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Editar sala</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ Route('salas.update',$sala->id) }}">
                                                        @method("PUT")
                                                        @include('admin.sala.form')
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim de editar ano lectivo -->

                                    <!-- remover ano lectivo -->
                                    <div class="modal inmodal" id="delete-{{ $sala->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Remover sala</h4>
                                                    <small class="font-bold">{{ $sala->sala }}.</small>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ Route('salas.destroy',$sala->id) }}">
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
