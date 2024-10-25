<x-layout>
    @foreach ($careers as $career)
        <x-card class="mb-4">
            {{ $career->title }}
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium">{{ $career->title }}</h2>
                <div class="text-slate-500">
                    $ {{ number_format($career->salary) }}
                </div>
            </div>
            <div class="mb-4 flex justify-between items-center text-sm text-slate-500">
                <div class="flex space-x-4">
                    <div>Company name</div>
                    <div>{{ $career->location }}</div>
                </div>
                <div class="flex space-x-1">
                    <x-tag>
                        {{ $career->experience }}
                    </x-tag>
                    <x-tag>
                        {{ $career->category }}
                    </x-tag>
                </div>
            </div>
            <p class="text-sm text-slate-500">
                {!! nl2br(e($career->description)) !!}
            </p>
        </x-card>
    @endforeach
</x-layout>
