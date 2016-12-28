<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FileController extends Controller
{
	public function download_file($file_name)
	{		
		return response()->download(storage_path('files/models/'. $file_name));
	}
}
