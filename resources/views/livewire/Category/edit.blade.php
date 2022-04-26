<h3 class="tile-title">{{ trans('dashboard.edit_user') }}</h3>


<div class="clearfix"></div>
<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">{{ trans('dashboard.users') }}</h3>
        <button wire:click="$set('edit_page',false)" type="submit" class="btn btn-danger">
            {{ trans('dashboard.back') }}
        </button>
        <form wire:submit.prevent="update">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ trans('dashboard.name') }}</label>
                <input type="text" class="form-control" wire:model="name">

            </div>


            <button type="submit" class="btn btn-success">
                {{ trans('dashboard.edit') }}
            </button>
        </form>

    </div>
</div>
