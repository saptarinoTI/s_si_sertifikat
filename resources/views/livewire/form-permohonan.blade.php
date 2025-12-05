<div>
    <form wire:submit="create">
        {{ $this->form }}
        
        <button type="submit">
            Kirim Permohonan
        </button>
    </form>
    
    <x-filament-actions::modals />
</div>