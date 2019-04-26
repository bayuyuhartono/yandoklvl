    <!-- #Top Bar -->
    <section>
      <!-- Left Sidebar -->
      <aside id="leftsidebar" class="sidebar">
          <!-- User Info -->
          <div class="user-info">
            
          </div>
          <!-- #User Info -->
          <!-- Menu -->
          <div class="menu">
            <ul class="list">
                <!-- <li class="header">MAIN NAVIGATION</li> -->
                <li 
                {!! request()->is('add') ? ' class="active"' : '' !!} 
                {!! request()->is('beranda') ? ' class="active"' : '' !!}
                {!! request()->is('ceknim') ? ' class="active"' : '' !!}>
                    <a href="{{ route('beranda') }}">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li {!! request()->is('pengumuman') ? ' class="active"' : '' !!}>
                    <a href="{{ route('pengumuman') }}">
                        <i class="material-icons">notifications</i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li 
                {!! request()->is('ajuan') ? ' class="active"' : '' !!} 
                {!! request()->is('otpcheck') ? ' class="active"' : '' !!}
                {!! request()->is('ajuancancel') ? ' class="active"' : '' !!} >
                    <a href="{{ route('ajuan') }}">
                        <i class="material-icons">add</i>
                        <span>Ajukan Pemesanan</span>
                    </a>
                </li>
                <li 
                {!! request()->is('upload') ? ' class="active"' : '' !!}
                {!! request()->is('cekupload') ? ' class="active"' : '' !!}
                {!! request()->is('otpupload') ? ' class="active"' : '' !!}  
                {!! request()->is('tranfupload') ? ' class="active"' : '' !!}  
                {!! request()->is('uploadcancel') ? ' class="active"' : '' !!}
                {!! request()->is('send') ? ' class="active"' : '' !!}> 
                    <a href="{{ route('upload') }}">
                        <i class="material-icons">publish</i>
                        <span>Upload Dokumen</span>
                    </a>
                {{-- </li>
                <li 
                {!! request()->is('status') ? ' class="active"' : '' !!}
                {!! request()->is('cek') ? ' class="active"' : '' !!}>
                        <a href="{{ route('status') }}">
                        <i class="material-icons">history</i>
                        <span>Cek Status Pemesanan</span>
                    </a>
                </li> --}}
                <li {!! request()->is('alur') ? ' class="active"' : '' !!}>
                    <a href="{{ route('alur') }}">
                        <i class="material-icons">swap_calls</i>
                        <span>Alur Pemesanan</span>
                    </a>
                </li>
                <li {!! request()->is('carabayar') ? ' class="active"' : '' !!}>
                    <a href="{{ route('carabayar') }}">
                        <i class="material-icons">payment</i>
                        <span>Cara Pembayaran</span>
                    </a>
                </li>
                <li {!! request()->is('kontak') ? ' class="active"' : '' !!}>
                    <a href="{{ route('kontak') }}">
                        <i class="material-icons">contacts</i>
                        <span>Kontak Kami</span>
                    </a>
                </li>
            </ul>
        </div>
          <!-- #Menu -->
          <!-- Footer -->
          <div class="legal">
              <div class="copyright">
                  &copy; 2019 <a href="javascript:void(0);">Puskom - UNTAR</a>
              </div>
              <div class="version">
                  <b>Version: </b> 1.0.0
              </div>
          </div>
          <!-- #Footer -->
      </aside>
      <!-- #END# Left Sidebar -->
  </section>