<div>
   <h1 class="text-3xl">Support Ticket</h1>
   @forelse($tickets as $ticket)
        <div class="rounded border shadow p-3 {{ $active == $ticket->id  ? 'bg-green-200' : ''}} my-2" 
        wire:click="$dispatch('ticketSelected', { ticketId: {{ $ticket->id }} })"
        >
            <p class="text-grey-800">
            {{ $ticket->question }}
            </p>
        </div>
        @empty
        <p>No items found.</p>
    @endforelse
</div>
