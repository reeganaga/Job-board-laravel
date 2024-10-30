<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'My Job Applications' => '#',
    ]" />
    @forelse ($applications as $application)
        {{-- <x-job-application-card :$jobApplication /> --}}
        <x-career-card :career="$application->career">
            <div class="flex justify-between text-sm text-slate-500 items-center">
                <div>
                    <div>Submitted {{ $application->created_at->diffForHumans() }}</div>
                    <div>Other {{ Str::plural('applicant', $application->career->career_applications_count - 1) }}
                        {{ $application->career->career_applications_count - 1 }} </div>
                    <div>Your expectation: ${{ number_format($application->expected_salary) }}</div>
                    <div>Average salary:
                        ${{ number_format($application->career->career_applications_avg_expected_salary) }}</div>
                </div>
                <div>
                    <form action="{{ route('my-career-applications.destroy', $application) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-button type="submit">Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-career-card>
    @empty
    <div class="border rounded-md border-slate-400 p-4 text-center">
        <div class="text-lg">No applications found.</div>
        <div>Browse all careers <a href="{{ route('careers.index') }}" class="text-ellipsis hover:underline text-blue-600">Here</a></div>
    </div>
    @endforelse
</x-layout>
