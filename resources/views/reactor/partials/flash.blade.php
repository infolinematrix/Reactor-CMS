@if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.level') }}" id="flashContainer">
        <div class="alert1-{{ session('flash_notification.level') }}">
            <i class="fa fa-adjust"></i>
            {{ session('flash_notification.message') }}
        </div>
    </div>
@endif