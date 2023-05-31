<div>
    <!-- Page Heading -->
    <header>
        <Navbar :userClient="{{ json_encode(Auth::guard('client')->check()) }}" :userSeller="{{ json_encode(Auth::guard('seller')->check()) }}"/>
        <div class="flex justify-between max-w-7xl mx-auto pt-2 pb-2 sm:pb-0 px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <Search />
            </div>
        </div>

    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Page Footer -->
</div>
