<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Login Time</h1>
        <hr>
        <form action="" class="my-4" wire:submit.prevent="submit">
            
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" wire:model="form.email"  class="p-2 rounded border shadow-sm w-full" placeholder="Email">
                    <span class="text-red-500 text-xs">
                        @error('form.email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="password" wire:model="form.password"  class="p-2 rounded border shadow-sm w-full" placeholder="Password">
                    <span class="text-red-500 text-xs">
                        @error('form.password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="submit"  class="p-2 bg-gray-800 text-white rounded tracking-wider cursor-pointer w-full" value="Login">
                </div>
            </div>
        </form>
    </section>
</div>
