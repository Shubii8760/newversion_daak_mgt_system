<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintSuggestion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "complaints_suggestions";

    protected $primarykey = "id";



}
