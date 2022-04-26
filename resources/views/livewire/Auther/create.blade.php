<h3 class="tile-title">{{ trans('dashboard.add_new_auther') }}</h3>


<div class="clearfix"></div>
<div class="col-md-12" wire:ignore.self>
    <div class="tile">
        <h3 class="tile-title">{{ trans('dashboard.authers') }}</h3>

        <form wire:submit.prevent="create" class="borderd">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('dashboard.name') }}</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('dashboard.description') }}</label>
                <textarea wire:model="description" class="form-control"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" x-data="{ src: '{{ asset('uploads/images/authers/default_auther.png') }}' }">
                <label for="image">{{ __('dashboard.image') }}</label>
                <input type="file" class="form-control " wire:model="image"  
                    @change="src = URL.createObjectURL($event.target.files[0])">
                <img :src="src" class="img-thumbnail my-2" width="120">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                {{ trans('dashboard.add') }}
            </button>
        </form>

    </div>
</div>
