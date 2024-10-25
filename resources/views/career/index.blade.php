<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index')]" />
    @foreach ($careers as $career)
        <x-career-card :$career>
            <x-link-button :href="route('careers.show', $career)">Show</x-link-button>
        </x-career-card>
    @endforeach
</x-layout>
