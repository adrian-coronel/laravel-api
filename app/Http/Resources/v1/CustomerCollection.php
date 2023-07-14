<?php
# ESTE RECURSO SERA UNA COLECCION DE COSAS, EN ESTE CASO DE CLIENTES
namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        # POR DEFECTO BUSCARÁ UN RECURSO PARA MOSTRAR, ESTARÁ MOSTRANDO EL FORMATO DEL RECURSO "CustomerResource"
        return parent::toArray($request);
    }
}
