<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Career' => route('careers.index'),
        $career->title => route('careers.show', $career),
        'Apply' => '#',
    ]" />
    <x-career-card :$career />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your career application
        </h2>
        <form action="{{ route('careers.application.store',$career) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">CV</x-label>
                <x-text-input type="file" name="cv" />
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
