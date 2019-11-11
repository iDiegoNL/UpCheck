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
                            Manage Invites
                            <span class="tag tag-purple">
                                Admin
                                <span class="tag-addon">
                                    <i class="far fa-crown"></i>
                                </span>
                            </span>
                        </h3>
                        <div class="card-options">
                            <a href="{{ route('admin.invites.remove.all') }}" class="card-options-remove hint--top"
                               onclick="return confirm('Are you sure that you want to remove all invites? This action cannot be undone')"
                               aria-label="Remove all invites">
                                <i class="far fa-trash fa-fw"></i>
                            </a>
                            <a href="#" class="card-options" onclick="window.location.reload();">
                                <i class="far fa-sync fa-fw"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($invites->count() > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Valid</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">For</th>
                                    <th scope="col">Uses</th>
                                    <th scope="col">Valid Until</th>
                                    <th scope="col">Created At</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invites as $invite)
                                    <tr>
                                        <th scope="row">{{ $invite->id }}</th>
                                        <th class="text-center">
                                            @if($invite->uses >= $invite->max)
                                                <i class="fal fa-times text-red"></i>
                                            @else
                                                <i class="fal fa-check text-green"></i>
                                            @endif
                                        </th>
                                        <td>
                                            <code>{{ $invite->code }}</code>
                                        </td>
                                        <td>
                                            @empty($invite->for)
                                                <i class="fal fa-times"></i>
                                            @else
                                                {{ $invite->for }}
                                            @endempty
                                        </td>
                                        <td>{{ $invite->uses . '/' . $invite->max }}</td>
                                        <td>
                                            @empty($invite->valid_until)
                                                <i class="fal fa-times"></i>
                                            @else
                                                {{ $invite->valid_until }}
                                            @endempty
                                        </td>
                                        <td>{{ $invite->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.invites.remove', $invite->id) }}"
                                               class="btn btn-sm btn-outline-danger">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <div class="card-footer text-muted">
                                    <p>
                                        Showing {{ $invites->firstItem() }} to {{ $invites->lastItem() }}
                                        of {{ number_format($invites->total()) }} invites
                                    </p>
                                    {{ $invites->links() }}
                                </div>
                            </div>
                        @else
                            <div class="text-center">
                                <img src="{{ asset('images/graphics/admin-invite.svg') }}" width="350px">
                                <h3 class="mb-3 mt-3">There aren't any invites yet.</h3>
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
                        <form method="post" action="{{ route('admin.invites.add') }}">
                            <h5 class="mb-5 text-center">New Invite</h5>
                            @csrf
                            <div class="form-group">
                                <label for="email">User email (optional)</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="expiration">Expiration (optional)</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Expiration date"
                                           id="expiration" name="expiration" aria-describedby="expirationLabel">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="expirationLabel">days</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount (max 50)</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount"
                                       value="1" min="1" max="50" required>
                            </div>
                            <div class="form-group">
                                <label for="uses">Amount of uses</label>
                                <input type="number" class="form-control" id="uses" name="uses" placeholder="Uses"
                                       value="999" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-purple">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
