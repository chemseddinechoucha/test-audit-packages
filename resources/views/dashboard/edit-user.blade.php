@extends('adminlte::page')

@section('title', 'Edit User')

@section('content')
    <x-adminlte-card theme="lightblue" theme-mode="outline" title="Edit User: {{$user->name}}" class="mt-5">
        <form action="/admin/users/{{$user->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <x-adminlte-input name="name" type="name" placeholder="Name" value="{{$user->name}}"/>
                </div>
                <div class="col-6">
                    <x-adminlte-input name="email" type="email" placeholder="Email" value="{{$user->email}}"/>
                </div>
            </div>
            <x-adminlte-button class="btn-flat float-right" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
        </form>
    </x-adminlte-card>
@stop
