<div class="box_list wow fadeIn">
    @if($isProfile)
    <figure>
        <div class="gallery">
            <div class="picture">
                {!! Form::open(['url' => route('member.profile.upload.picture'),'files' => true]) !!}
                <input class="image-up" id="photo"
                       name="image"  type="file" title="Click to Change">
                <div class="actions">
                    <span class="">
                    <label for="photo"> <button type="submit" class="btn btn-danger btn-sm pull-right"> Save</button></label>
                    </span>
                </div>
                {!! Form::close() !!}

            </div>
            </div>
    </figure>

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