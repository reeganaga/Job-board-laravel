<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index')]" />
    <x-card class="mb-4">
        <div class="text-sm grid grid-cols-2 gap-4">
            <div>
                <div class="font-medium mb-1">Search</div>
                <x-text-input name="search" placeholder="Search..." />
            </div>
            <div class="">
                <div class="font-medium mb-1">Salary</div>
                <div class="flex space-x-2">
                    <x-text-input name="min_salary" value="" placeholder="Min Salary..." />
                    <x-text-input name="max_salary" value="" placeholder="Max Salary..." />
                </div>
            </div>
            <div>3</div>
        </div>
    </x-card>
    @foreach ($careers as $career)
        <x-career-card :$career>
            <x-link-button :href="route('careers.show', $career)">Show</x-link-button>
        </x-career-card>
    @endforeach
</x-layout>
