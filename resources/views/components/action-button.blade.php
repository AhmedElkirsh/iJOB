@props(['action', 'method' => 'POST', 'class' => 'btn btn-primary'])



<form action="{{ $action }}" method="{{ $method ?? 'POST' }}">
    @csrf
    <button class="{{ $class ?? 'btn btn-primary' }}">
        {{ $slot }}
    </button>
</form>
