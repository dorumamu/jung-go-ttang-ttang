<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
  protected $table = 'qna';
  protected $fillable =[
    'qna_number',
    'qna_text',
    'qna_pass',
    'qna_id',
    'qna_title'
  ];
}
