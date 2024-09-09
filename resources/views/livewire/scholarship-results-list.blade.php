<div class="flex h-full w-full flex-col items-center align-middle overflow-x-scroll">
    <h1 class="text-3xl font-bold p-3">
        Scholarship Result
    </h1>
    @foreach ( $scholarships as $scholarship )
    <div class=" p-3 border-2 rounded-lg my-2">
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">Name: </span>
            <span class="w-full">{{ $scholarship->name }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">Email: </span>
            <span class="w-full">{{ $scholarship->email }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">Phone: </span>
            <span class="w-full">{{ $scholarship->phone }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">Semester: </span>
            <span class="w-full">{{ $scholarship->semester }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">GPA: </span>
            <span class="w-full">{{ $scholarship->gpa }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">Choice: </span>
            <span class="w-full">{{ $scholarship->choice }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">File: </span>
            <span class="w-full">{{ $scholarship->file }} </span>
        </div>
        <div class="flex flex-row gap-1 py-2">
            <span class="sm:w-[30vh] font-bold">Status: </span>
            <span class="w-full">{{ $scholarship->status }} </span>
        </div>
    </div>
    @endforeach
</div>
