<div class="flex justify-center">
    <div class="w-11/12">
        <h1 class="my-10 text-3xl">Comments</h1>
        @error('newComment')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        @if(session('message'))
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            {{ session('message')}}
        </div>
        @endif
        <section>
            @if($image)
            <img src="{{ $image }}" width="100" height="100">
            @endif
            <input type="file" id="image" wire:change="fileChosen">
        </section>
        <form class="my-4 flex" wire:submit.prevent="addComment">
            <input type="text" wire:model.debounce.500ms="newComment" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind.">
            <div class="py-2">
            <button class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
            </div>
        </form>
        @forelse($comments as $comment)
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-between my-2">
                <div class="flex">
                    <p class="font-bold text-lg">{{ $comment->user->name }}</p>
                    <p class="mx-3 py-1 text-xs text-grey-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="remove({{ $comment->id }})"></i>
            </div>
            
            <p class="text-grey-800">
            {{ $comment->body }}
            </p>
            @if ($comment->image )
            <img src="{{ $comment->ImagePath }}" width="100" height="100">
            @endif
        </div>
        @empty
        <p>No items found.</p>
    @endforelse
    {{ $comments->links() }}
    </div>
</div>
