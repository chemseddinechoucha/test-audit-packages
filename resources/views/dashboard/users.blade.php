@extends('adminlte::page')

@section('title', 'Users')

@section('content')
    {{-- Setup data for datatables --}}
    @php
        $heads = [
            'ID',
            'Name',
            ['label' => 'Email', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];



        $data = [];
        foreach ($users ?? [] as $user){

        $btnEdit = '<a href="/admin/users/'.$user->id.'/edit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>';
        $btnDelete = '<button class="btn btn-xs btn-default delete-user text-danger mx-1 shadow" title="Delete"  data-toggle="modal" data-target="#modalDelete" data-id="'.$user->id.'">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';

        $btns = $btnEdit.$btnDelete;
            $data[] = [$user->id,$user->name, $user->email,  '<nobr>'.$btns.'</nobr>'];
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp

    <x-adminlte-card theme="lightblue" theme-mode="outline" title="Users List" class="mt-5">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config"
                              striped hoverable bordered compressed>
        </x-adminlte-datatable>
    </x-adminlte-card>
    <x-adminlte-modal id="modalDelete" title="Delete user" theme="danger">
        <form action="#" method="post" id="deleteForm">
            @method('delete')
            @csrf
            <h3 class="text-center warning-message"></h3>
            <div class="text-center">
                <button class="btn btn-danger" type="button">No</button>
                <button class="btn btn-success" type="submit">Yes</button>
            </div>
        </form>

    </x-adminlte-modal>
@stop

@section('js')
    <script type="text/javascript">
            $(function(){
                $(document).on('click', '.delete-user', function(){
                    const id = $(this).data('id')
                    $('.warning-message').text(`Are you sure you want to delete this user with id: ${id}?`)
                    $('#deleteForm').attr('action', '/admin/users/'+id)
                })
            })
    </script>
@stop
