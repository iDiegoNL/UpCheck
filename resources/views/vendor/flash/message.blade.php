@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert alert-icon
        alert-{{ $message['level'] }}
        {{ $message['important'] ? 'alert-important' : '' }}"
             role="alert"
        >

            @if($message['level'] == 'success')
                <i class="fal fa-check fa-fw" aria-hidden="true"></i>
            @elseif($message['level'] == 'warning')
                <i class="fal fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
            @elseif($message['level'] == 'danger')
                <i class="fal fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
            @else
                <i class="fal fa-info-circle fa-fw" aria-hidden="true"></i>
            @endif

            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;
                </button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
