<div class="sidebar" data-color="azure" data-image="/img/background.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                Hackomania
            </a>
            <div class="font-white text-center">
                Hackomania Portal
            </div>
            <div class="font-white text-center">
                Welcome, {{ Auth::user()->username }}!
            </div>
        </div>

        <ul class="nav">

            <!-- General navigations -->
            @if ($navigation == 'Dashboard')
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @endif

            @if ($navigation == 'Dashboard')

                <li>
                    <a href="{{ route('facebook') }}">
                        <i class="fa fa-facebook-square"></i>
                        @if ($withFacebook)
                            <p>Facebook - Active</p>
                        @else
                            <p>Facebook - Deactive</p>
                        @endif

                    </a>
                </li>

                <li>
                    <a href="{{ route('instagram') }}">
                        <i class="fa fa-instagram"></i>
                        @if ($withInstagram)
                            <p>Instagram - Active</p>
                        @else
                            <p>Instagram - Deactive</p>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ route('meetup') }}">
                        <i class="fa fa-meetup"></i>
                        @if ($withMeetup)
                            <p>Meetup - Active</p>
                        @else
                            <p>Meetup - Deactive</p>
                        @endif
                    </a>
                </li>

            @endif

            <li>
                <a href="{{ route('share') }}">
                    <i class="fa fa-share-alt-square"></i>
                    <p>Share</p>
                </a>
            </li>

        </ul>
    </div>
</div>