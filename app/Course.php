<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public function lessons()
  {
    return $this->hasMany('App\Lesson')->orderBy('position', 'asc');
  }

  public function user()
  {
    return $this->belongsTo('App\User', 'author_id');
  }
}
