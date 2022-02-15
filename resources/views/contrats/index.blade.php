@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Contrats</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('contrats.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-responsive results" id="contrats-table">
                    <thead>
                        <tr>
                            <th>Nom Apprenant</th>
                            <th>Specialite</th>
                            <th>Ville</th>
                            <th>Telephone</th>
                            <th>Telephones Parents</th>
                            <th>Annee Academique</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contrats as $contrat)
                        <tr>
                            <td>{{ $contrat->apprenant->nom. ' ' .$contrat->apprenant->prenom }}</td>
                            <td>{{ $contrat->specialite->slug. ' ' .$contrat->cycle->niveau }}</td>
                            <td>{{ !empty($contrat->ville) ? $contrat->ville->nom:'' }}</td>
                            <td>{{ $contrat->apprenant->tel }}</td>
                            <td>
                                @foreach($contrat->apprenant->tutors as $tutor)
                                    {{ $tutor->tel_mobile }}<br/>
                                @endforeach
                            </td>
                            <td>{{ $contrat->academic_year->debut. '/' .$contrat->academic_year->fin }}</td>
                            <td>{{ $contrat->state }}</td>
                            <td>
                                {!! Form::open(['route' => ['contrats.destroy', $contrat->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
{{--                                    <a href="{!! route('contrats.show', [$contrat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                                    <a href="{!! route('contrats.edit', [$contrat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    @can('delete contrats')
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    @endcan
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://localhost/pigier/public/js/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#contrats-table').DataTable({
                responsive: true,
                dom:'Blfrtip',
                buttons:[
                    'copy', 'excel', 'pdf'
                ],
                "columnDefs":[
                    {"orderable":false, "targets":5}
                ]
            });

            table.buttons().container().appendTo($('.col-sm-6:eq(0)', table.table().container() ))

        });
    </script>

@endsection

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.css"/>
    <style>
        .results tr[visible='false'], .no-result{
            display: none;
        }
        .results tr[visible='true']{
            display: table-row;
        }
        .counter{
            padding: 8px;
            color: #acacac;
        }
    </style>
@endsection