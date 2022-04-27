@extends('layout.index')
@section('titulo', 'Encarregadosonarios')
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
                                <th>Telefone 1</th>
                                <th>E-Mail</th>
                                <th>Acção</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($encarregados as $encarregado)
                                <tr>
                                    <td>
                                        {{ $encarregado->nome }}
                                    </td>
                                    <td>
                                        {{ $encarregado->telefone1 }}
                                    </td>
                                    <td>
                                        {{ $encarregado->email }}
                                    </td>
                                    <td>
                                        <a href="{{ route('encarregados.edit',$encarregado->id) }}"  class="btn btn-primary dim"><i class="fa fa-edit"></i> Editar</a>
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
