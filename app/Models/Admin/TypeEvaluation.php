<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class TypeEvaluation extends Model
{
    use Notifiable;
    protected $table ="new_type_evaluation";
}
