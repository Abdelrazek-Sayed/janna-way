<h3 class="tile-title">{{ trans('dashboard.add_new_auther') }}</h3>


<div class="clearfix"></div>
<div class="col-md-12" wire:ignore.self>
    <div class="tile">
        <h3 class="tile-title">{{ trans('dashboard.authers') }}</h3>

        <form wire:submit.prevent="create">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('dashboard.name') }}</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                {{ trans('dashboard.add') }}
            </button>
        </form>

    </div>
</div>
