<x-card class="mb-4">
    <div class="mb-4 flex justify-between">
        <h2 class="text-lg font-medium">{{ $career->title }}</h2>
        <div class="text-slate-500">
            $ {{ number_format($career->salary) }}
        </div>
    </div>
    <div class="mb-4 flex justify-between items-center text-sm text-slate-500">
        <div class="flex space-x-4">
            <div>{{ $career->employer->company_name }}</div>
            <div>{{ $career->location }}</div>
            @if ($career->deleted_at)
                <span class="text-red-500 border border-red-500 rounded-md px-2">Deleted</span>
            @endif
        </div>
        <div class="flex space-x-1">
            <x-tag>
                <a
                    href="{{ route('careers.index', ['experience' => $career->experience]) }}">{{ Str::ucfirst($career->experience) }}</a>
            </x-tag>
            <x-tag>
                <a href="{{ route('careers.index', ['category' => $career->category]) }}">{{ $career->category }}</a>
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
