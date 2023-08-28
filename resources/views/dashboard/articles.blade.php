@extends('adminlte::page')

@section('title', 'Article')

@section('content')
    {{-- Setup data for datatables --}}
    @php
        $heads = [
            'ID',
            'Owner',
            'Content',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];



        $data = [];
        foreach ($articles ?? [] as $article){
            $btnEdit = '<a href="/admin/articles/'.$article->id.'/edit" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>';
            $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                              <i class="fa fa-lg fa-fw fa-trash"></i>
                          </button>';

            $btns = $btnEdit.$btnDelete;
            $data[] = [$article->id,$article->owner->name,\Illuminate\Support\Str::words($article->content, 15,'...'),  '<nobr>'.$btns.'</nobr>'];
        }

        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp
    <x-adminlte-card theme="lightblue" theme-mode="outline" title="Article List" class="mt-5">
        <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config"
                              striped hoverable bordered compressed>
        </x-adminlte-datatable>
    </x-adminlte-card>

@stop
