<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FreteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $response = Http::withHeaders(['token' => '7EF4937BR1EE4R445FR930CR3212FE9397AD'])
            ->post('https://api.frenet.com.br/shipping/quote', [
                "SellerCEP" => $request->input('SellerCEP'),
                "RecipientCEP" => $request->input('RecipientCEP'),
                "ShippingItemArray" => $request->input('ShippingItemArray'),
                "RecipientCountry" => "BR"
            ]);

        $responseTotalExpress = Http::withHeaders(['token' => '7EF4937BR1EE4R445FR930CR3212FE9397AD'])
            ->post('https://edi.totalexpress.com.br/webservice_calculo_frete_v2.php', [
                "NomeDeUsuario" => "justbeauty-prod",
                "Senha" => "H0XOC3KS3x",
                "TipoServico" => "EXP",
                "CepDestino" => $request->input('RecipientCEP'),
                "Peso" => $request->input('ShippingItemArray.Weight'),
                "Altura" => $request->input('ShippingItemArray.Height'),
                "Largura" => $request->input('ShippingItemArray.Width'),
                "ValorDeclarado" => $request->input('Price'),
                "TipoEntrega" => 0,
            ]);

        info($responseTotalExpress);
        return $responseTotalExpress;
        // return response()->json([
        //     'success' => true,
        //     'response' => ($response->json())
        // ]);
    }
}
