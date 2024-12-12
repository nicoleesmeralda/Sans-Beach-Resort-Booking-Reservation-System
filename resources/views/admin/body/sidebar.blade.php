<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="font-size: 18px">Sans Beach Resort</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-right-arrow-alt' ></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bxs-dashboard' ></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        
        

        @if(Auth::user()->can('booking.list'))
        <li>
            <a href="{{ route('booking.list') }}">
                <div class="parent-icon"><i class='bx bx-list-ul' ></i></i></div>
                <div class="menu-title">Booking List</div>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('booking.add'))
        <li>
            <a href="{{ route('add.room.list') }}">
                <div class="parent-icon"><i class='bx bx-book-add' ></i></div>
                <div class="menu-title">Add Booking</div>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('booking.report'))
        <li>
            <a href="{{ route('booking.report') }}">
                <div class="parent-icon"><i class='bx bx-file' ></i></div>
                <div class="menu-title">Booking Report</div>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('room.type'))
        <li>
            <a href="{{ route('room.type.list') }}">
                <div class="parent-icon"><i class='bx bx-bed'></i></div>
                <div class="menu-title">Room Types</div>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('room.list'))
        <li>
            <a href="{{ route('view.room.list') }}">
                <div class="parent-icon"><i class='bx bx-door-open' ></i></div>
                <div class="menu-title">All Rooms</div>
            </a>
        </li>
        @endif

        @if(Auth::user()->can('resort.gallery'))
        <li>
            <a href="{{ route('all.gallery') }}">
                <div class="parent-icon"><i class='bx bx-photo-album' ></i></div>
                <div class="menu-title">Gallery</div>
            </a>
        </li>
        @endif
        

        @if(Auth::user()->can('contact.messages'))
        <li>
            <a href="{{ route('contact.message') }}">
                <div class="parent-icon"><i class='bx bx-message-alt-detail' ></i></div>
                <div class="menu-title">Contact Messages</div>
            </a>
        </li>
        @endif

          
        @if(Auth::user()->can('smtp.setting'))
        <li>
            <a href="{{ route('smtp.setting') }}">
                <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                <div class="menu-title">SMTP</div>
            </a>
        </li>
        @endif
    
        @if(Auth::user()->can('role.permission.menu'))
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-circle' ></i></i>
                </div>
                <div class="menu-title">Roles & Permissions </div>
            </a>
            <ul>
                <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permissions </a>
                </li> 
                <li> <a href="{{ route('all.roles') }}"><i class='bx bx-radio-circle'></i>All Roles </a>
                </li> 

                <li> <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>Permissions in Roles</a>
                </li>
                 
                <li> <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admins </a>
                </li> 

            </ul>
        </li>
        @endif

        @if(Auth::user()->can('contact.logo')) 
        <li>
            <a href="{{ route('site.setting') }}">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Contact Settings</div>
            </a>
        </li>
        @endif
        
    </ul>
    <!--end navigation-->
</div>

<script>
    $(document).ready(function() {
        $('#menu').metisMenu();  // Initialize the metisMenu plugin
    });
</script>