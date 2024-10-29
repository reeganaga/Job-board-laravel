<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index'), $career->title => '#']" />
    <x-career-card :$career>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($career->description)) !!}
        </p>
        <x-link-button :href="route('careers.application.create', $career)">
            Apply
        </x-link-button>
    </x-career-card>
    <x-card class="mb-4">
        <h2>Other Careers of {{ $career->employer->company_name }}</h2>
        @foreach ($career->employer->careers as $otherCareer)
            <a href="{{ route('careers.show', $otherCareer) }}" class="">
                <div class="flex justify-between mb-2 items-center hover:bg-slate-200 p-2 hover:rounded-md">
                    <div>
                        <div class="text-slate-600 text-sm">{{ $otherCareer->title }}</div>
                        <div class="text-xs">{{ $otherCareer->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="text-xs font-bold">${{ number_format($otherCareer->salary) }}</div>
                </div>
            </a>
        @endforeach

    </x-card>
</x-layout>
