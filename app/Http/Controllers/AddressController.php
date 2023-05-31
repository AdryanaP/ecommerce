<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'zipcode' => ['required', 'string', 'max:9'],
            'state' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'street' => ['required', 'string'],
            'number' => ['required', 'string'],
            'complement' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
        ]);

        $address = Address::create([
            'newsletter' => $request->newsletter,
            'zipcode' => $request->zipcode,
            'state' => $request->state,
            'city' => $request->city,
            'district' => $request->district,
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'name' => $request->name,
            'model_type' => User::class,
            'model_id' => $request->user_id,
        ]);

        Toast::title('Novo endereço cadastrado!')
            ->backdrop()
            ->autoDismiss(1);

        if ($address->save()) {
            return new AddressResource($address);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $addresses = $user->addresses;

        
        return $addresses;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'zipcode' => ['required', 'string', 'max:9'],
            'state' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'street' => ['required', 'string'],
            'number' => ['required', 'string'],
            'complement' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
        ]);

        $address = Address::findOrFail($id);
        $address->zipcode = $request->zipcode;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->district = $request->district;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->complement = $request->complement;
        $address->name = $request->name;

        if ($address->save()) {
            return new AddressResource($address);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);

        if ($address->delete()) {
            return new AddressResource($address);
        }
    }
}
