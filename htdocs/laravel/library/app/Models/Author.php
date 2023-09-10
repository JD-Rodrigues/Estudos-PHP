<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'ano_de_nascimento', 'nacionalidade_id'];
    use SoftDeletes;
}
