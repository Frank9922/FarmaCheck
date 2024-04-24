<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_farmaco' => $this->firstFarmaco->name,
            'second_farmaco' => $this->secondFarmaco->name,
            'compatibilidad' => $this->compatibilidad->name

        ];
    }
}
