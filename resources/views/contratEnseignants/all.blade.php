@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Etats des enseignants autorisés</h1>
        <h1 class="pull-right"></h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
            	<table class="table table-responsive results" id="contrats-table">
            		<thead>
                        <tr>
                            <th>Nom Enseigant</th>
                            <!--<th>Ville</th>-->
                            <th>Enseignement</th>
                            <th>Spécialités</th>
                            <th>Année</th>
                            <th>Semestre</th>
                            <th>Mh P</th>
                            <th>Mh Eff</th>
                            <th>Mh Rest</th>
                            <th>MT</th>
                            <th>NAP</th>
                            <th>Montant versé</th>
                            <th>Solde</th>
                            <!--<th>Détails paiements</th>-->
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($contrats as $contrat)
                            @if(isset($contrat->enseignant))
                                @foreach($tronc_communs as $tronc_commun)
                                    <tr>
                                        <td>
                                            @foreach($tronc_commun->enseignements as $enseignement)
                                                {{ $enseignement->contratEnseignant->enseignant->name }}<br/>
                                            @endforeach
                                        </td>
                                        <td>{{ $tronc_commun->enseignements->first()->ecue->title }}</td>
                                        <td>
                                            @foreach($tronc_commun->enseignements as $enseignement)
                                                {{ $enseignement->specialite->slug .' '. $enseignement->ecue->semestre->cycle->niveau .' ' }}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($tronc_commun->enseignements as $enseignement)
                                                {{ $enseignement->academic_year->debut. '/' .$enseignement->academic_year->fin }}<br/>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $tronc_commun->enseignements->first()->ecue->semestre->title }}
                                        </td>
                                        <td>{{ $mhTot = $tronc_commun->enseignements->first()->mhTotal }}</td>
                                        <td>{{ $mhEff = $tronc_commun->enseignements->first()->mhEff }}</td>
                                        <td>{{ $tronc_commun->enseignements->first()->mhTotal - $tronc_commun->enseignements->first()->mhEff }}</td>
                                        <td>
                                            {{ $mt = (($tronc_commun->enseignements->first()->ecue->semestre->cycle->label == 'Licence') ? $contrat->mh_licence : $contrat->mh_master) * (($mhTot > $mhEff) ? $mhEff : $mhTot) }}
                                        </td>
                                        <td>{{ $nap = $mt * (1 - 0.055) }}</td>
                                        <td>{{ $pay = $tronc_commun->payments->sum('montant') }}</td>
                                        <td>{{ $nap - $pay }}</td>
                                    </tr>
                                @endforeach

                                

                                
                            @endif
                        @endforeach
                    </tbody>
            	</table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{--<script src="http://localhost/pigier/public/js/jquery.tablesorter.js"></script>--}}
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
                    {"orderable":false, "targets":12}
                ]
            });
    	});
    </script>

@endsection

@section('css')

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.22/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>

    {{--<script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.22/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>--}}

@endsection