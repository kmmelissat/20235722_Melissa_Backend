<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Pago</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #4a4a4a;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #4facfe;
            margin-bottom: 15px;
        }
        .content p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .details {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background: #f8faff;
        }
        .details p {
            margin: 5px 0;
            font-size: 12px;
        }
        .table-container {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        table th, table td {
            border: 1px solid #e0e0e0;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f7fc;
            color: #4a4a4a;
            font-weight: 600;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f9fafb;
        }
        table tfoot tr th {
            background-color: #f4f7fc;
            font-size: 16px;
            font-weight: 700;
        }
        .footer {
            background: #f1f1f1;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #666;
            border-radius: 0 0 10px 10px;
        }
        .footer a {
            color: #4facfe;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Gracias por tu compra!</h1>
        </div>
        <div class="content">
            <h2>Detalles del Pago</h2>
            <p>Hola <strong>{{$customer}}</strong>,</p>
            <p>Hemos recibido tu pago exitosamente. Estos son todos los detalles de tu compra:</p>

            <div class="details">
                <p><strong>Fecha de Compra:</strong>{{$created_at}}</p>
                <p><strong>Correo Electrónico:</strong>{{$email}}</p>
                <p><strong>Número de Orden:</strong> {{$order_number}}</p>
                <p><strong>Método de Pago:</strong> {{$payment_method}}</p>
                <p><strong>Estado del Pago:</strong>{{$order_status}}</p>
            </div>

            <p>A continuación verás desglosado los precios y el total del producto:</p>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['quantity'] }}</td>
                                <td>${{$product['price']}}</td>
                                <td>${{$product['subtotal']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th>${{$total}}</th> 
                        </tr>
                    </tfoot>
                </table>
            </div>

            <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos respondiendo a este correo.</p>

            <p>¡Gracias por confiar en nosotros!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ now()->format('Y') }} Melissa's. Todos los derechos reservados.</p>
            <p><a href="[URL Política de Privacidad]">Política de Privacidad</a> | <a href="[URL Soporte]">Soporte</a></p>
        </div>
    </div>
</body>
</html>
