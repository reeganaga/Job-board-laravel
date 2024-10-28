<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index'), $career->title => '#']" />
    <x-career-card :$career>
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($career->description)) !!}
        </p>
    </x-career-card>
</x-layout>
