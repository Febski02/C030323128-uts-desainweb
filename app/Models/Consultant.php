<?php

namespace App\Models;
use Illuminate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'email', 'phone'];

    public function consultations(): HasMany { return $this->hasMany(Consultation::class); }
    public function trainings() { return $this->hasMany(Training::class, 'trainer_id'); }
}
