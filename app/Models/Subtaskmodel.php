<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtaskmodel extends Model
{
    use HasFactory;

    protected $table = 'subtask';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idp',
        'task',
        'deskripsi'
    ];

    public function task()
    {
        return $this->belongsTo(TodolistModel::class, 'idp', 'id');
    }
}
