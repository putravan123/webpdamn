<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="bx bx-menu bx-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online" style="width: 40px; height: 40px;">
                        <img src="{{ Auth::user()->image ? asset('images/users/' . Auth::user()->image) : asset('default-avatar.png') }}" 
                             alt="{{ Auth::user()->name }}" class="w-100 h-100 rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3" style="width: 40px; height: 40px;">
                                    <div class="avatar avatar-online">
                                        <img src="{{ Auth::user()->image ? asset('images/users/' . Auth::user()->image) : asset('default-avatar.png') }}" 
                                             alt="{{ Auth::user()->name }}" class="w-100 h-100 rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">{{ Auth::user()->role->name ?? 'Role not assigned' }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <button type="submit" class="dropdown-item" id="logout-button">
                                <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                            </button>
                        </form>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-button').click();">
                            <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
