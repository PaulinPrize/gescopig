<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <!-- Name Field -->
            <div class="form-group col-xs-4">
                {!! Form::label('nom', 'Nom :') !!}
                {!! Form::text('nom', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('prenom', 'Prenom :') !!}
                {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('sexe', 'Sexe :') !!}
                {!! Form::select('sexe',['Homme'=>'Homme', 'Femme'=>'Femme'],isset($apprenant)? $apprenant->sexe : null,['class' => 'form-control', 'placeholder' => 'choisissez le sexe de l\'apprenant']) !!}
            </div>

            <!-- Tel Field -->
            <div class="form-group col-xs-4">
                {!! Form::label('tel', 'Tel:') !!}
                {!! Form::text('tel', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tel Parent Field -->
            <div class="form-group col-xs-4">
                {!! Form::label('dateNaissance', 'Date de naissance :') !!}
                {!! Form::date('dateNaissance', isset($apprenant) ? Carbon\Carbon::parse($apprenant->dateNaissance) : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('lieuNaissance', 'Lieu de Naissance:') !!}
                {!! Form::text('lieuNaissance', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('nationalite', 'Nationalite:') !!}
                {!! Form::text('nationalite', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('region', 'Region d\'origine') !!}
                {!! Form::text('region', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('civilite', 'Civilite:') !!}
                {!! Form::select('civilite',
                 ['mari??(e)' => 'Mari??(e)', 'c??libataire' => 'Celibataire', 'divorc??(e)' => 'Divorc??(e)',
                  'veuf(ve)' => 'Veuf(ve)'], isset($apprenant)? $apprenant->civilite : null, ['class' => 'form-control', 'placeholder' => 's??lectionnez le statut']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('addresse', 'Adresse:') !!}
                {!! Form::text('addresse', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('quartier', 'Quartier:') !!}
                {!! Form::text('quartier', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('diplome', 'Niveau / Dernier dipl??me:') !!}
                {!! Form::text('diplome', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('situation_professionnelle', 'Situation Professionnelle:') !!}
                {!! Form::text('situation_professionnelle', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('etablissement_provenance', 'Etablissement de Provenance:') !!}
                {!! Form::text('etablissement_provenance', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-xs-4">
                {!! Form::label('academic_year_id', 'Ann??e Acad??mique:') !!}
                {!! Form::select('academic_year_id',$academicYears, isset($apprenant)? $apprenant->academic_year_id : null, ['class' => 'form-control', 'placeholder' => 's??lectionnez l\'ann??e']) !!}
            </div>
        </div>
        @if(!isset($apprenant))
            <div class="row">
                <h4 class="col-sm-2"><strong>Filiere, niveau et ville</strong></h4><hr>
            </div>
            <div class="row">
                <div class="form-group col-xs-4">
                    {!! Form::label('specialite_id', 'Specialite:') !!}
                    {!! Form::select('specialite_id',isset($specialites) ? $specialites : [], null, ['class' => 'form-control', 'placeholder' => 's??lectionnez la specialite']) !!}
                </div>
                <div class="form-group col-xs-4">
                    {!! Form::label('cycle_id', 'Niveau:') !!}
                    {!! Form::select('cycle_id',isset($cycles) ? $cycles : [], null, ['class' => 'form-control', 'placeholder' => 's??lectionnez le niveau']) !!}
                </div>
                <div class="form-group col-xs-4">
                    {!! Form::label('ville_id', 'Ville:') !!}
                    {!! Form::select('ville_id',isset($villes) ? $villes : [], null, ['class' => 'form-control', 'placeholder' => 's??lectionnez la ville']) !!}
                </div>
            </div>
        @endif
    </div>
</div>

@if(!isset($apprenant))
    <div id="parent1">
    <h3>Informations du parent 1</h3>
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="form-group col-xs-4">
                    {!! Form::label('name1', 'Nom du Parent:', ['class' => 'nameLabel']) !!}
                    {!! Form::text('name1', isset($apprenant)? $apprenant->tutor->name : null, ['class' => 'form-control nameInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('profession1', 'Profession:', ['class' => 'professionLabel']) !!}
                    {!! Form::text('profession1', isset($apprenant)? $apprenant->tutor->profession : null, ['class' => 'form-control professionInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('addresse1', 'Adresse:', ['class' => 'addresseLabel']) !!}
                    {!! Form::text('addresse1', isset($apprenant)? $apprenant->tutor->addresse : null, ['class' => 'form-control addresseInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('tel_mobile1', 'Portable:', ['class' => 'tel_mobileLabel']) !!}
                    {!! Form::text('tel_mobile1', isset($apprenant)? $apprenant->tutor->tel_mobile : null, ['class' => 'form-control tel_mobileInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('tel_fixe1', 'Fixe:', ['class' => 'tel_fixeLabel']) !!}
                    {!! Form::text('tel_fixe1', isset($apprenant)? $apprenant->tutor->tel_fixe : null, ['class' => 'form-control tel_fixeInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('tel_bureau1', 'Bureau:', ['class' => 'tel_bureauLabel']) !!}
                    {!! Form::text('tel_bureau1', isset($apprenant)? $apprenant->tutor->tel_bureau : null, ['class' => 'form-control tel_bureauInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('type1', 'relation avec l\'apprenant:', ['class' => 'typeLabel']) !!}
                    {!! Form::text('type1', isset($apprenant)? $apprenant->tutor->type : null, ['class' => 'form-control typeInput']) !!}
                </div>

                <div class="form-group col-xs-4">
                    {!! Form::label('email1', 'Email:', ['class' => 'typeLabel']) !!}
                    {!! Form::text('email', isset($apprenant)? $apprenant->tutor->emailParent : null, ['class' => 'form-control typeInput']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-xs-12 button-container">
    @if(!isset($apprenant))
    <a href="#" class="btn btn-primary" id="ajouter">ajouter parent</a>
    @endif
    {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'save']) !!}
    <a href="{!! route('apprenants.index') !!}" class="btn btn-default">Cancel</a>
</div>
