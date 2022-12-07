@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: ;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <a class="navbar-brand">Removed Hero</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-danger" href="{{ route('index') }}">Back</a>                                  
                                </div>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                <p>{{ $message }}</p>
                                </div>
                                @endif
                                <table class="table">
                                    <tr>
                                        <th>Nama Hero</th>
                                        <th>Role</th>
                                        <th>Element</th>
                                    </tr>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->nama_hero }}</td>
                                        <td>{{ $data->nama_role }}</td>
                                        <td>{{ $data->nama_element }}</td>
                                        <td>
                                            <a href="{{ route('restore', $data->id_hero) }}" class="btn btn-primary btn-sm">Restore</a>
                                            <form onsubmit="return confirm('Are you sure you want to delete this data Permanently?')" class="d-inline" action="{{ route('delete', $data->id_hero) }}" method="post">
                                                @csrf
                                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
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