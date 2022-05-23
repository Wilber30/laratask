<?php

namespace App\Models;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
      protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    public function company() {
      return $this->belongsTo(Company::class);
    }
}
