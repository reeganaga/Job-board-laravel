<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index'), $career->title => '#']" />
    <x-career-card :$career />

</x-layout>
