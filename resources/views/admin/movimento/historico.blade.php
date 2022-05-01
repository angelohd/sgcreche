@extends('layout.index')
@section('titulo', 'Historíco de entrada e saída')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th>Crinça</th>
                                <th>Data e hora de entrada.</th>
                                <th>Data e hora de saída.</th>
                                <th>Emcarregado.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alunos as $aluno)
                                <tr>
                                    <td>
                                        {{ $aluno->crianca }}
                                    </td>
                                    <td>
                                        {{ $aluno->created_at }}
                                    </td>
                                    <td>
                                        {{ $aluno->deleted_at }}
                                    </td>
                                    <td>
                                        {{ $aluno->encarregado }}
                                    </td>
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
