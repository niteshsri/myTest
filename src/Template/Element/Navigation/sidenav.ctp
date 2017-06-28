<?php
// pr($sideNavData);die;
?>
<div class="container-fluid">
  <div class="row">
    <div class="left-sidebar-placeholder"></div>
    <!-- left-sidebar-1 -->
    <div class="left-sidebar left-sidebar-1">
      <div class="wrapper">
        <div class="content">
          <!-- sidebar-heading -->
          <div class="sidebar-heading sidebar-heading-1">
            <!-- sidebar-heading-image -->
            <div class="sidebar-heading-image" >
              MARS LOGO here
            </div>
            <!-- end sidebar-heading-image -->
            <!-- dropdown -->
            <div class="dropdown">
              <a class="btn btn-default btn-flat dropdown-toggle no-after" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="name">
                  <?= $sideNavData['full_name'] ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-center from-center">
                  <a class="dropdown-item" href="#">
                    <i class="sli-envelope"></i>
                    <span class="title">Inbox</span>
                    <div class="separator"></div>
                    <span class="badge badge-pill badge-raised badge-danger badge-sm">New</span>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-star"></i>
                    <span class="title">Messages</span>
                    <div class="separator"></div>
                    <span class="badge badge-info badge-rounded badge-sm">5</span>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-settings"></i>
                    <span class="title">Profile</span>
                    <div class="separator"></div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-clock"></i>
                    <span class="title">Lock screen</span>
                    <div class="separator"></div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="sli-power"></i>
                    <span class="title">Logout</span>
                    <div class="separator"></div>
                  </a>
                </div>
              </div>
              <!-- end dropdown -->
              <!-- icons -->
            </div>
            <!-- end sidebar-heading -->
            <div class="section">
              <ul class="list-unstyled">
                <li>
                  <a class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                    <i class="sli-star"></i>
                    <span class="title">Dashboard</span>
                  </a>
                </li>
                <?php if($sideNavData['is_approved'] || $sideNavData['is_verified'] ){?>
                  <li>
                    <a data-target="#payments" data-toggle="collapse" class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" href="#">
                      <i class="sli-star"></i>
                      <span class="title">Payments</span>
                    </a>
                    <ul class="list-unstyled collapse" id="payments">
                      <li>
                        <a href="collapsed-sidebar-1/dashboards/dashboard.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">All Transactions</span>
                        </a>
                      </li>
                      <li>
                        <a href="index.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Settlements</span>
                        </a>
                      </li>
                      <li>
                        <a href="off-canvas-1/dashboards/dashboard.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Refunds</span>
                        </a>
                      </li>
                      <li>
                        <a href="top-navigation-1/dashboards/dashboard.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Disputes</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a data-target="#tools" data-toggle="collapse"  class="btn btn-default btn-flat btn-sidebar btn-sidebar-1">
                      <i class="sli-star"></i>
                      <span class="title">Tools</span>
                    </a>
                    <ul class="list-unstyled collapse" id="tools">
                      <li>
                        <a href="collapsed-sidebar-1/dashboards/dashboard.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Email Invoicing</span>
                        </a>
                      </li>
                      <li>
                        <a href="index.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Xpress Kart</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a data-target="#account" data-toggle="collapse" class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" >
                      <i class="sli-star"></i>
                      <span class="title">Account</span>
                    </a>
                    <ul class="list-unstyled collapse" id="account">
                      <li>
                        <a href="collapsed-sidebar-1/dashboards/dashboard.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Application</span>
                        </a>
                      </li>
                      <li>
                        <a href="index.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">My Account</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                      <i class="sli-star"></i>
                      <span class="title">Downloads</span>
                    </a>
                  </li>
                  <li>
                    <a ata-target="#referral" data-toggle="collapse" class="btn btn-default btn-flat btn-sidebar btn-sidebar-1" >
                      <i class="sli-star"></i>
                      <span class="title">Referral Program</span>
                    </a>
                    <ul class="list-unstyled collapse" id="referral">
                      <li>
                        <a href="collapsed-sidebar-1/dashboards/dashboard.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Invite Referral</span>
                        </a>
                      </li>
                      <li>
                        <a href="index.html" class="btn btn-default btn-flat btn-sidebar btn-sidebar-2">
                          <i class="sli-star"></i>
                          <span class="title">Earning Status</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
