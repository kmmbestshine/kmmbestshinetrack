@extends('users.layouts.default')
@section('title', 'Master Salary Form')
    @section('cram')
    <ul class="breadcrumb">
        <li><a href="{{route('user.dashboard')}}">Home</a></li>                    
        <li class="active">Salary Structure</li>
    </ul>
    @endsection
    @section('contant')
       <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Salary Structure</h2>
        </div>
        @if(Input::old('success'))
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Well done!</strong> {{ Input::old('success') }}
                    </div>
                </div>
            </div>
        @endif
        @if(Input::old('error'))
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Well done!</strong> {{ Input::old('error') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="page-content-wrap">
           <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <form class="form-horizontal" role="form" method="post" action="{{route('post.salary')}}">
                            {!! csrf_field() !!}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" name="salary" class="form-control" placeholder="Salary Value">
                                </div>
                                @foreach($errors->get('salary') as $salary)
                                    <div class="alert alert-danger">{{ $salary }}</div>
                                @endforeach
                            </div>
                            <div class="col-md-4 text-center">
                                <button type="submit" class="btn btn-info">Add Salary Structure</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                            <h3 class="panel-title"><center>Salary Structures</center></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Salary Structure</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($salaries as $key => $salary)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $salary->value }}</td>
                                            <td>
                                                <a href="{{route('edit.salary', $salary->id)}}" class="btn btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <a href="{{route('delete.salary', $salary->id)}}" class="btn btn-danger" onclick="confirm('Are You Sure')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
@endsection