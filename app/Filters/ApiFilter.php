<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {

  /**
   * Las claves representan los nombres de los campos o columnas de la base de datos,
   * y los valores son arrays que contienen los operadores permitidos para ese campo en particular.
   */
  protected $safeParms = [];

  # $columnMap se utiliza cuando los nombres de columnas en la base de datos no siguen las convenciones de nomenclatura
  protected $columnMap = [];

  # Transformamos los operadores de nuestra consulta a los que Eloquent va a necesitar
  protected $operatorMap = [];

  # Aqui transformaremos la cadena de consulta a una cadena que pueda ser entendida por ELOQUENT
  public function transform(Request $request)
  {
    $eloQuery = [];

    # iteramos sobre nuestros parametros seguros
    foreach ($this->safeParms as $parm => $operators){
      $query = $request->query($parm);

      if(!isset($query))
        continue;

      # Si no es null, se asigna el valor extraido de columnMap, si es null, se asigna $parm
      $column = $this->columnMap[$parm] ?? $parm;

      foreach($operators as $operator){

        # Si el operator esta permitido para el campo consultado
        if (isset($query[$operator])){
          # [column, operadorRealAUsar, valorComparación]
          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
      }

    }

    return $eloQuery;
  }

}