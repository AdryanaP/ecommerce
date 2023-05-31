<x-guest-layout>

    <x-splade-form action="{{ route('checkout.pay') }}" class="mx-auto max-w-5xl px-4 pt-14 pb-24 sm:px-6 lg:px-8">

        <h3 class="uppercase font-bold text-2xl text-center mb-10">Finalizar Pagamento</h3>

        <!-- <CheckoutForm :form="form" :cart="@js($cartItems)" :user="@js(auth()->user())" /> -->
        <Payment :form="form" :cartItems="@js($cartItems)" :user="@js($user)" :amount="@js($amount)" />

    </x-splade-form>

</x-guest-layout>