</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark bg-navy elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-navy text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image  elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-header">Horario Talleres</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=schedules" class="nav-link nav-schedules">
                        <i class="nav-icon fas fa-calendar-week"></i>
                        <p>
                          Horario Talleres
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=report" class="nav-link nav-report">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Reporte Talleres
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=incidencias_all" class="nav-link nav-report_insidencias">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>
                          Evidencias Talleres
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Docentes y Coordinador</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=docentes_all" class="nav-link nav-docentes_all">
                        <i class="nav-icon fas fas fa-user-md"></i>
                        <p>
                          Lista de Docentes
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=coordinador_all" class="nav-link nav-coordinador_all">
                        <i class="nav-icon fas fas fa-user-md"></i>
                        <p>
                          Lista de Coordinadores
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Especialidades</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=especialidad_all" class="nav-link nav-especialidad_all">
                        <i class="nav-icon fas fas fa-user-md"></i>
                        <p>
                          Especialidad
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Almacen</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=maniquie_all" class="nav-link nav-maniquie_all">
                        <i class="nav-icon fas fa-male"></i>
                        <p>
                          Lista de Equipos
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=insumos_all" class="nav-link nav-insumos_all">
                        <i class="nav-icon fa fa-medkit"></i>
                        <p>
                          Lista de Insumos
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Kardex</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=kardex_all" class="nav-link nav-kardex_all">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                          Ver Kardex Productos
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Mantenimiento</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=assembly_hall" class="nav-link nav-assembly_hall">
                        <i class="nav-icon fas fa-door-open"></i>
                        <p>
                          Lista de Laboratorios
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Configuraciones
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/manage_user" class="nav-link nav-user">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                          Usuarios
                        </p>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.split('/');
      page = page[0];
      if(s!='')
        page = page+'_'+s;

      if($('.nav-link.nav-'+page).length > 0){
            $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
  
    })
  </script>