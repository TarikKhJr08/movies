{{-- <a class="">
    <img src=" {{ asset('images/logo.jpg') }} " alt="" >
    Movies
</a> --}}



<a href="{{ route('movie.home') }}" class="flex items-center">
    <img src="{{ asset('images/logo.jpg') }}" alt="Flowbite Logo"  height="60" width="60" />
    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Movies</span>
</a>

