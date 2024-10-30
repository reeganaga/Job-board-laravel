<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'My Job Applications' => '#',
    ]" />
    @foreach ($applications as $application)
        {{-- <x-job-application-card :$jobApplication /> --}}
        <x-career-card :career="$application->career"></x-career-card>
    @endforeach
</x-layout>
