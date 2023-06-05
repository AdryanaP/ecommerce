<x-guest-layout>
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <h1 class="mt-4 text-lg font-bold tracking-tight text-gray-900 sm:text-2xl">Email Confirmado!</h1>
            <p class="mt-6 text-lg leading-7 text-gray-600">1.000 créditos foram adicionados na sua conta 🎉</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <Link href="{{ route('welcome') }}" class="rounded-md bg-pink-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-pink-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500">Continue navegando!</Link>
            </div>
        </div>
    </main>
</x-guest-layout>