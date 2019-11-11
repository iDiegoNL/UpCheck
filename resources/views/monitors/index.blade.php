@extends('tabler::layouts.main')
@section('title', 'Tabler')
@section('content')
    @if (Auth::user()->google2fa_secret == null)
        <div class="alert alert-warning alert-dismissible">
            <button data-dismiss="alert" class="close" aria-label="Dismiss Alert"></button>
            <h4>Your account is currently unprotected</h4>
            <p>
                We strongly recommend using a time-based one-time password (TOTP) application to configure 2FA.
                TOTP applications are more reliable than SMS, especially for locations outside the United States.
                TOTP apps support the secure backup of your authentication codes in the cloud and can be restored if you
                lose access to your device.
            </p>
            <div class="btn-list">
                <a class="btn btn-success" href="{{ route('settings.mfa') }}">Enable</a>
                <button class="btn btn-secondary" type="button">Don't show this again</button>
            </div>
        </div>
    @endif
    @if ($monitors->isNotEmpty())
        <div class="row row-cards row-deck">
            <div class="col-12">
                <div class="card table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                        <thead>
                        <tr>
                            <th class="w-1"></th>
                            <th>Monitor</th>
                            <th>Category</th>
                            <th>Uptime</th>
                            <th>Activity</th>
                            <th class="text-center">Average Ping</th>
                            <th class="w-1 text-right">
                                <a href="{{ route('monitors.create') }}" class="btn btn-secondary btn-sm ml-2">
                                    Add Monitor
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($monitors as $monitor)
                            <tr>
                                <td class="text-center">
                                    <div class="avatar" style="background: transparent;">
                                        <i class="far fa-{{ $monitor->category }}"></i>
                                        @if($monitor->status == 'online')
                                            <span class="avatar-status bg-green"></span>
                                        @elseif($monitor->status == 'offline')
                                            <span class="avatar-status bg-red"></span>
                                        @else
                                            <span class="avatar-status bg-gray"></span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a style="color: #495057;"
                                       href="{{ route('monitors.show', $monitor->id) }}">{{ $monitor->name }}
                                    </a>
                                    <div class="small text-muted">
                                        {{ $monitor->domain . $monitor->ip }}
                                    </div>
                                </td>
                                <td>
                                    <div>{{ ucfirst($monitor->category) }}</div>
                                </td>
                                <td>
                                    <div class="clearfix">
                                        <div class="float-left">
                                            @if(\App\Ping::where('monitor_id', $monitor->id)->count())
                                                <strong>{{ round(100 * \App\Ping::where('monitor_id', $monitor->id)->where('ms', '!=', 0)->pluck('ms')->count() / \App\Ping::where('monitor_id', $monitor->id)->pluck('ms')->count(), 2) }}
                                                    %</strong>
                                            @else
                                                0%
                                            @endif
                                        </div>
                                        <div class="float-right">
                                            <small class="text-muted">
                                                @if(\App\Ping::where('monitor_id', $monitor->id)->count())
                                                    {{ \Carbon\Carbon::parse(\App\Ping::where('monitor_id', $monitor->id)->first()->value('created_at'))->toFormattedDateString() }}
                                                    - {{ \Carbon\Carbon::parse(\App\Ping::where('monitor_id', $monitor->id)->latest()->value('created_at'))->toFormattedDateString() }}
                                                @else
                                                    <div class="small text-muted">No activity yet</div>
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                    @if(\App\Ping::where('monitor_id', $monitor->id)->count())
                                        <div class="progress progress-xs">
                                            <div class="progress-bar
                                        @if(round(100 * \App\Ping::where('monitor_id', $monitor->id)->where('ms', '!=', 0)->pluck('ms')->count() / \App\Ping::where('monitor_id', $monitor->id)->pluck('ms')->count(), 2) > 50)
                                                    bg-green
@elseif(round(100 * \App\Ping::where('monitor_id', $monitor->id)->where('ms', '!=', 0)->pluck('ms')->count() / \App\Ping::where('monitor_id', $monitor->id)->pluck('ms')->count(), 2) < 50)
                                                    bg-orange
@endif
                                                    " role="progressbar"
                                                 style="width: {{ round(100 * \App\Ping::where('monitor_id', $monitor->id)->where('ms', '!=', 0)->pluck('ms')->count() / \App\Ping::where('monitor_id', $monitor->id)->pluck('ms')->count()) }}%"
                                                 aria-valuenow="{{ round(100 * \App\Ping::where('monitor_id', $monitor->id)->where('ms', '!=', 0)->pluck('ms')->count() / \App\Ping::where('monitor_id', $monitor->id)->pluck('ms')->count()) }}"
                                                 aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    @else
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-gray" role="progressbar" style="width: 0%"
                                                 aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if(\App\Ping::where('monitor_id', $monitor->id)->count())
                                        <div class="small text-muted">Last ping <span class="small text-muted">({{ \App\Ping::where('monitor_id', $monitor->id)->latest()->value('ms') }} ms)</span>
                                        </div>
                                        <div class="hint--top"
                                             aria-label="{{ \App\Ping::where('monitor_id', $monitor->id)->latest()->value('created_at') }}">
                                            {{ \Carbon\Carbon::parse(\App\Ping::where('monitor_id', $monitor->id)->latest()->value('created_at'))->diffForHumans() }}
                                        </div>
                                    @else
                                        <div class="small text-muted">No activity yet</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div>{{ round(\App\Ping::where('monitor_id', $monitor->id)->where('ms', '>', 0)->avg('ms')) }} <span
                                                class="text-muted">ms</span></div>
                                </td>
                                <td class="text-center">
                                    <div class="item-action dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-label="Options"><i
                                                    class="fe fe-more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                <i class="dropdown-icon far fa-analytics"></i> View
                                            </a>
                                            <a href="{{ route('monitors.edit', $monitor->id) }}" class="dropdown-item">
                                                <i class="dropdown-icon far fa-edit"></i> Edit
                                            </a>
                                            <a href="javascript:void(0)" class="dropdown-item">
                                                <i class="dropdown-icon far fa-share"></i> Share
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <form method="post" action="{{ route('monitors.destroy', $monitor->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Are you sure that you want to delete this monitor?\nThis action can not be reversed.')">
                                                    <i class="dropdown-icon far fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <div class="card-footer text-muted">
                            <p>
                                Showing {{ $monitors->firstItem() }} to {{ $monitors->lastItem() }}
                                of {{ number_format($monitors->total()) }} monitors
                            </p>
                            {{ $monitors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('images/graphics/empty.svg') }}" width="350px">
                    <h3 class="mb-1 ">You haven't added any monitors yet.</h3>
                    <h5 style="font-weight:normal" class="mb-5">Add your first monitor to fill up this empty space</h5>
                    <a href="{{ route('monitors.create') }}" class="btn btn-outline-primary">Get started!</a>
                </div>
            </div>
        </div>
    @endif
@stop
