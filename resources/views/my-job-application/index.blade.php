<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'My Job Applications' => '#',
    ]" />
    @foreach ($applications as $application)
        {{-- <x-job-application-card :$jobApplication /> --}}
        <x-career-card :career="$application->career">
            <div class="flex justify-between text-sm text-slate-500 items-center" >
                <div>
                    <div>Submitted {{ $application->created_at->diffForHumans() }}</div>
                    <div>Other {{Str::plural('applicant', $application->career->career_applications_count - 1) }} {{$application->career->career_applications_count - 1}} </div>
                    <div>Your expectation: ${{ number_format($application->expected_salary) }}</div>
                    <div>Average salary: ${{ number_format($application->career->career_applications_avg_expected_salary) }}</div>
                </div>
                <div>right</div>
            </div>
        </x-career-card>
    @endforeach
</x-layout>
