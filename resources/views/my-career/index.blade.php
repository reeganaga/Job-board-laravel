<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'My Careers' => '#',
    ]" />
    <div class="mb-4 text-right">
        <x-link-button :href="route('my-careers.create')">
            New Career
        </x-link-button>
    </div>
    @forelse ($careers as $career)
        <x-career-card :$career>
            @forelse ($career->careerApplications as $application)
                <div class="flex justify-between items-center mb-4 text-xs text-slate-500">
                    <div>
                        <div>{{ $application->user->name }}</div>
                        <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                        <div>Download CSV</div>
                    </div>
                    <div>${{ number_format($application->expected_salary) }}</div>
                </div>

            @empty
                <div class="text-sm text-center text-slate-500">No applications found</div>
            @endforelse
        </x-career-card>
    @empty
        <div>No careers found</div>
    @endforelse
</x-layout>
