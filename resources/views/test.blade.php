@extends('layouts.app')

@section('content')

@if(session('success'))
  {{session('suceess')}}
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <form action="{{ route('new-image')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row">
            <div class="form-group">
                <div class="form-control">
                    <input type="file" name="newimage">
                </div>
                <div class="form-control">
                    <input type="submit" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
