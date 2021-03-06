<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ville extends Model
{
    use SoftDeletes;

    public $table = 'villes';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $fillable = [
        'nom',
        'code',
        'pays_id',
    ];

    public function contrats(){
        return $this->hasMany(Contrat::class);
    }

    public function contratsenseignants(){
        return $this->hasMany(ContratEnseignant::class);
    }

    public function enseignements(){
        return $this->hasMany(Enseignement::class);
    }
}
