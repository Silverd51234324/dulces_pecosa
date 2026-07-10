<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Organización de Ventas</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-slate-900 text-slate-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800">

        <div class="p-6 border-b border-slate-800">

            <h1 class="text-xl font-bold text-green-400">

                Sistema de Ventas

            </h1>

            <p class="text-sm text-slate-400 mt-1">

                Organización de negocio

            </p>

        </div>


        <nav class="p-4 space-y-2">

            <a href="/"
                class="block px-4 py-3 rounded-lg hover:bg-slate-800">

                🏠 Dashboard

            </a>

            <a href="/products"
                class="block px-4 py-3 rounded-lg hover:bg-slate-800">

                📦 Productos

            </a>

            

            <a href="/stores"
                class="block px-4 py-3 rounded-lg hover:bg-slate-800">

                🏪 Tiendas

            </a>

            <a href="/customers"
                class="block px-4 py-3 rounded-lg hover:bg-slate-800">

                👥 Clientes

            </a>

            

            <a href="/finances"
                class="block px-4 py-3 rounded-lg hover:bg-slate-800">

                📈 Rendimientos

            </a>

        </nav>

    </aside>


    <!-- Contenido -->
    <div class="flex-1 flex flex-col">

        <!-- Barra superior -->
        <header class="bg-slate-950 border-b border-slate-800">

            <div class="px-8 py-4 flex justify-between items-center">

                <h2 class="text-xl font-semibold">

                    Sistema de Organización de Ventas

                </h2>

                <span class="text-green-400">

                    ● En línea

                </span>

            </div>

        </header>


        <!-- Contenido -->
                <main class="flex-1 p-8 bg-slate-900">

            @yield('content')

        </main>


        @stack('scripts')


    </div>

</div>

</body>

</html>