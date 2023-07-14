<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'type' => $this->type,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,

            # ACA ES DONDE UTILIZAMOS EL FORMATO CAMELCASE
            'postalCode' => $this->postal_code,

            # Recupera una relación si se ha cargado.
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices'))
        ];
    }
}