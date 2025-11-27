   <div class="user-area bg-2 py-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar">
        <form id="userProfilePicForm"
      action="<?= site_url('/update-profile-picture'); ?>" 
      method="POST" 
      enctype="multipart/form-data">

  <div class="sidebar-top text-center">
    <div class="sidebar-profile-img position-relative d-inline-block">
      <img src="<?=  base_url() . $user['profile_picture'] ?>" 
          alt="Profile Picture" 
          id="userProfileImage"
          class="img-fluid rounded-circle"
          style="width: 120px; height: 120px; object-fit: cover; cursor: pointer;">

      <button type="button" class="profile-img-btn position-absolute bottom-0 end-0 btn btn-sm btn-light"
              onclick="document.getElementById('profileInput').click();">
          <i class="far fa-camera"></i>
      </button>

      <input type="file" id="profileInput" name="profile_picture" class="d-none" accept="image/*">
    </div>

    <h5 class="mt-3"><?= htmlspecialchars($user['first_name'] ?? '') . ' ' . htmlspecialchars($user['last_name'] ?? ''); ?></h5>
    <p><?= htmlspecialchars($user['email'] ?? ''); ?></p>

  </div>
</form>

                            <ul class="sidebar-list">
                          
                                <li><a href="<?= site_url('profile'); ?>"><i class="far fa-user"></i> My Profile</a></li>
                                <li class="user-menu">
                                    <a href="<?= site_url('/order-list');?>">
                                        <i class="far fa-shopping-bag"></i> Orders </i>
                                    </a>
                             
                                </li>
                                <li><a href="<?= site_url('wishlist'); ?>""><i class="far fa-heart"></i> My Wishlist</a></li>
                                <li class="user-menu">
                                    <a href="#user-menu3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user-menu3" class="collapsed">
                                        <i class="far fa-location-dot"></i> Address <i class="far fa-angle-down user-menu-angle"></i>
                                    </a>
                                    <div class="collapse" id="user-menu3">
                                        <ul class="user-menu-list">
                                            <li><a href="<?= site_url('address-list');?>">Address List</a></li>
                                            <li><a href="<?= site_url('address-add');?>">Address Add</a></li>
                                        </ul>
                                    </div>
                                </li>
                              
                           
                             
                                <li><a href="<?= site_url('logout');?>"><i class="far fa-sign-out"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>