<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cover_image', 'project_url', 'source_code_url','description'];
    // add Fillable properties (array) to consent the mass assignment
}
