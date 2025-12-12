
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{client}/websites',[ClientController::class,'websites']);
