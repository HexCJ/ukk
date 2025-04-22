<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodolistModel extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $primaryKey = 'id';

    protected $fillable = [
        'task',
        'deskripsi',
        'kategori',
        'level',
        'status',
        'deadline',
    ];

    public function subtask()
    {
        return $this->hasMany(Subtaskmodel::class, 'idp', 'id');
    }
}
