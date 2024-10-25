<x-layout>
    @foreach ($careers as $career)
        <div>{{ $career->title }}</div>
    @endforeach
</x-layout>
