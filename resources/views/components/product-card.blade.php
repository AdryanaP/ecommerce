<div class="mt-10">
    <Link href="{{ route('pages.product', $product->slug) }}" class="col-span-1 mt-12 text-start cursor-pointer">
    <img src="{{ $product->image?->link }}" class="h-52 w-52 mx-auto object-cover" alt="">
    @if($product->subproducts->count() > 1)
    <div class="text-center bg-gray-100 py-2">
          <span>+{{$product->subproducts->count() }} opções</span>
    </div>
    @else
    <div class="h-10"></div>
    @endif
    <span class="block font-bold mt-4 h-[45px]">{{ $product->name }}</span>
    <span class="block mt-2 h-[40px] text-sm">{{ $product->subproducts->count() ? $product->subproducts[0]->name_br : $product->name_br }}</span>

    <!-- <div class="flex flex-wrap justify-center items-center content-start mt-3 gap-1 h-28">
        @foreach($product->subproducts as $subproduct)
        <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer hover:ring hover:ring-black hover:ring-inset">
            <span style="background-color: {{ $subproduct->color?->color_hex }}" class="h-7 w-7 border border-black border-opacity-10 rounded-full"></span>
        </label>
        @endforeach
    </div> -->
    <div class="grow">
        <a class="mt-4 w-full uppercase font-bold justify-center text-sm inline-flex items-center rounded-sm px-3 py-3 leading-4 bg-pink-500 text-white focus:outline-none">
            Comprar agora
            <span class="h-6"></span>
        </a>
    </div>
    </Link>
</div>
