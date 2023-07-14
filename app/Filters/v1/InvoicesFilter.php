<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter {

  /**
   * Las claves representan los nombres de los campos o columnas de la base de datos,
   * y los valores son arrays que contienen los operadores permitidos para ese campo en particular.
   */
  protected $safeParms = [
    #  eq => equivalente, gt => mayor que, lt => menor que
    'customerId' => ['eq'],
    'amount' => ['eq', 'lt', 'gt','lte', 'gte'],
    'status' => ['eq','ne'],
    'billedDate' => ['eq', 'lt', 'gt','lte', 'gte'],
    'billedDate' => ['eq', 'lt', 'gt','lte', 'gte'],
  ];

  # $columnMap se utiliza cuando los nombres de columnas en la base de datos no siguen las convenciones de nomenclatura
  protected $columnMap = [
    'customerId' => 'customer_id',
    'billedDate' => 'billed_date',
    'paidDate' => 'paid_date',
  ];

  # Transformamos los operadores de nuestra consulta a los que Eloquent va a necesitar
  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
    'ne' =>'!=',
  ];

}