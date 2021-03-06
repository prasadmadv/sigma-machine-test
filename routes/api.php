<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CampaignsController;

Route::get('reports',[CampaignsController::class,'showReport']);
Route::get('download-report',[CampaignsController::class,'downloadReport']);

Route::get('campaigns',[CampaignsController::class,'index']);
Route::group(['prefix'=>'campaigns'],function(){
	Route::post('add', [CampaignsController::class,'add']);
	Route::get('edit/{id}', [CampaignsController::class,'edit']);
	Route::post('update/{id}', [CampaignsController::class,'update']);
	Route::delete('delete/{id}', [CampaignsController::class,'destroy']);
});
