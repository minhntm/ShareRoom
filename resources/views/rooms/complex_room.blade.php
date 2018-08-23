<div class="col-md-4">
    <div class="blog-1">
        <div class="blog-photo">
            <img src="{{ asset($room->getFirstImageUrl()) }}" alt="img-3" class="img-responsive" style="height: 220px;">
            <div class="profile-user">
                <img src="{{ asset($room->owner()->get()[0]->getAvatarUrl()) }}" alt="user">
            </div>
        </div>
        <div class="detail">
            <div class="post-meta clearfix">
                <ul>
                    <li>
                        <strong><a href="#">{{ $room->owner()->get()[0]->name }}</a></strong>
                    </li>
                    <li class="mr-0"><span>Feb 31, 2018</span></li>
                    <li class="fr mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                    <li class="fr"><a href="#"><i class="fa fa-calendar"></i></a>5k</li>
                </ul>
            </div>
            <h3>
                <a href="blog-details.html">{{ $room->name }}</a>
            </h3>
            <p>{{ substr($room->summary, 0, 120) }}</p>
            <a href="{{ route('rooms.show', $room->id ) }}" class="read-more-btn">{{ trans('app.read-more') }}</a>
        </div>
    </div>
</div>
