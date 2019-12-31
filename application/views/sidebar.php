<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
  <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
  </script>


<?php
  $role = ($this->session->userdata['logged_in']['role']);
  $q = ($this->session->userdata['logged_in']['id']);
  if($role == "admin"){ ?>
  <ul class="nav nav-list">
    <li class="<?php if($this->uri->segment(1)=="dashboard_admin"){echo "active";}?>">
      <a href="<?php echo base_url(); ?>dashboard_admin">
        <i class="menu-icon fa fa-tachometer"></i>
        <span class="menu-text"> Dashboard </span>
      </a>

      <b class="arrow"></b>
    </li>

    <li class="<?php if($this->uri->segment(1)=="kelola_dosen" or $this->uri->segment(1)=="kelola_mahasiswa"){echo "active open";}?>">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-pencil-square-o"></i>
        <span class="menu-text"> Kelola User </span>

        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="<?php if($this->uri->segment(1)=="kelola_dosen"){echo "active";}?>">
          <a href="<?php echo base_url();?>kelola_dosen">
            <i class="menu-icon fa fa-caret-right"></i>
            Kelola Dosen
          </a>

          <b class="arrow"></b>
        </li>

        <li class="<?php if($this->uri->segment(1)=="kelola_mahasiswa"){echo "active";}?>">
          <a href="<?php echo base_url();?>kelola_mahasiswa">
            <i class="menu-icon fa fa-caret-right"></i>
            Kelola Mahasiswa
          </a>

          <b class="arrow"></b>
        </li>


      </ul>

      <li class="<?php if($this->uri->segment(1)=="kelola_matakuliah"){echo "active";}?>">
        <a href="<?php echo base_url();?>kelola_matakuliah">
          <i class="menu-icon fa fa-tachometer"></i>
          <span class="menu-text"> Kelola Matakuliah </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li class="<?php if($this->uri->segment(1)=="kelola_kelas"){echo "active";}?>">
        <a href="<?php echo base_url();?>kelola_kelas">
          <i class="menu-icon fa fa-tachometer"></i>
          <span class="menu-text"> Kelola Kelas </span>
        </a>

        <b class="arrow"></b>
      </li>

      <li>
        <a href="<?php echo base_url();?>logout">
          <i class="menu-icon fa fa-tachometer"></i>
          <span class="menu-text"> Logout </span>
        </a>

        <b class="arrow"></b>
      </li>
    </li>

  </ul><!-- /.nav-list -->
  <?php } elseif($role == "mahasiswa"){ ?>
    <ul class="nav nav-list">
      <li class="<?php if($this->uri->segment(1)=="dashboard_mhs"){echo "active";}?>">
        <a href="<?php echo base_url(); ?>dashboard_mhs">
          <i class="menu-icon fa fa-tachometer"></i>
          <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
      </li>

        <li class="<?php if($this->uri->segment(1)=="lihat_tugas"){echo "active";}?>">
          <a href="<?php echo base_url();?>lihat_tugas?q=<?php echo $q ?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Lihat Tugas </span>
          </a>

          <b class="arrow"></b>
        </li>

        <li class="<?php if($this->uri->segment(1)=="lihat_nilai"){echo "active";}?>">
          <a href="<?php echo base_url();?>lihat_nilai?q=<?php echo $q ?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Lihat Nilai </span>
          </a>

          <b class="arrow"></b>
        </li>
        <li>
          <a href="<?php echo base_url();?>logout">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Logout </span>
          </a>

          <b class="arrow"></b>
        </li>
      </li>

    </ul><!-- /.nav-list -->
    <?php } elseif($role == "dosen"){ ?>
      <ul class="nav nav-list">
        <li class="<?php if($this->uri->segment(1)=="dashboard_dosen"){echo "active";}?>">
          <a href="<?php echo base_url(); ?>dashboard_dosen">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
          </a>

          <b class="arrow"></b>
        </li>

          <li class="<?php if($this->uri->segment(1)=="kelola_tugas"){echo "active";}?>">
            <a href="<?php echo base_url();?>kelola_tugas?q=<?php echo $q ?>">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Kelola Tugas </span>
            </a>

            <b class="arrow"></b>
          </li>

          <li class="<?php if($this->uri->segment(1)=="kelola_nilai"){echo "active";}?>">
            <a href="<?php echo base_url();?>kelola_nilai?q=<?php echo $q ?>">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Kelola Nilai </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li>
            <a href="<?php echo base_url();?>logout">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Logout </span>
            </a>

            <b class="arrow"></b>
          </li>
        </li>

      </ul><!-- /.nav-list -->
    <?php } ?>
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
