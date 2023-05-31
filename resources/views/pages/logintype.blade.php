<x-guest-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex-none md:flex justify-between gap-32">

            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold">Possui uma conta de cliente?</h2>

                <hr class="my-8 border-1 border-black">

                <div>
                    <Link href="{{ route('login') }}" class="inline-flex uppercase font-bold justify-center mt-5 items-center rounded-sm border border-pink-500 px-3 py-3 leading-4 text-pink-500 hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                    Entre em sua conta aqui
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    </Link>
                </div>

            </div>

            <div class="w-full md:w-1/2 mt-10 sm:mt-0">
                <h2 class="text-3xl font-bold">Possui uma conta de vendedor?</h2>

                <hr class="my-8 border-1 border-black">

                <div>
                    <Link href="{{ route('login.seller') }}" class="inline-flex uppercase font-bold justify-center mt-5 items-center rounded-sm border border-pink-500 px-3 py-3 leading-4 text-pink-500 hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                    Entre em sua conta aqui
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    </Link>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>