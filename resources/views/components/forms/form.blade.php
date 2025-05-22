<form {{ $attributes(["class" => "max-w-7xl mx-auto px-3 sm:px-6 lg:px-8", "method" => "GET"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif

    {{ $slot }}
</form>