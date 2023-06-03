<x-guest-layout>
    <div class="max-w-4xl mx-auto pt-10 pb-10 px-4 sm:px-6 lg:px-8 space-y-4 prose text-justify">

        @if($order->type === 'card')
        <div>
            <h2 class="text-center text-2xl lg:text-3xl font-semibold tracking-tight">Estamos processando o <br> pagamento da sua compra</h2>

            <hr class="my-8 border-white/10">

            <div class="mt-8 max-w-xl mx-auto">
                <p class="text-sm">Seu pedido está sendo processado pelo nosso sistema e logo você receberá um email de confirmação. (leva só 30 segundinhos 😉)</p>

                <div class="mt-6 ring-1 ring-gray-400 sm:mx-0 rounded-lg">
                    <table class="min-w-full">
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm  sm:pl-6">Status:</td>
                                <td class="px-3 py-3.5 text-sm text-green-500 lg:table-cell">
                                    <span class="inline-flex items-center rounded bg-white/10 px-2 py-0.5 text-xs font-medium text-green-500">
                                        <svg class="mr-1.5 h-2 w-2 text-green-400 animate-pulse" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3"></circle>
                                        </svg>
                                        Processando
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm  sm:pl-6">
                                    Número:
                                </td>
                                <td class="px-3 py-3.5 text-sm text-gray-400 lg:table-cell">
                                    #{{ $order->id }}
                                </td>
                            </tr>
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm  sm:pl-6">
                                    Tipo:
                                </td>
                                <td class="px-3 py-3.5 text-sm text-gray-400 lg:table-cell">
                                    Cartão de crédito
                                </td>
                            </tr>
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm  sm:pl-6">
                                    Valor:
                                </td>
                                <td class="px-3 py-3.5 text-sm text-gray-400 lg:table-cell">
                                    R$ {{ number_format($order->total, 2, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm  sm:pl-6">
                                    Cartão:
                                </td>
                                <td class="px-3 py-3.5 text-sm text-gray-400 lg:table-cell">
                                    final {{ $order->payment_action->card_last4 }}
                                </td>
                            </tr>
                            <tr>
                                <td class="relative py-4 pl-4 pr-3 text-sm  sm:pl-6">
                                    Finalizado em:
                                </td>
                                <td class="px-3 py-3.5 text-sm text-gray-400 lg:table-cell">
                                    {{ $order->created_at->format('d/m/Y \à\s H:i') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="rounded-md bg-yellow-50 px-4 mt-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm text-yellow-700">
                                <p>Fique atento ao seu email, avisaremos por lá quando o pagamento for processado!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($order->type === 'pix')
        <div>
            <h2 class="text-center text-2xl lg:text-3xl font-semibold tracking-tight">Aguardando o<br> pagamento via PIX</h2>

            <hr class="my-8 border-white/10">

            <div class="mt-8 max-w-xl mx-auto">
                <div class="flex items-center justify-center">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $order->payment_action->pix_qrcode }}&amp;size=250x250" alt="">
                </div>

                <div class="px-4 mt-4">
                    <div class="max-w-[230px] mx-auto">
                        <button onclick="copyToClipboard('{!! $order->payment_action->pix_qrcode !!}')" class="cursor-pointer mx-auto text-white uppercase text-sm bg-pink-500 whitespace-nowrap font-medium flex justify-center items-center rounded-md py-2 px-4">
                            Copiar e pagar
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="rounded-md bg-yellow-50 px-4 mt-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm text-yellow-700">
                                <p>Fique atento ao seu email, avisaremos por lá quando o pagamento for processado!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($order->type === 'boleto')
        <div>
            <h2 class="text-center text-2xl lg:text-3xl font-semibold tracking-tight">Aguardando o<br> pagamento via Boleto</h2>

            <hr class="my-8 border-white/10">

            <div class="px-4 mt-4">
                <div class="max-w-[230px] mx-auto">
                    <a href="{{ $order->payment_action->boleto_link }}" target="_blank" class="cursor-pointer uppercase text-sm bg-pink-500 text-white whitespace-nowrap font-medium flex justify-center items-center rounded-md py-2 px-4">
                        Baixar boleto
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endif

    </div>
</x-guest-layout>