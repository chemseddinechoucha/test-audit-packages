@extends('adminlte::page')

@section('title', 'Audit')

@section('content')
    {{-- Setup data for datatables --}}
    @php
        $heads = [
            'ID',
            'Event',
            'Auditable',
            'Auditable ID',
            'User',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];



        $data = [];
        foreach ($audit ?? [] as $row){

        $btnDetails = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" data-id="'.$row->id.'" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>';
            $data[] = [$row->id,$row->event, $row->auditable_type, $row->auditable_id, $row->user->name, '<nobr>'.$btnDetails.'</nobr>'];
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null,null,null,  ['orderable' => false]],
        ];
    @endphp
    <x-adminlte-card theme="lightblue" theme-mode="outline" title="Users List" class="mt-5">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config"
                              striped hoverable bordered compressed>
        </x-adminlte-datatable>
    </x-adminlte-card>
@stop
