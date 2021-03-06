<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Certificat de scolarite</title>

    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <style>
        .logo_pigier{
            width: 60%;
            height: 80%;
        }
        .small-text{
            font-size: 10px;
            margin: auto 0px;
            padding: 0px;
        }
        .big-text p{
            font-size: 16px;
            line-height: 14px;
        }
        .logo-container{
            margin: 20px auto;
            border-bottom: solid 5px;
        }
        #acad{
            font-size: 10px;
        }
        #specialite span{
            padding-left: 80px;
        }
        div .infos{
            margin: 5px auto;
            font-size: 12px;
        }
        div .echeanciers{
            margin: 5px 10px;
            font-size: 10px;
        }
        .borderless > tbody > tr > td,
        .borderless > tbody > tr > th,
        .borderless > tfoot > tr > td,
        .borderless > tfoot > tr > th,
        .borderless > thead > tr > td,
        .borderless > thead > tr > th {
            border: none;
            font-size: 11px;
        }
        .tuteur > thead > tr {
            background-color: grey;
        }
        .echeancier{
            margin-bottom: 5px;
        }
        .footer{
            background-color: #0b58a2;
            position: fixed;
            bottom: 10px;
            width:90%;
            margin-left: 30px;
        }
        .footer p{
            color: #ffffff;
        }
        p{
            margin-bottom: 3px;
        }

        .text-justify, div{
            color: #000000;
        }
        .signatures{
            /*background-color: #7DA0B1;*/
            height: 60px;
        }
        @media print{
            .signatures td,
            .signatures th,
            .signatures tr{
                /*background-color: #7DA0B1 !important;*/
            }

            .tuteur th{
                background-color: grey !important;
            }
            .echeancier th{
                background-color: grey !important;
            }
            div .infos{
                margin: 5px auto;
                font-size: 12px;
            }
            div .echeanciers{
                margin: 5px 10px;
                font-size: 10px;
            }
            .conditions p{
                font-size: 11px;
            }
            .logo_pigier{
                width: 60%;
                height: 200px;
            }
        }
        .sign{
            margin-top: 10px;
        }
        .apprenant{
            border-bottom: solid 1px ;
        }
    </style>
</head>

<body class="skin-blue sidebar-mini fixed" id="certificat">

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content container-fluid .page-break">
            <div class="container-fluid">
                <div class="logo-container row">
                    <div class="col-xs-2"><img src="{{ ($contrat->cycle->label == 'MBA') ? url('images/mbway.jpg') : url('images/logo_pigier.jpg') }}" alt="logo pigier" class="logo {{($contrat->cycle->label != 'MBA' ? 'pigier_logo' : 'logo')}}"></div>
                    <div class="col-xs-2 text-right small-text"><p>ECOLE SUPERIEURE DE COMMERCE ET DE MANAGEMENT <br>BP: 1133 Douala</p></div>
                    <div class="col-xs-4 text-center big-text">
                        <p id="acad"><strong><i>ANNEE ACADEMIQUE : {{ $contrat->academic_year->debut.'-'.$contrat->academic_year->fin }}</i></strong></p>
{{--                        <p><strong>CONTRAT N?? : {{ $contrat->academic_year->debut. '-' .str_pad($rang, 3, 0,STR_PAD_LEFT)}}</strong></p>--}}
                        <br><p><strong>{{ $contrat->type == 'Inscription' ? 'Contrat d\'inscription' : 'Contrat de R??inscription' }}</strong></p>
                    </div>
                    <div class="col-xs-2"><img src="{{ url('images/Office365Partner.png') }}" alt="logo microsoft" class="logo"></div>
                    <div class="col-xs-2"><img src="{{ url('images/office-specialist.jpg') }}" alt="logo microsoft" class="logo"></div>
                </div>
                <div class="row infos">
                    <div class="col-xs-8 pl" id="specialite"><strong>SPECIALITE : <span>{{ $contrat->specialite->title }}</span></strong></div>
                    <div class="col-xs-4"><strong>NIVEAU: <span>{{ $contrat->cycle->label. ' '. $contrat->cycle->niveau }}</span></strong></div>
                </div>
                <div class="row infos">
                    <div class="col-xs-6 pl"><strong>MATRICULE : <span>{{ $contrat->apprenant->matricule }}</span></strong></div>
                    <div class="col-xs-6"><strong></strong></div>
                </div>
                <div class="row infos apprenant">
                    <div class="col-xs-4">
                        <table class="table borderless">
                            <tr>
                                <th>Nom(s)</th>
                                <td>{{ $contrat->apprenant->nom }}</td>
                            </tr>
                            <tr>
                                <th>Pr??nom(s)</th>
                                <td>{{ $contrat->apprenant->prenom }}</td>
                            </tr>
                            <tr>
                                <th>Nationalit??</th>
                                <td>{{ $contrat->apprenant->nationalite }}</td>
                            </tr>
                            <tr>
                                <th>Date de Naissance</th>
                                <td>{{ $contrat->apprenant->dateNaissance->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>L. de Naissance</th>
                                <td>{{ $contrat->apprenant->lieuNaissance }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-4">
                        <table class="table borderless">
                            <tr>
                                <th>Adresse</th>
                                <td>{{ $contrat->apprenant->addresse }}</td>
                            </tr>
                            <tr>
                                <th>Quartier</th>
                                <td>{{ $contrat->apprenant->quartier }}</td>
                            </tr>
                            <tr>
                                <th>Dipl??me/Niveau</th>
                                <td>
                                    {{ $contrat->apprenant->diplome }}
                                </td>
                            </tr>
                            <tr>
                                <th>S. Matrimoniale</th>
                                <td>{{ ($contrat->apprenant->civilite === 'celibataire') ? 'c??libataire' : $contrat->apprenant->civilite }}</td>
                            </tr>
                            <tr>
                                <th>Situation Professionnelle</th>
                                <td>{{ $contrat->apprenant->situation_professionnelle }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-4">
                        <table class="table borderless">
                            <tr>
                                <th>Etablis. de prov.</th>
                                <td>{{ $contrat->apprenant->etablissement_provenance }}</td>
                            </tr>
                            <tr>
                                <th>T??l??phone:</th>
                                <td>{{ $contrat->apprenant->tel }}</td>
                            </tr>
                            <tr>
                                <th>Mail</th>
                                <td>{{ $contrat->apprenant->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row infos">
                    <table class="table table-bordered tuteur">
                        <thead>
                        <tr class="">
                            <th>INTITULE</th>
                            <th>NOM</th>
                            <th>EMAIL</th>
                            <th>PROFESSION</th>
                            <th>TELEPHONE</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @if(isset($contrat->apprenant->tutors->first()->id))--}}
                            @foreach($contrat->apprenant->tutors as $tutor)
                                <tr>
                                    <td>{{ $tutor->type }}</td>
                                    <td>{{ $tutor->name }}</td>
                                    <td></td>
                                    <td>{{ $tutor->profession }}</td>
                                    <td>{{ $tutor->tel_mobile }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row echeanciers">
                    <div class="col-xs-9">
                        <table class="table table-bordered echeancier">
                            <thead>
                            <tr class="">
                                <th>Versement</th>
                                <th>DATES</th>
                                <th>MONTANT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contrat->cycle->echeanciers->where('academic_year_id', $contrat->academic_year_id) as $echeancier)
                                <tr>
                                    <td><strong>{{ $echeancier->tranche }}</strong></td>
                                    <td>{{ $echeancier->date->format('d/m/Y') }}</td>
                                    <td class="text-right">{{ number_format($echeancier->montant, '0', '.', '.') }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="2"><strong>Total</strong></td>
                                    @if(!empty($contrat->cycle->echeanciers->where('academic_year_id', $contrat->academic_year_id)))
                                        <td class="text-right">{!! number_format($contrat->cycle->echeanciers->where('academic_year_id', $contrat->academic_year_id)->sum('montant'), '0', '.', '.') !!}
                                        </td>
                                    @endif
                                </tr>
                                <!--
                                <tr>
                                    <td colspan="2"><strong>Bourse/R??duction</strong></td>
                                    <td class="text-right">{{ ($contrat->corkages->first()) ? -$contrat->corkages->where('reduction', true)->sum('montant') : 0 }}</td>
                                </tr>
                                -->
                                <tr>
                                    <td colspan="2"><strong>Bourse/R??duction</strong></td>
                                    <td class="text-right">{{ number_format(($contrat->corkages->first()) ? -$contrat->corkages->where('reduction', true)->sum('montant') : 0, 0, '.', '.') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Net ?? payer</strong></td>
                                    <td class="text-right">{{ number_format($contrat->cycle->echeanciers->where('academic_year_id', $contrat->academic_year_id)->sum('montant') + ($contrat->corkages->first() ? $contrat->corkages->sum('montant') : 0), 0, '.', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="pull-right"><strong>Ces prix s'entendent hors frais de fournitures. Le montant de la Bourse/R??duction est ?? faire valoir sur les derni??res tranches de paiement.</strong></p>
                    </div>
                </div>
                <div class="row infos conditions">
                    <h5><u>CONDITIONS GENERALES</u></h5>
                    <p class="text-justify">
                        <strong>ARTICLE 1 :</strong> Toute inscription implique la r??servation d???une place; en cons??quence le prix de la formation est payable d???avance.
                        Il est toujours forfaitaire, sauf conditions particuli??res. Il est d?? int??gralement quels que soient le mode de r??glement et la dur??e de
                        l???enseignement. L???absence ou la d??mission ne peut en aucun cas entra??ner un remboursement ou une dispense de r??glement des sommes dues.
                        Les montants pay??s pour l'inscription et/ou la reservation de place ne sont pas remboursables en cas d'annulation. La participation aux examens
                        est subordonn??e au paiement int??gral des frais de scolarit?? ??chus et des droits d'examens. Les 2??me sessions d'examen (session de rattrapage)
                        sont payables ?? hauteur de 10 000 F CFA par ECUE. <br>
                        De convention expresse et sauf report accord?? par l???organisme de formation, le d??faut de paiement ?? l???une des ??ch??ances
                        fix??es entra??nera:
                    </p>
                    <ol>
                        <li class="text-justify">L???exigibilit?? imm??diate de toutes les sommes dues quel que soit le mode de paiement pr??vu.</li>
                        <li class="text-justify">L???exigibilit?? ?? titre de dommages et int??r??ts et de clause p??nale d???une indemnit?? ??gale ?? 15 % des sommes dues, outre
                            les int??r??ts l??gaux et les frais judiciaires ??ventuels.</li>
                        <li class="text-justify">Faute de r??glement dans les 9 jours suivant l?????ch??ance, l???Ecole PIGIER suspendra de plein droit ses services ?? l?????gard de
                            l???apprenant.</li>
                    </ol>
                    <p class="text-justify">
                        <strong>ARTICLE 2 :</strong>
                        L???inscription dans l???Ecole oblige l???apprenant au respect absolu et ?? l'adh??sion au R??glement Int??rieur, au
                        R??glement P??dagogique et ?? la Charte des apprenants. Des manquements r??p??t??s ou des fautes graves pourront conduire ?? l'exclusion
                        provisoire ou d??finitive de l???apprenant sans recours.
                    </p>
                    <p class="text-justify">
                        <strong>ARTICLE 3 :</strong>
                        L???apprenant doit accepter les exigences que suppose le fait de se former pour l???emploi. Il devra particuli??rement veiller ?? sa tenue et ?? la discipline lors des visites d???entreprise,
                        des stages en entreprise ou des conf??rences organis??es dans le cadre des ??tudes.
                    </p>
                    <p class="text-justify">
                        <strong>ARTICLE 4</strong> : L???apprenant s???engage ?? maintenir intacte l???image de PIGIER tant dans ses activit??s dans l???Ecole que dans ses activit??s
                        ?? l???ext??rieur pendant toute la dur??e de son cycle de formation.
                    </p>
                    <p class="text-justify">
                        <strong>ARTICLE 5</strong> : Il est strictement interdit ?? l???apprenant de fumer, d???introduire de l???alcool ou tout autre produit prohib?? par la loi
                        dans l???enceinte et aux abords de l???Ecole.
                    </p>
                    <p class="text-justify">
                        <strong>ARTICLE 6 : </strong>L???entr??e ?? l?????cole est conditionn??e par une carte d???acc??s qui vous sera remise ?? l???inscription. Cette carte reste la propri??t?? de l?????cole et doit ??tre retourn??e ?? la fin de l???ann??e acad??mique.
                    </p>
                    <p class="text-justify">
                        <strong>ARTICLE 7 :</strong>
                        Le contrat est r??gi par les conditions sp??cifiques et g??n??rales, ainsi sont nulles toutes adjonctions ou modifications
                        mat??rielles non rev??tues du visa de la Direction g??n??rale ou du repr??sentant autoris??.
                    </p>
                </div>
                <div class=" container row infos signatures">
{{--                    <div class="col-xs-6">FAIT A YAOUNDE LE : </div>--}}
                    <div class="col-xs-6">FAIT A DOUALA LE : </div>
                    <div class="col-xs-6">SIGNATURES</div>
                    <div class="sign">
                        <table class="table borderless">
                            <tr>
                                <td></td>
                                <td>PERE</td>
                                <td></td>
                                <td></td>
                                <td>MERE</td>
                                <td></td>
                                <td>TUTEUR</td>
                                <td></td>
                                <td>L'APPRENANT</td>
                                <td><u>PROMOTEUR DIRECTEUR GENERAL ET FRANCHISE</u></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
                <div class="container-fluid footer fixed-bottom">
                    <div class=" text-center">
                        <p>UNE ECOLE DU GROUPE EDUSERVICES - PIGIER(FRANCE)</p>
                        <p class="small-text">SIEGE SOCIAL DU CAMEROUN : DOUALA - BESSENGUE, 39 rue 1436 (En face H??tel Lewat). BP:1133 Douala - CAMEROUN - Tel: (237)696 70 39 76 / pigierdouala@pigiercam.com - www.pigier.com - www.pigiercam.com</p>
{{--                        <p class="small-text">PIGIER YAOUNDE : Nouvelle Route BASTOS, derri??re Zenith Assurance, Ancien PNDP - Tel : (237) 695 63 79 23 / pigieryaounde@pigiercam.com - www.pigier.com - www.pigiercam.com</p>--}}
                    </div>
                </div>
        </section>
    </div>
    {{--<div class="row">--}}
        {{--<button class="btn btn-primary" onclick="imprimer('certificat')">Imprimer</button>--}}
    {{--</div>--}}
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script>
    // function imprimer(certificat){
    //     $('.row .btn').hide();
    //     var printContents = document.getElementById(certificat).innerHTML;
    //     var originalContents = document.body.innerHTML;
    //     document.body.innerHTML = printContents;
    //     window.print();
    //     document.body.innerHTML = originalContents;
    // }

    window.onload = window.print();
</script>
</body>

</html>