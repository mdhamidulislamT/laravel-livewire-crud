<form>
    <input type="hidden" wire:model="student_id">
    <div class="form-group">
        <label for="name">Title:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name"
            wire:model="name">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Class:</label>

            <input type="text" class="form-control" id="class" wire:model="class"
            placeholder="Enter Class">
        @error('class')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
