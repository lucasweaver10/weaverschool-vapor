<?php

namespace App\Models;
use Illuminate\Support\Facades\Mail;
use App\Mail\LevelTestResults;


use Illuminate\Database\Eloquent\Model;

class LevelTestSubmission extends Model
{
  protected $guarded = [];

  public static function emailLevelTestResults($data)
  {
      Mail::to($data['email'])->bcc('2144262@bcc.hubspot.com')->send(new LevelTestResults($data));
  }
}
