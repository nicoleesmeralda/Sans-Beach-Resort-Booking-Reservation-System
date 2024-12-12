<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown">
                            @php
                                $ncount = Auth::user()->unreadNotifications()->count();
                            @endphp
                            <span class="alert-count" id="notification-count">{{ $ncount }}</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge"> </p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @php $user = Auth::user(); @endphp
                                @forelse ($user->notifications as $notification)
                                    <a class="dropdown-item notification-item {{ $notification->read_at ? 'read' : 'unread' }}" 
                                        href="{{ route('booking.list') }}" 
                                        onclick="markNotificationAsRead('{{ $notification->id }}', this)">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success"><i class='bx bx-book'></i></div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $notification->data['message'] }}
                                                    <span class="msg-time float-end">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                                                </h6>
                                                <p class="msg-info">New Booking</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-center">No notifications</p>
                                @endforelse
                            </div>
                        </div>
                    </li>
                    <li><div class="header-message-list"></div></li>
                </ul>
            </div>

            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp

            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{ $profileData->name }}</p>
                        <p class="designattion mb-0">{{ $profileData->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i class="bx bx-user fs-5"></i><span>Profile</span></a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.change.password') }}"><i class="bx bx-cog fs-5"></i><span>Change Password</span></a></li>
                    <li><div class="dropdown-divider mb-0"></div></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i class="bx bx-log-out-circle"></i><span>Logout</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    function markNotificationAsRead(notificationId, element) {
        fetch('/mark-notification-as-read/' + notificationId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('notification-count').textContent = data.count;
            // Change the notification style from unread to read
            element.classList.remove('unread');
            element.classList.add('read');
        })
        .catch(error => {
            console.log('Error', error);
        });
    }
</script>

<style>
    .notification-item {
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .notification-item.unread {
        background-color: #e3f2fd; /* Light blue background for unread */
        color: #0d47a1; /* Dark blue text for unread */
    }

    .notification-item.read {
        background-color: #ffffff; /* White background for read */
        color: #6c757d; /* Grey text for read */
    }

    .notification-item:hover {
        background-color: #dfe3e8;
    }
</style>
