<div class="flex h-full w-full flex-col items-center justify-center align-middle">
    <h1 class="text-3xl font-bold py-3">
        Register Scholarship
    </h1>
    <div class=" p-3 border-2 rounded-lg">
        <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
            <label for="nameInput" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">Name</label>
            <input id="nameInput" type="text" wire:model="name"
                class="w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-l focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75"
                name="name" placeholder="Full Name" />
        </div>
        <div class="text-red-500">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
            <label for="emailInput" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">Email</label>
            <input id="emailInput" type="text" wire:model="email" x-on:keydown.enter="$wire.searchUser()"
                class="w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-l focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75"
                name="email" placeholder="example@gmail.com" />
        </div>
        <div class="text-red-500">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
            <label for="phoneInput" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">Phone</label>
            <input id="phoneInput" type="text" wire:model="phone"
                class="w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-l focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75"
                name="phone" placeholder="+62 8xxx xxxx xxxx" />
        </div>
        <div class="text-red-500">
            @error('phone')
                {{ $message }}
            @enderror
        </div>
        <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
            <label for="combo" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">Current Semester</label>
            <select wire:model="semester">
                <option value="" selected>Please Choose</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="text-red-500">
            @error('semester')
                {{ $message }}
            @enderror
        </div>
        <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
            <label for="phoneInput" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">GPA</label>
            <input id="phoneInput" type="text" wire:model="gpa"
                class="w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-l focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75"
                name="phone" placeholder="GPA" disabled />
        </div>
        <div class="text-red-500">
            @error('gpa')
                {{ $message }}
            @enderror
        </div>
        @if ($gpa != null && $gpa >= 3)
            <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
                <label for="combo" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">Scholarship Type</label>
                <select wire:model="choice">
                    <option value="">Please Choose</option>
                    <option value="academic">Academic</option>
                    <option value="non-academic">Non-Academic</option>
                </select>
            </div>
            <div class="text-red-500">
                @error('choice')
                    {{ $message }}
                @enderror
            </div>
            <div class="flex w-full py-3 flex-col sm:flex-row gap-1 text-slate-700 sm:items-center">
                <label for="file" class="sm:w-[30vh] pr-3 pl-0.5 text-l font-semibold">Requirement File</label>
                <input type="file" name="file" wire:model="file">
            </div>
            <div class="text-red-500">
                @error('file')
                    {{ $message }}
                @enderror
            </div>
            <div class="flex w-full py-3 justify-center">
                <button type="submit" wire:click="submit"
                    class="rounded-xl border border-blue-500 bg-blue-500 px-4 py-2 text-white font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Register
                </button>
            </div>
        @elseif ($gpa != null && $gpa < 3)
            <div class="flex w-full py-3 justify-center">
                <p class="text-green-500">
                    Your GPA is below 3.00, you are not eligible for scholarship.
                </p>
            </div>
        @else
            <div class="flex w-full py-3 justify-center">
                <button type="submit" wire:click="searchUser"
                    class="rounded-xl border border-blue-500 bg-blue-500 px-4 py-2 text-white font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </div>
        @endif
    </div>
</div>
