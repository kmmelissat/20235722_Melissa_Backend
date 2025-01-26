<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailPreviewController extends Controller
{
   public function __invoke() {
       request()->validate([
           'customer' => ['required', 'string'],
           'email' => ['required', 'email'], // Fixed typo here
           'payment_method' => ['required', 'in:1,2,3'],
           'products' => ['required', 'array'], // Added array validation
           'product.*.name' => ['required', 'string', 'max:50'], // Added validation for product name
           'product.*.price' => ['required', 'numeric', 'gt:0'], // Added validation for product price
           'products.*.quantity' => ['required', 'gte:1','integer'], // Fixed typo here
       ]);

       $request = request()->all();

       $data = [
        'customer' => $request['customer'],
        'created_at' => now()->format('Y-m-d H:i'),
        'email' => $request['email'],
        'order_number' => 'RB'.now()->format('Y').now()->format('m')."-".rand(1,100),
        'payment_method' => match ($request['payment_method']) {
            1=> 'Transferencia Bancaria',
            2=> 'Contraentrega',
            3=> 'Tarjeta de Credito',
        },
        'order_status' => match ($request['payment_method']) {
            1=> 'Pendiente',
            2=> 'En proceso',
            3=> 'Pagado',
        },
        'products' => $request['products'],
       ];

       return view('EmailPreview', $data); // Added semicolon here
   }
}
