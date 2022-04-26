<main class="app-content">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($edit_page == true)
        @include('livewire.Auther.edit')
    @else
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">{{ trans('dashboard.authers') }}</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">{{ trans('dashboard.name') }}</th>
                            <th class="text-center">{{ trans('dashboard.description') }}</th>
                            <th class="text-center">{{ trans('dashboard.image') }}</th>
                            <th class="text-center">{{ trans('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authers as $auther)
                            <tr>
                                <td class="text-center">{{ $auther->iteration }}</td>
                                <td class="text-center">{{ $auther->name }}</td>
                                <td class="text-center">{!! $auther->description !!}</td>
                                <td class="text-center">
                                    <img width="100" height="70"
                                        src="{{ asset('uploads/images/authers/' . $auther->image) }}"
                                        alt="{{ $auther->name }}">
                                </td>
                                <td class="text-center">
                                    <button wire:click="edit({{ $auther->id }})" class="btn btn-success"><i
                                            class="fa fa-edit"></i></button>
                                    <button wire:click="delete({{ $auther->id }})" class="btn btn-danger"><i
                                            class="fa fa-trash"></i></button>

                                    {{--  <button type="button" wire:click="$set('deleteModal',true)" class="btn btn-danger"
                                        data-toggle="modal" data-target="#exampleModal"><i
                                            class="fa fa-trash"></i></button>  --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    {{ $authers->links() }}
                </table>
            </div>
        </div>
        @include('livewire.Auther.create')

        @if ($deleteModal == true)
            @include('livewire.Auther.delete_modal')
        @endif
    @endif

</main>
