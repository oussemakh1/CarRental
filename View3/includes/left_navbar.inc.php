<div class="nav-left-sidebar sidebar-success">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-item ">
                        <a class="nav-link active" href="<?php echo $dashboadPage;?>"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard </a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class=" fas fa-car"></i>Vehicules</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $carManagementPage;?>">Vehicules management</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $carsListPage;?>">List vehicules</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $carInsertPage;?>">Insertion vehicule</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="  fas fa-truck"></i>Fournisseurs</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $fournisseursPage;?>">List fournisseurs</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $fournisseurInsertPage;?>">Insertion fournisseur</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                              <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class=" fas fa-users"></i>Utilisateurs</a>
                              <div id="submenu-7" class="collapse submenu" style="">
                                  <ul class="nav flex-column">

                                      <li class="nav-item">
                                          <a class="nav-link" href="<?php echo $users;?>">List utilisateurs</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="<?php echo $user_insert;?>">Insertion utilisateur</a>
                                      </li>

                                  </ul>
                              </div>
                          </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class=" fas fa-users"></i>Clients</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $clientsPage;?>">List clients</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $clientInsertPage;?>">Insertion client</a>
                                </li>

                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
