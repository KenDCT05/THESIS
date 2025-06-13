<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningMaterial extends Model
{
    protected $fillable = [
    'teacher_id',
    'title',
    'instructions',
    'file_path',
];
    public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}
}
