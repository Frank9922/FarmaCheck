<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResource;
use App\Http\Services\ApiResponse;
use App\Http\Services\FarmaService;
use App\Models\FarmacoCompatibilidad;
use App\Models\Farmaco;


class ApiController extends Controller
{
    public function farmacos() {

        if(!$farmacos = FarmaService::getFarmacos()) return ApiResponse::error('Not found');

        return ApiResponse::success(['farmacos' => $farmacos]);

    }


    public function check($farmaco1, $farmaco2) {

        if(!$compatibilidad = FarmaService::check($farmaco1, $farmaco2)) return ApiResponse::error('Not Found');

        return ApiResponse::success(['compatibilidad' => $compatibilidad]);

    }
}
