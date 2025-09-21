<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JusController;


  route::get('/Jus/{param1}', [JusController::class, 'show']);


