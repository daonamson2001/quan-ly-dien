<nav class="navbar navbar-expand-sm bg-dark navbar-dark border-bottom border-secondary">
    <a class="navbar-brand pl-2" href="{{ route('home.index') }}">Trang Chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">


            <li class="nav-item border border-secondary mx-1" id="headingOne">
                <a class="nav-link btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne" role="button"><i class="fas fa-users-cog"></i> Hệ Thống</a>
            </li>

            <li class="nav-item border border-secondary mx-1" id="headingTwo">
                <a class="nav-link btn" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo" role="button"><i class="fas fa-coins"></i> Chức Năng</a>
            </li>
            @if (session('dpm_id') === 1 || session('dpm_id') === 2 || session('dpm_id') === 3)
                <li class="nav-item border border-secondary mx-1" id="headingThree">
                    <a class="nav-link btn" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree" role="button"><i class="fas fa-bars"></i> Danh Mục</a>
                </li>
            @endif
            <li class="nav-item border border-secondary mx-1">
                <a class="nav-link btn" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                    aria-controls="collapseFour" role="button"><i class="fas fa-hands-helping"></i> Trợ Giúp</a>
            </li>
        </ul>
    </div>
    <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle user-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{ session('fullname') }}
        </a>
        <div class="dropdown-menu float-right " aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}">Đăng Xuất</a>
            <a class="dropdown-item" href="{{ route('changePass') }}">Đổi Mật Khẩu</a>
        </div>
    </li>

</nav>


<div class="category bg-dark navbar-dark " id="accordion">

    <div class="collapse navbar-collapse " id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <ul class="navbar-nav">
            @if (session('dpm_id') === 1 || session('dpm_id') === 3)
                <li class="nav-item border-right border-secondary  ml-2">
                    <a href="{{ route('dangky.index') }}" class="nav-link px-2 btn"><i class="fas fa-users-cog"></i>
                        Tạo Tài Khoản</a>
                </li>
            @endif
            <li class="nav-item ">
                <a href="{{ route('thongtin.index') }}" class="nav-link px-2 btn"><i class="fas fa-info"></i> Thông
                    Tin Công Ty</a>
            </li>

    </div>

    <div class="collapse navbar-collapse " id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
        <ul class="navbar-nav">
            @if (session('dpm_id') === 1 || session('dpm_id') === 2)
                <li class="nav-item border-right border-secondary dropdown ml-2">
                    <a class="nav-link px-2 btn dropdown-toggle" href="#" id="navbarBaoCao" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-flag"></i> Báo Cáo
                    </a>
                    <div class="dropdown-menu  " aria-labelledby="navbarBaoCao">
                        {{-- Link quản lý đơn hàng xuất --}}
                        <a class="dropdown-item " href="{{ route('import.index') }}">
                            Nhập kho
                        </a>

                        {{-- Link quản lý đơn hàng nhập --}}
                        <a class="dropdown-item " href="{{ route('export.index') }}">
                            Xuất kho
                        </a>
                        

                        {{-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                </li>
                {{-- <li class="nav-item border-right border-secondary  dropdown">
          <a class="nav-link " ></a>
        </li> --}}
            @endif
            <li class="nav-item border-right border-secondary  ">
                <a href="{{ route('xuat.index') }}" class="nav-link px-2 btn"><i class="fas fa-file-export"></i> Xuất
                    Kho</a>
            </li>

            <li class="nav-item ">
                <a href="{{ route('nhap.index') }}" class="nav-link px-2 btn"><i class="fas fa-file-import"></i> Nhập
                    Kho</a>
            </li>

            <li class="nav-item ">
                <a href="{{ route('inventory-management.index') }}" class="nav-link px-2 btn">
                    <i class="fas fa-box"></i>
                    QL Kho
                </a>
            </li>
    </div>

    <div class="collapse navbar-collapse " id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
        <ul class="navbar-nav">
            @if (session('dpm_id') === 1 || session('dpm_id') === 3)
                <li class="nav-item border-right border-secondary  ml-2">
                    <a href="{{ route('chatluong.index') }}" class="nav-link px-2 btn"><i class="fas fa-award"></i>
                        Chất Lượng</a>
                </li>
            @endif
            @if (session('dpm_id') === 1 || session('dpm_id') === 3)
                <li class="nav-item border-right border-secondary  ">
                    <a href="{{ route('donvitinh.index') }}" class="nav-link px-2 btn"><i
                            class="fas fa-weight-hanging"></i> Đơn Vị Tính</a>
                </li>
            @endif
            @if (session('dpm_id') === 1 || session('dpm_id') === 3)
                <li class="nav-item border-right border-secondary  ">
                    <a href="{{ route('khuvuc.index') }}" class="nav-link  px-2 btn"><i i
                            class="fab fa-fort-awesome-alt"></i> Khu Vực</a>
                </li>
            @endif
            @if (session('dpm_id') === 1)
                <li class="nav-item border-right border-secondary  ">
                    <a href="{{ route('nhanvien.index') }}" class="nav-link px-2 btn"><i class="fas fa-user-tie"></i>
                        Nhân Viên</a>
                </li>
            @endif
            @if (session('dpm_id') === 1 || session('dpm_id') === 3)
                <li class="nav-item border-right border-secondary  ">
                    <a href="{{ route('nhasanxuat.index') }}" class="nav-link px-2 btn"><i
                            class="fas fa-box-open"></i>
                        Nhà Sản Xuất</a>
                </li>
            @endif
            @if (session('dpm_id') === 1 || session('dpm_id') === 2 || session('dpm_id') === 3)
                <li class="nav-item ">
                    <a href="{{ route('vattu.index') }}" class="nav-link px-2 btn"><i class="fas fa-toolbox"></i> Vật
                        Tư</a>
                </li>
            @endif
    </div>

    <div class="collapse navbar-collapse " id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
        <ul class="navbar-nav">
            <li class="nav-item border-right border-secondary  ml-2">
                <a href="{{ route('huongdan') }}" class="nav-link px-2 btn"><i class="far fa-question-circle"></i>
                    Hướng Dẫn Sử Dụng</a>
            </li>

            <li class="nav-item border-right border-secondary  ">
                <a href="{{ route('lienhe.index') }}" class="nav-link px-2 btn"><i class="fas fa-phone-alt"></i> Liên
                    Hệ</a>
            </li>

            <li class="nav-item border-right border-secondary  ">
                <a href="{{ route('phanhoi.index') }}" class="nav-link px-2 btn"><i class="far fa-comments"></i> Phản
                    Hồi</a>
            </li>

            <li class="nav-item ">
                <a href="{{ route('thongtinphanmem') }}" class="nav-link px-2 btn"><i class="far fa-file-alt"></i>
                    Thông Tin Phần Mềm</a>
            </li>
    </div>
</div>
