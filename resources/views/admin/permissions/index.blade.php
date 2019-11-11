@extends('tabler::layouts.main')
@section('title', 'UpCheck')
@section('content')
    <div class="row row-cards">
        @include('auth.settings.partials.menu')
        <div class="col-lg-9">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Manage Roles
                            <span class="tag tag-purple">
                                Admin
                                <span class="tag-addon">
                                    <i class="far fa-crown"></i>
                                </span>
                            </span>
                        </h3>
                        <div class="card-options">
                            <a href="#" class="card-options" onclick="window.location.reload();">
                                <i class="far fa-sync fa-fw"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($roles != '[]')
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Guard Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $role->id }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>{{ $role->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('roles.destroy', $role->id) }}"
                                               class="btn btn-sm btn-outline-danger">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <img src="{{ asset('images/graphics/admin-fingerprint.svg') }}" width="350px">
                                <h3 class="mb-3 mt-3">There aren't any roles yet.</h3>
                            </div>
                        @endif
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-icon alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                                <strong>Oh no! Something went wrong..</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('roles.store') }}">
                            <h5 class="mb-5 text-center">New Role</h5>
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <button type="submit" class="btn btn-purple">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
