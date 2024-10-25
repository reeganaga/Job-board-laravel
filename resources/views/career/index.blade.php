<x-layout>
    @foreach ($careers as $career)
        <x-card class="mb-4">
            {{ $career->title }}
        </x-card>
    @endforeach
</x-layout>
