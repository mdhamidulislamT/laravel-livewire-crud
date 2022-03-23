<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Title:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="class">Class:</label>
        <input type="text" class="form-control" id="class" placeholder="Enter class" wire:model="class">

        @error('class') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" type="button" class=" mt-3 btn btn-primary  btn-lg"> Save </button>
</form>