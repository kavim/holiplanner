<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link href="https://unpkg.com/torchlight-api/torchlight.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <main class="container mx-auto p-6">
        <div class="bg-black text-white">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2"></div>
                    </header>
                    <div class="flex items-center justify-center mt-36 mb-36">
                        <h1 class="text-5xl font-bold mb-6">API Documentation</h1>
                    </div>
                    <div class="">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>
