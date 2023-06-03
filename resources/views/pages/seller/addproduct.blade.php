<x-guest-layout>
    
    <AddProducts :sellerId="@js(Auth::user()->id)"/>

</x-guest-layout>