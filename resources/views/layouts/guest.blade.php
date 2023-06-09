<div>
    <!-- Page Heading -->
    <header>
        <Navbar :user="@js(auth()->user())" :userClient="{{ json_encode(Auth::guard('client')->check()) }}" :userSeller="{{ json_encode(Auth::guard('seller')->check()) }}"/>
    </header>

    <!-- Page Content -->
    <main class="m-6">
        {{ $slot }}
    </main>

    <!-- Page Footer -->
</div>
