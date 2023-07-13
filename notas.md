##### ENLACE DEL VIDEO ####
>https://youtu.be/YGqCZjdgJJk


Al utilizar prefijos definidos como en el siguiente ejemplo:

>Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\v1'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
});

Estamos creando de forma versatil las rutas en relacion a la versión que usaremos:
![Alt text](image-1.png)