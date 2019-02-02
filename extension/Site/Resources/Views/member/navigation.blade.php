<div class="box_list wow fadeIn">
    <figure>
        <a href="#"><img src="{!! theme_url('img/doctor_listing_4.jpg') !!}" class="img-fluid" alt=""/>
            <div class="preview"><span>Change Photo</span></div>
        </a>
    </figure>
    @if($isProfile)
    <div class="wrapper">
        <h3>Dr. {!! $isProfile !!}</h3>
    </div>
    @endif


    <div class="navigation">

        <div class="menu-item">
            <a href="{!! route('member.profile') !!}">
                <h6>Profile</h6>
                <span>Edit your profile</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="#">
                <h6>Reviews</h6>
                <span>Public Reviews</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="#">
                <h6>Change Password</h6>
                <span>Change your password?</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="{!! route('logout') !!}">
                <h6>Logout</h6>
                <span>Logout from current session?</span>
            </a>
        </div>

    </div>
</div>