@if(Auth::guard('web')->check())
<section class="section-50" id="section-50" style="display: none;" dir="ltr">
    <div class="container">
        <div class="notification-ui_dd-content">
            <h4>الاشعارات</h4>
            @foreach(Auth::user()->notifications as $notification )
            <div class="notification-list notification-list--unread">
                <div class="notification-list_content">
                    <div class="notification-list_detail">
                        <p>{{$notification->data['type']}}</p>
                        @if($notification->data['type']=='شراء')
                            <p class="text-muted">{{$notification->data['message']}}
                                <strong>{{$notification->data['code']}}</strong>
                            </p>
                        @else
                            <p class="text-muted">{{$notification->data['message']}}</p>
                        @endif
                        <p class="text-muted"><small>{{ date_format($notification->created_at,'y:m-d || h:i')}}</small></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
