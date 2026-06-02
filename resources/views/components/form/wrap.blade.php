@props([
    'action',
    'title',
    'method' => 'POST'
])

<x-layout :title="$title">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-sm">
        <h1 class="main-header">{{ $title }}</h1>
        <form action="{{ $action }}" method="POST">
            @csrf
            @method($method)
            {{ $slot }}
        </form>
    </div>
</x-layout>
