<div class="col-md-3">
    <h3 class="page-title mb-5">{{ ucfirst($name) }}</h3>
    <div>
        <div class="list-group list-group-transparent">
            <a href="{{ route('monitors.show', $id) }}" class="list-group-item list-group-item-action d-flex align-items-center active">
                <span class="icon mr-3"><i class="far fa-analytics"></i></span>Overview
            </a>
            <a href="{{ route('monitors.alerts.index', $id) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-bell"></i></span>Alerts
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-share"></i></span>Share
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-tachometer"></i></span>Status Page
            </a>
            <a href="{{ route('monitors.edit', $id) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-edit"></i></span>Edit
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                <span class="icon mr-3"><i class="far fa-cog"></i></span>Settings
            </a>
        </div>
    </div>
</div>
