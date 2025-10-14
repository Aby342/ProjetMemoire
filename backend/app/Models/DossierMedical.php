<?php
class DossierMedical extends Model {
    protected $fillable = ['patient_id', 'antecedents', 'allergies', 'medicaments'];
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
