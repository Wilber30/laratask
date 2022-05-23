<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'website', 'logo', 'user_id', 'employee_id'];

    public function employee() {
    return  $this->hasMany(Employee::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
