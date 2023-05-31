<div class="w-full">
    <div class="w-full m-auto lg:w-[70%]">
        <div class="border rounded p-4">
            <div class="flex justify-between items-start">
                <p class="m-0 text-lg font-bold text-black">{{ Auth::user()->name }}</p>
                <MyAccount :user="@js(Auth::user())" :address="@js(Auth::user()->address)" />
            </div>
            <div class="sm:grid grid-cols-2 gap-8 mt-2">
                <div>
                    <p class="m-0">E-mail: {{ Auth::user()->email }}</p>
                    <p class="m-0">Aniversário: {{ Auth::user()->birthdate }}</p>
                </div>
                <div>
                    <p class="m-0">Telefone: {{ Auth::user()->cellphone }}</p>
                    <p class="m-0">CPF: {{ Auth::user()->document }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full m-auto lg:w-[70%] mt-6">
        <div class="text-center sm:flex justify-between">
            @if (\Route::current()->getName() == 'pages.mypersonaldata')
            <Link href="{{ route('pages.mypersonaldata') }}" class="w-full text-pink-500 border-b-2 border-pink-500 no-underline font-bold uppercase">Meus endereços</Link>
            @else
            <Link href="{{ route('pages.mypersonaldata') }}" class="w-full font-bold uppercase no-underline">Meus endereços</Link>
            @endif

            <hr class="block sm:hidden my-2">


            @if (\Route::current()->getName() == 'pages.myorders')
            <Link href="{{ route('pages.myorders') }}" class="w-full font-bold uppercase text-pink-500 border-b-2 border-pink-500 no-underline">Meus pedidos</Link>
            @else
            <Link href="{{ route('pages.myorders') }}" class="w-full font-bold uppercase no-underline">Meus pedidos</Link>
            @endif

            <hr class="block sm:hidden my-2">

            @if (\Route::current()->getName() == 'pages.mywishlist')
            <Link href="{{ route('pages.mywishlist') }}" class="w-full font-bold uppercase text-pink-500 border-b-2 border-pink-500 no-underline">Lista de desejos</Link>
            @else
            <Link href="{{ route('pages.mywishlist') }}" class="w-full font-bold uppercase no-underline">Lista de desejos</Link>
            @endif

            <hr class="block sm:hidden my-2">

            <Link href="{{ route('logout') }}" method="POST" class="w-full font-bold uppercase no-underline">Desconectar</Link>

        </div>
    </div>

    <div class="w-full mt-6 m-auto lg:w-[70%]">
        {{ $slot }}
    </div>
</div>