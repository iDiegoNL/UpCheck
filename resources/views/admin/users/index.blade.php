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
                            Manage Users
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
                        @if($users->count() > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email Verified</th>
                                    <th scope="col">2FA Enabled</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <th class="text-center">@isset($user->email_verified_at)
                                                <i class="fal fa-check text-green"></i>
                                            @else
                                                <i class="fal fa-times text-red"></i>
                                            @endisset</th>
                                        <th class="text-center">@isset($user->google2fa_secret)
                                                <i class="fal fa-check text-green"></i>
                                            @else
                                                <i class="fal fa-times text-red"></i>
                                            @endisset</th>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                               class="btn btn-sm">Edit</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
