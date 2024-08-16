<!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="white" data-background-color="man-of-steel" data-image="app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="<?php echo site_url();?>" class="logo-text float-left">
              <div class="logo-img"><img src="<?php echo site_url('app-assets/img/logos/'.$Library->logoimg);?>" width="45"/></div><span class="text align-middle"><?php echo $Library->short_name;?></span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-toggle-right toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="nav-item <?php if($pagename == "Dashboard"){ echo 'active';}?>" ><a href="<?php echo site_url('dashboard'); ?>"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a></li>
              <li class=" nav-item <?php if($pagename == "Issue Register" || $pagename == "Book Issue" || $pagename == "View BookIssue Details"){ echo 'active';}?>"><a href="<?php echo site_url('bookissues');?>"><i class="ft-log-out"></i><span data-i18n="" class="menu-title">Book Issue</span></a></li>
              <li class=" nav-item <?php if($pagename == "Book Receive" ){ echo 'active';}?>"><a href="<?php echo site_url('bookreceive'); ?>"><i class="ft-log-in"></i><span data-i18n="" class="menu-title">Book Return</span></a></li>
              <li class=" nav-item <?php if($pagename == "Purchase Register" || $pagename == "Add Purchase" || $pagename == "View Purchase" || $pagename == "Edit Purchase" ){ echo 'active';}?>"><a href="<?php echo site_url('purchasebooks');?>"><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title">Book Purchase</span></a></li>
              <li class=" nav-item <?php if($pagename == "Members List" || $pagename == "New Members" || $pagename == "Edit Members"){ echo 'active';}?>"><a href="<?php echo site_url('members');?>"><i class="ft-users"></i><span data-i18n="" class="menu-title">Members</span></a></li>
              <li class="has-sub nav-item <?php if($pageheading == "Masters"){ echo 'active';} ?>"><a href="#"><i class="ft-settings fa fa-spin"></i><span data-i18n="" class="menu-title">Masters</span></a>
                <ul class="menu-content">
                  <li <?php if($pagename =='Category List' || $pagename =='New Category' || $pagename =='Edit Category'){ echo 'class="active"';}?>><a href="<?php echo site_url('appmasters/categories');?>" class="menu-item">Categories</a></li>
                  <li <?php if($pagename =='Source List' || $pagename =='New Source' || $pagename =='Edit Source'){ echo 'class="active"';}?>><a href="<?php echo site_url('appmasters/source');?>" class="menu-item">Source</a></li>
                  <li <?php if($pagename =='Books List' || $pagename =='New Books' || $pagename =='Edit Books'){ echo 'class="active"';}?>><a href="<?php echo site_url('appmasters/books');?>" class="menu-item">Books</a></li>
                  <li <?php if($pagename =='Groups List' || $pagename =='New Groups' || $pagename =='Edit Groups'){ echo 'class="active"';}?>><a href="<?php echo site_url('appmasters/groups');?>" class="menu-item">Groups</a></li>
                  <li <?php if($pagename =='User Role List' || $pagename =='New User Role' || $pagename =='Edit User Role'){ echo 'class="active"';}?>><a href="<?php echo site_url('appmasters/userrole');?>" class="menu-item">User Role</a></li>
                  <li <?php if($pagename =='Users List' || $pagename =='New Users' || $pagename =='Edit Users'){ echo 'class="active"';}?>><a href="<?php echo site_url('appmasters/users');?>" class="menu-item">Users</a></li>
                </ul>
              </li>
              <li class="has-sub nav-item <?php if($pageheading == "Reports"){ echo 'active';} ?>"><a href="#"><i class="ft-printer"></i><span data-i18n="" class="menu-title">Reports</span></a>
                <ul class="menu-content">
                  <li <?php if($pagename == 'Available Books Report'){ echo 'class="active"';}?>><a href="<?php echo site_url('reports/available-books');?>" class="menu-item">Books Report</a></li>
                  <li <?php if($pagename == 'Books Issue Report'){ echo 'class="active"';}?>><a href="<?php echo site_url('reports/books-issue-report');?>" class="menu-item">Issue Report</a></li>
                  <li <?php if($pagename == 'Books Purchase Report'){ echo 'class="active"';}?>><a href="<?php echo site_url('reports/books-purchase-report');?>" class="menu-item">Purchase Report</a></li>
                  <li <?php if($pagename == 'Books Damage Report'){ echo 'class="active"';}?>><a href="<?php echo site_url('reports/damage-book-report');?>" class="menu-item">Damage Report</a></li>
                  <li <?php if($pagename == 'Membership'){ echo 'class="active"';}?>><a href="<?php echo site_url('reports/membership');?>" class="menu-item">Membership Card</a></li>
                  <li <?php if($pagename == 'Membership Report'){ echo 'class="active"';}?>><a href="<?php echo site_url('reports/membership_report');?>" class="menu-item">Masavari Report</a></li>
                </ul>
              </li>
              <li class="has-sub nav-item <?php if($pageheading == "Office"){ echo 'active';} ?>"><a href="#"><i class="ft-edit"></i><span data-i18n="" class="menu-title">Office</span></a>
                <ul class="menu-content">
                  <li class="has-sub nav-item"><a href="#" class="menu-item"><span data-i18n="" class="menu-title">Accounts</span></a>
                  	<ul class="menu-content">
                    <li <?php if($pagename == 'Membership List'|| $pagename=='Create Membership'|| $pagename=='Edit Membership') { echo 'class="active"';}?>><a href="<?php echo site_url('Office/membership'); ?>" class="menu-item">Masa vari</a></li>
                      <li <?php if($pagename == 'Transaction List'|| $pagename=='Create Transaction'|| $pagename=='Edit Transaction') { echo 'class="active"';}?>><a href="<?php echo site_url('Office/transactions'); ?>" class="menu-item">Transaction</a></li>
                        <li <?php if($pagename == 'Income Expense Items'|| $pagename=='Create Income Expense Items' || $pagename=='Edit Income Expense Items') { echo 'class="active"';}?>><a href="<?php echo site_url('office/Incomeexpense');?>" class="menu-item">Items</a></li>
                        <li <?php if($pagename == 'Account Open') { echo 'class="active"';}?>><a href="<?php echo site_url('Office/Accountopen'); ?>" class="menu-item">Account Open</a></li>
                  	</ul>
                  </li>
                  <li class="has-sub nav-item"><a href="#" class="menu-item"><span data-i18n="" class="menu-title">Paper Magazine</span></a>
                  	<ul class="menu-content">
                    	<li <?php if($pagename == 'Paper Magazine Register'|| $pagename == "New Paper Magazine Register"){ echo 'class="active"';}?>><a href="<?php echo site_url('office/Papermagazineregister');?>" class="menu-item"> Register</a></li>
                        <li <?php if($pagename == 'Types List'||$pagename == 'New Types'|| $pagename == 'Edit Types'){ echo 'class="active"';}?>><a href="<?php echo site_url('Office/types'); ?>" class="menu-item">Types</a></li>
                        <li <?php if($pagename == 'Paper Magazine List'||$pagename == 'New Paper Magazine'|| $pagename == 'Edit Paper Magazine'){ echo 'class="active"';}?>><a href="<?php echo site_url('Office/Papermagazine'); ?>" class="menu-item">Paper Magazine</a></li>
                  	</ul>
                  </li>
                  <li <?php if($pagename == 'Circulars List' || $pagename == 'New Circulars' || $pagename == 'Edit Circulars') { echo 'class="active"';}?>><a href="<?php echo site_url('Office/circulars'); ?>" class="menu-item">Circulars</a></li>
                  <li <?php if($pagename == 'Damage Books' || $pagename == 'Add Damage Books') { echo 'class="active"';}?>><a href="<?php echo site_url('office/damagebooks');?>" class="menu-item">Damage Books</a></li>
                  <li <?php if($pagename == 'Book Request List' || $pagename == 'New Book Request') { echo 'class="active"';}?> ><a href="<?php echo site_url('office/requestbooks');?>" class="menu-item">Request Books</a></li>
                </ul>
              </li>
              <li class=" nav-item"><a href="<?php echo site_url('login/logout');?>"><i class="ft-power"></i><span data-i18n="" class="menu-title">Logout</span></a></li>
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      <!-- / main menu-->