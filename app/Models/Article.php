<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'excerpt', 'body', 'img_path'];

  public function user() {
      return $this -> belongsTo(User::class);
  }

  public function tags() {
      return $this -> belongsToMany(Tag::class)->withTimestamps();
  }
}
