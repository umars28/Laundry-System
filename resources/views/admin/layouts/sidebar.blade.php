 <!-- ========== Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Master</li>
                            <li>
                                <a href="{{ route('admin.dashboard.index') }}" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.paket') }}" class="waves-effect"><i class="mdi mdi-package"></i><span> Paket </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.customer') }}" class="waves-effect"><i class="fas fa-user-circle"></i><span> Customer </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.karyawan') }}" class="waves-effect"><i class="fas fa-user-circle"></i><span> Karyawan </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pesanan.status') }}" class="waves-effect"><i class="fas fa-train"></i><span> Status Pesanan </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.transaction') }}" class="waves-effect"><i class="mdi mdi-file-outline"></i><span> Transaksi Pesanan </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pembayaran.status') }}" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Status Pembayaran </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pembayaran.method') }}" class="waves-effect"><i class="mdi mdi-message-text"></i><span> Jenis Pembayaran </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.payment.confirmation') }}" class="waves-effect"><i class="mdi mdi-file-document"></i><span> Bukti Pembayaran </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.about') }}" class="waves-effect"><i class="fas fa-address-book"></i><span> About </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contact') }}" class="waves-effect"><i class="fas fa-address-card"></i><span> Contact Us </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.bank.account') }}" class="waves-effect"><i class="fas fa-registered"></i><span> Bank Account </span></a>
                            </li>
                            <li>
                                <a href="{{ route('site.setting.index') }}" class="waves-effect"><i class="fas fa-cog"></i><span> Pengaturan Website </span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Sidebar End -->
