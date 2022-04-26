<main class="app-content">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($edit_page == true)
        @include('livewire.Category.edit')
    @else
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">{{ trans('dashboard.categories') }}</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('dashboard.name') }}</th>
                            <th>{{ trans('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button wire:click="edit({{ $category->id }})" class="btn btn-success"><i
                                            class="fa fa-edit"></i></button>

                                    <button type="button" wire:click="$set('deleteModal',true)" class="btn btn-danger"
                                        data-toggle="modal" data-target="#exampleModal"><i
                                            class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    {{ $categories->links() }}
                </table>
            </div>
        </div>
        @include('livewire.Category.create')

        @if ($deleteModal == true)
            @include('livewire.Category.delete_modal')
        @endif
    @endif

</main>
