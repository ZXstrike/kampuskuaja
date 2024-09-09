<div class="w-full max-w-xs flex  gap-1" x-on:keydown="highlightFirstMatchingOption($event.key)"
    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false" {{ $attributes }}>
    <div class="w-full relative">

        <!-- trigger button  -->
        <button type="button" role="combobox"
            class="inline-flex w-full items-center justify-between gap-2 whitespace-nowrap border-slate-300 bg-slate-100 px-4 py-2 text-sm font-medium capitalize tracking-wide text-slate-700 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 /50  dark:focus-visible:outline-blue-600 rounded-xl border"
            aria-haspopup="listbox" aria-controls="industriesList" x-on:click="isOpen = ! isOpen"
            x-on:keydown.down.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true"
            x-on:keydown.space.prevent="openedWithKeyboard = true"
            x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'"
            x-bind:aria-expanded="isOpen || openedWithKeyboard">
            <span class="text-sm font-normal" x-text="selectedOption ? selectedOption.value : 'Please Choose'"></span>
            <!-- Chevron  -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                <path fill-rule="evenodd"
                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <!-- hidden input to grab the selected value  -->
        <input id="comboboxs" name="comboboxs" type="text" x-ref="hiddenTextField" {{ $attributes }} />
        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList"
            class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto border-slate-300 bg-slate-100 py-1.5  rounded-xl border"
            role="listbox" aria-label="industries list" x-on:click.outside="isOpen = false, openedWithKeyboard = false"
            x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()"
            x-transition x-trap="openedWithKeyboard">
            <template x-for="(item, index) in options" x-bind:key="item.value">
                <li class="combobox-option inline-flex cursor-pointer justify-between gap-6 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/5 focus-visible:text-black focus-visible:outline-none"
                    role="option" x-on:click="setSelectedOption(item)"
                    x-bind:id="'option-' + index" tabindex="0">
                    <!-- Label  -->
                    <span x-bind:class="selectedOption == item ? 'font-bold' : null" x-text="item.label"></span>
                    <!-- Screen reader 'selected' indicator  -->
                    <span class="sr-only" x-text="selectedOption == item ? 'selected' : null"></span>
                    <!-- Checkmark  -->
                    <svg x-cloak x-show="selectedOption == item" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        stroke="currentColor" fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </li>
            </template>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('combobox', (comboboxData = {
            options: [],
            selectedOption: null,
        }, ) => ({
            options: comboboxData.options,
            isOpen: false,
            openedWithKeyboard: false,
            selectedOption: null,
            setSelectedOption(option) {
                this.selectedOption = option
                this.isOpen = false
                this.openedWithKeyboard = false
                this.$refs.hiddenTextField.value = option.value
            },
            highlightFirstMatchingOption(pressedKey) {
                const option = this.options.find((item) =>
                    item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
                )
                if (option) {
                    const index = this.options.indexOf(option)
                    const allOptions = document.querySelectorAll('.combobox-option')
                    if (allOptions[index]) {
                        allOptions[index].focus()
                    }
                }
            },
        }))
    })
</script>
