<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique_Notification extends Model
{
    use HasFactory;
    protected $table = 'notification_history';
    protected $primaryKey = 'id';
    protected $fillable = ['receiver', 'text','title','type','create_at'];
    public $timestamps = false;
}
