<div class="col-md-3 mt-5">
    <div>
        <div class="list-group list-group-transparent">
            <div class="list-group-item list-group-item-action d-flex align-items-center">
                @if($ip)
                    <span class="icon mr-3"><i class="far fa-server"></i></span>
                    <strong>IP:&nbsp;</strong> {{ $ip }}
                @else
                    <span class="icon mr-3"><i class="far fa-globe"></i></span>
                    <strong>Domain:&nbsp;</strong> {{ $domain }}
                @endif
            </div>
            <div class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-redo"></i></span>
                <strong>Interval:&nbsp;</strong> Every {{ $interval }} minutes
            </div>
            <div class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-clock"></i></span>
                <strong>Created:&nbsp;</strong>
                <div class="hint--top"
                     aria-label="{{ $created_at }}">
                    {{ \Carbon\Carbon::parse($created_at)->diffForHumans() }}
                </div>
            </div>
            <div class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-history"></i></span>
                <strong>Updated:&nbsp;</strong>
                <div class="hint--top"
                     aria-label="{{ $created_at }}">
                    {{ \Carbon\Carbon::parse($created_at)->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
