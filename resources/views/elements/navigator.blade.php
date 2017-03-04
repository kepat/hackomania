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
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @else
                <li>
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>