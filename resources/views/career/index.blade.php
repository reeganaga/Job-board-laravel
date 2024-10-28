<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Careers' => route('careers.index')]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('careers.index') }}" method="get">
            <div class=" grid grid-cols-2 gap-4">
                <div>
                    <div class="font-medium mb-1">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search..." />
                </div>
                <div class="">
                    <div class="font-medium mb-1">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}"
                            placeholder="Min Salary..." />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}"
                            placeholder="Max Salary..." />
                    </div>
                </div>
                <div>
                    <div class="font-medium mb-1">Experience</div>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="" @checked(!request('experience')) />
                        <span class="ml-2">All</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="entry" @checked(request('experience') === 'entry') />
                        <span class="ml-2">Entry</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="intermediate" @checked(request('experience') === 'intermediate') />
                        <span class="ml-2">Intermediate</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="senior" @checked(request('experience') === 'senior') />
                        <span class="ml-2">Senior</span>
                    </label>
                </div>
                <div>3</div>
            </div>
            <button class="btn btn-primary w-full mt-4">Filter</button>
        </form>
    </x-card>
    @foreach ($careers as $career)
        <x-career-card :$career>
            <x-link-button :href="route('careers.show', $career)">Show</x-link-button>
        </x-career-card>
    @endforeach
</x-layout>
