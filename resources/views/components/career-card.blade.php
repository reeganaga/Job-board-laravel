<x-card class="mb-4">
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
                {{ Str::ucfirst($career->experience) }}
            </x-tag>
            <x-tag>
                {{ $career->category }}
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
