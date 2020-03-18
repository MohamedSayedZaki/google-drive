<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoogleDrive;

class GoogleDriveController extends Controller
{
    public function get_user_drive_files(){
		require_once '../../../vendor/autoload.php';
		$client = new Google_Client();
		$client->setApplicationName("Google Drive");
		$client->setDeveloperKey("AIzaSyDQZS0HIxlvJpjoLx_QQ6BxQ1BtngM7vKk");
		$client->addScope(Google_Service_Drive::DRIVE);

		$service = new Google_Service_Drive($client);

		$pageToken = NULL;
		$files = [];

		try {
			$folderId = '0B1e-raoND2Tiek9YbllicHp5STQ';
			$optParams = array(
			'pageSize' => 10,
			'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
			'q' => "'".$folderId."' in parents"
			);	  
		  
		  $files = $service->files->listFiles($optParams);
		  foreach($files->files as $file){
			  $this->insert_user_drive_files($file);
			  echo $file->name.' - '.$file->mimeType .' - '.($file->size/1024).' - '.$file->webViewLink."<br/>";
		  }

		} catch (Exception $e) {
		  print "An error occurred: " . $e->getMessage();
		  $pageToken = NULL;
		}
	}
	
	private function insert_user_drive_files($file){
		GoogleDrive::create([
			'title'=>$file->name,
			'downloadUrl'=>$file->webViewLink,
			'fileSize'=>($file->size/1024),
			'mimeType'=>$file->mimeType
		]);
	}
}
