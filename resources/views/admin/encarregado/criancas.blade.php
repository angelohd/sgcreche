@extends('layout.index')
@section('titulo', 'Minhas Crianças')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>nome da Criança</th>
                                <th>Tipo Doc.</th>
                                <th>Nº Doc.</th>
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
                                        <a href="{{ route('encarregado.agregar_encarregado',$aluno->id) }}"  class="btn btn-primary dim"><i class="fa fa-edit"></i> Agregar encarregado</a>
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
