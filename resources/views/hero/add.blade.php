@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: ;">
                    <div class="card-header">Add Hero</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Error!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="id_hero" class="col-md-4 col-form-label text-md-right">Hero ID</label>
                                <div class="col-md-6">
                                    @foreach ($heros as $hero)
                                    @endforeach
                                    <input type="text" class="form-control" name="id_hero" id="id_hero" value="{{ $hero->id_hero+1 }}">                                            
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="nama_hero" class="col-md-4 col-form-label text-md-right">Nama Hero</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama_hero">
                                </div>
                            </div>
                            
                            <div class="form-group row mb-3">
                                <label for="id_role" class="col-md-4 col-form-label text-md-right">Role</label>
                                <div class="col-md-6">
                                    <select name="id_role" required id="id_role" class="form-control">
                                        <option value="" disabled selected>Choose Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id_role }}">{{ $role->nama_role }}</option>
                                        @endforeach
                                    </select>
                                </div>        
                            </div>
                            <div class="form-group row mb-3">
                                <label for="id_element" class="col-md-4 col-form-label text-md-right">Element</label>
                                <div class="col-md-6">
                                    <select name="id_element" required id="id_element" class="form-control">
                                        <option value="" disabled selected>Choose Element</option>
                                        @foreach ($elements as $element)
                                        <option value="{{ $element->id_element }}">{{ $element->nama_element }}</option>
                                        @endforeach
                                    </select>
                                </div>        
                            </div>
                            <div class="col-md-5 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                                <a class="btn btn-danger" href="{{ route('index') }}">Back</a>
                            </div>
                        </form>                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection