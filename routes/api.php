<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ContactsController;
use App\Http\Controllers\Api\ContactGroupsController;
use App\Http\Controllers\Api\SignsController;
use App\Http\Controllers\Api\TemplatesController;
use App\Http\Controllers\Api\MmsTemplatesController;
use App\Http\Controllers\Api\ScenesController;
use App\Http\Controllers\Api\SceneTypesController;
use App\Http\Controllers\Api\UserChannelBlacklistsController;
use App\Http\Controllers\Api\SmsSendRecordsController;
use App\Http\Controllers\Api\SmsRepliesController;
use App\Http\Controllers\Api\OptionsController;
use App\Http\Controllers\Api\OperateLogController;
use App\Http\Controllers\Api\UserChannelsController;
use App\Http\Controllers\Api\SmsTasksController;
use App\Http\Controllers\Api\UploadsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//不需要jwt验证的接口

//需要jwt验证的接口
Route::middleware('jwt')->group(function () {
});
