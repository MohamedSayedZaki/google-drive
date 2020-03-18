<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleDrive extends Model
{
	protected $table = "drive_files";
		
	protected $fillable = ['title','downloadUrl','fileSize','mimeType'];
}
