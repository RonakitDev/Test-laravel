<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-light">
                    <span class="logo-lg">
                        <span >TEST</span>
                    </span>
                </a>
            </div>

{{--            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">--}}
{{--                <i class="fa fa-fw fa-bars"></i>--}}
{{--            </button>--}}
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{--                    <img class="rounded-circle header-profile-user"--}}
{{--                         src="{{asset('assets/images/users/tridraw210502055-removebg-preview.png')}}"--}}
{{--                         alt="Header Avatar">--}}
{{--                    @php--}}
{{--                        $dataa = \Illuminate\Support\Facades\Auth::id();--}}
{{--                            $user = \App\User::where('id',$dataa)->first()--}}
{{--                    @endphp--}}
                    {{--                    {{dd($dataa)}}--}}
{{--                    <span class="d-none d-xl-inline-block ml-1">{{'zxc'}}</span>--}}
{{--                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>--}}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
{{--                    @if($dataa == 4)--}}
{{--                        <a class="dropdown-item" href="{{url('/backend/user')}}"><i--}}
{{--                                class="bx bx-wallet font-size-16 align-middle mr-1"></i>Register--}}
{{--                        </a>--}}
{{--                        <a class="dropdown-item" href="{{url('/backend/historyedit')}}"><i--}}
{{--                                class="bx bx-add-to-queue font-size-16 align-middle mr-1"></i>History edit--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                    <a class="dropdown-item text-danger" href="javascript:void();"--}}
{{--                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i--}}
{{--                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> {{ __('Logout') }}--}}
{{--                    </a>--}}
{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</header>
