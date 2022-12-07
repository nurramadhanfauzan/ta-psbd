@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color:;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <a class="navbar-brand">Heroes</a>
                                </div> 
                                
                                
                              
                                <div class="pull-right">
                                    <form action="{{ route('search') }}" method="GET" >
                                        <input style="position: relative; width: 250px; right: 5px;" type="search" name="search" placeholder="Type keyword..." value="{{ Request::get('search')}}">
                                        <button class="btn btn-primary" type="submit">Find</button>
                                        <a class="btn btn-info" href="{{ route('removed') }}"> Deleted Heroes</a>
                                        <a class="btn btn-success" href="{{ route('add') }}"> +Heroes</a>  
                                    </form>                                
                                </div>
                               
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                <p>{{ $message }}</p>
                                </div>
                                @endif
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Role</th> 
                                        <th>Element</th>
                                    </tr>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->nama_hero }}</td>
                                        <td>{{ $data->nama_role }}</td>
                                        <td>{{ $data->nama_element }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Are you sure wants to remove?')" method="POST" action="{{ route('remove', $data->id_hero) }}">
                                                <a href="{{ route('edit', $data->id_hero) }}" type="button" class="btn btn-warning"><i class="fa fa-edit fa-1x"></i> Edit</a>
                                                @csrf
                                                <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-trash fa-1x"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection