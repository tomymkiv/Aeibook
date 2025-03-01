<html lang="en">
<x-head />

<body class="bg-black/90 h-screen flex flex-col justify-stretch lg:justify-center">
    <main class="p-5 flex items-center flex-col lg:flex-row mt-8 lg:mt-0">
        <div class="hidden lg:flex m-auto p-5 lg:p-0 lg:w-1/2 flex justify-center">
            <img src="{{Vite::asset('resources/logo/png/logo-no-background.png')}}" width="60%" />
        </div>
        <div class="flex flex-col justify-center w-full lg:w-1/2">
            <div class="my-10 text-center lg:text-start">
                <h1 class="text-4xl text-white/80">{{ $headingTitle }} </h1>
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
