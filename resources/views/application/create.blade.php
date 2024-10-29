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
        <form action="{{ route('careers.application.store',$career) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-slate-900" for="expected_salary">Expected Salary</label>
                <x-text-input type="number" name="expected_salary" />
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
