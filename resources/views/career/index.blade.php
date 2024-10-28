<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index')]" />
    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="searchForm" action="{{ route('careers.index') }}" method="get">
            <div class=" grid grid-cols-2 gap-4">
                <div>
                    <div class="font-medium mb-1">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search..."
                        form-ref="searchForm" />
                </div>
                <div>
                    <div class="font-medium mb-1">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}"
                            placeholder="Min Salary..." form-ref="searchForm" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}"
                            placeholder="Max Salary..." form-ref="searchForm" />
                    </div>
                </div>
                <div>
                    <div class="font-medium mb-1">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\Career::$experience),
                        \App\Models\Career::$experience,
                    )" />
                </div>
                <div>
                    <div class="font-medium mb-1">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Career::$category" />
                </div>
            </div>
            <x-button class="w-full mt-4">Filter</x-button>
        </form>
    </x-card>
    @foreach ($careers as $career)
        <x-career-card :$career>
            <x-link-button :href="route('careers.show', $career)">Show</x-link-button>
        </x-career-card>
    @endforeach
</x-layout>
