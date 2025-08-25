<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center sidebar-logo" href="{{ route('admin.home') }}">
                <h2 class="m-0 text-primary"><i class="fa fa-book me-3 "></i>UpWise</h2>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-gauge-high fa-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Entities Menu</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admins.index') }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="ml-3 item-text">Admins</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fa-solid fa-list"></i>
                    <span class="ml-3 item-text">Categories</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <span class="ml-3 item-text">Courses</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-star"></i>
                    <span class="ml-3 item-text">Feedbacks</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('instructors.index') }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="ml-3 item-text">Instructors</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('messages.index') }}">
                    <i class="fa-solid fa-message"></i>
                    <span class="ml-3 item-text">Messages</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('specialities.index') }}">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="ml-3 item-text">Specialities</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-users"></i>
                    <span class="ml-3 item-text">Users</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Website Settings</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="ml-3 item-text">Contacts</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-sliders"></i>
                    <span class="ml-3 item-text">Sliders</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
