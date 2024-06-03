<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name','type_id' , 'cover_image', 'project_url', 'source_code_url','description'];
    // add Fillable properties (array) to consent the mass assignment
   public function type() : BelongsTo
    {
    return $this->belongsTo(Type::class);
   }

   public function technologies() : BelongsToMany
    {
    return $this->belongsToMany(Technology::class);
   }




}
