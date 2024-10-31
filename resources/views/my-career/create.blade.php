<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'My Careers' => route('my-careers.index'),
        'New Career' => "#",
    ]" />
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Create Career
        </h2>
        <form action="{{ route('my-careers.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-label for="title" :required="true">Title</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input type="textarea" name="description" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input type="number" name="salary" />
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group :all_option="false" name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\Career::$experience),
                        \App\Models\Career::$experience,
                    )" />
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group :all_option="false" name="category" :options="\App\Models\Career::$category" />
                </div>

            </div>
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>
