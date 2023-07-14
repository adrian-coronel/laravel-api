<?php

namespace App\Http\Requests\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        # Solo clientes autorizados pueden crear
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method(); # Retorna el metodo utilizado en mayuscula

        if ($method == 'PUT'){
            return [
                'name' => ['required'],
                # Si el cliente proporciona un tipo diferente a estos, será rechazado
                'type' => ['required', Rule::in(['I','B','i','b'])],
                'email' => ['required','email'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'postalCode' => ['required'],
            ];
        } else { # Si es PATCH

            # El campo que tenga una regla "SOMETIMES" solo se validará si está presente en la matriz.
            return [
                'name' => ['sometimes','required'],
                # Si el cliente proporciona un tipo diferente a estos, será rechazado
                'type' => ['sometimes','required', Rule::in(['I','B','i','b'])],
                'email' => ['sometimes','required','email'],
                'address' => ['sometimes','required'],
                'city' => ['sometimes','required'],
                'state' => ['sometimes','required'],
                'postalCode' => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->postalCode) {
            # Si se envio una solicitud con relación a codigo postal, se ejuta...
            $this->merge([
                'postal_code' => $this->postalCode,
            ]);
        }
    }
}
