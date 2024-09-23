<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    //use HasApiTokens;
    //use HasProfilePhoto;
    //use Notifiable;
    //use TwoFactorAuthenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    public $table = "tasks";
    protected $fillable = [
        'task',
        'description',
        'data_criacao'
    ];
}
