<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilter {

  /**
   * Las claves representan los nombres de los campos o columnas de la base de datos,
   * y los valores son arrays que contienen los operadores permitidos para ese campo en particular.
   */
  protected $safeParms = [
    #  eq => equivalente, gt => mayor que, lt => menor que
    'name' => ['eq'],
    'type' => ['eq'],
    'email' => ['eq'],
    'address' => ['eq'],
    'city' => ['eq'],
    'state' => ['eq'],
    'postalCode' => ['eq','gt','lt '],
  ];

  # $columnMap se utiliza cuando los nombres de columnas en la base de datos no siguen las convenciones de nomenclatura
  protected $columnMap = [
    'postalCode' => 'postal_code',
  ];

  # Transformamos los operadores de nuestra consulta a los que Eloquent va a necesitar
  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
  ];

}