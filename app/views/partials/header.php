<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Mocart</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ;?>/public/assets/img/logo/favicon.png">
        <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NG618JX0N8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NG618JX0N8');
</script>
</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

<header class="header">

        <!-- header top -->
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="header-top-left">
                                <ul class="header-top-list">
                                    <li><a href="https://live.themewild.com/cdn-cgi/l/email-protection#335a5d555c73564b525e435f561d505c5e"><i class="far fa-envelopes"></i>
                                            <span class="__cf_email__" data-cfemail="b8d1d6ded7f8ddc0d9d5c8d4dd96dbd7d5">mocart@gmail.com</span></a></li>
                                    <li><a href="tel:+21236547898"><i class="far fa-headset"></i> +63931234953</a>
                                    </li>
                                    <li class="help"><a href="contact.html"><i class="far fa-comment-question"></i> Need Help?</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                            <div class="header-top-right">
                                <ul class="header-top-list">
                                    <li><a href="shop-grid.html"><i class="far fa-timer"></i> Daily Deal</a></li>
                            
                                    <li class="social">
                                        <div class="header-top-social">
                                            <span>Follow Us: </span>
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-x-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-lg-3 col-xl-3">
                        <div class="header-middle-logo">
                            <a class="navbar-brand" href="<?= site_url('/');?>">
                                <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-lg-6 col-xl-5">
                    </div>
                    <div class="col-7 col-lg-3 col-xl-4">
                        <div class="header-middle-right">
                            <ul class="header-middle-list">
                                  <li>
        <div class="dropdown">
          <?php if ($isLoggedIn): ?>
            <a href="#" class="list-item text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="list-item-icon">
                <i class="far fa-user-circle"></i>
              </div>
              <div class="list-item-info">
                <h6>My Profile</h6>
                <h5>Account</h5>
              </div>
            </a>

            <ul class="dropdown-menu fade-down">
              <li>
                <a class="dropdown-item" href="<?= site_url('profile'); ?>">
                  <i class="fa-solid fa-id-card me-2"></i> View Profile
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                  <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                </a>
              </li>
            </ul>

          <?php else: ?>
            <a href="#" class="list-item text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="list-item-icon">
                <i class="fa-solid fa-right-to-bracket"></i>
              </div>
              <div class="list-item-info">
                <h6>Sign In</h6>
                <h5>Account</h5>
              </div>
            </a>

            <ul class="dropdown-menu fade-down">
              <li>
                <a class="dropdown-item text-primary" href="<?= site_url('login'); ?>">
                  <i class="fa-solid fa-right-to-bracket me-2"></i> Login
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="<?= site_url('register'); ?>">
                  <i class="fa-solid fa-user-plus me-2"></i> Create Account
                </a>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </li>

                                <li>
                                 <a href="<?=site_url('wishlist');?>" class="list-item">
    <div class="list-item-icon">
        <i class="far fa-heart"></i>
        <span><?= $wishlistCount ?? 0 ?></span>
    </div>
    <div class="list-item-info">
        <h6>Wishlist</h6>
        <h5>My Items</h5>
    </div>
</a>

                                </li>
                           <?= $this->call->view('/partials/cart-dropdown', $data); ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">

      <div class="modal-header border-0 bg-light rounded-top-4">
        <h5 class="modal-title fw-bold text-primary" id="logoutModalLabel">
          <i class="fa-solid fa-circle-question text-primary me-2"></i>Confirm Logout
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-center py-4">
        <p class="fs-5 text-muted mb-3">Are you sure you want to log out of your account?</p>
        <i class="fa-solid fa-right-from-bracket text-primary fa-3x mb-3"></i>
      </div>

      <div class="modal-footer border-0 justify-content-center pb-4">
        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
          Cancel
        </button>
        <a href="<?= site_url('logout'); ?>" class="btn btn-primary px-4">
          Logout
        </a>
      </div>

    </div>
  </div>
</div>
        <!-- header middle end -->

        <!-- navbar -->
        <div class="main-navigation">
            <nav class="navbar light navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="index-2.html">
                        <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo.png" class="logo-scrolled" alt="logo">
                    </a>
             <div class="category-all">
    <button class="category-btn" type="button">
        <i class="fas fa-list-ul"></i><span>All Categories</span>
    </button>

    <ul class="main-category">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $cat): ?>
                <li>
                    <a href="<?= site_url('shop-grid/' . $cat['category_id']); ?>">
                        <img src="<?= base_url() . '/' . $cat['category_image']; ?>" 
                             alt="<?= htmlspecialchars($cat['name']); ?>">
                        <span><?= htmlspecialchars($cat['name']); ?></span>
                    </a>

                    <!-- Optional: If you want subcategories -->
                    <?php if (!empty($cat['subcategories'])): ?>
                        <div class="sub-category-mega">
                            <div class="row">
                                <?php foreach ($cat['subcategories'] as $sub): ?>
                                    <div class="col-lg-3">
                                        <div class="category-single">
                                            <h6 class="category-title-text"><?= htmlspecialchars($sub['name']); ?></h6>
                                            <div class="category-link">
                                                <?php if (!empty($sub['products'])): ?>
                                                    <?php foreach ($sub['products'] as $prod): ?>
                                                        <a href="<?= site_url('shop-single/' . $prod['product_id']); ?>">
                                                            <?= htmlspecialchars($prod['name']); ?>
                                                        </a>
                                                    <?php endforeach; ?>

                                                    
                                                <?php else: ?>
                                                    <p>No products available.</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li><p>No active categories available.</p></li>
        <?php endif; ?>
    </ul>
</div>

                    <div class="mobile-menu-right">
                        <div class="mobile-menu-btn">
                            <a href="#" class="nav-right-link search-box-outer"><i class="far fa-search"></i></a>
                            <a href="wishlist.html" class="nav-right-link"><i
                                    class="far fa-heart"></i><span>2</span></a>
                            <a href="shop-cart.html" class="nav-right-link"><i
                                    class="far fa-shopping-bag"></i><span>5</span></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a href="index-2.html" class="offcanvas-brand" id="offcanvasNavbarLabel">
                                <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo.png" alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="<?= site_url('/');?>">Home</a>
                                  
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('about');?>">About</a></li>
                              
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Account</a>
                                    <ul class="dropdown-menu fade-down">
                                     
                                        <li><a class="dropdown-item" href="<?= site_url('profile');?>">My Profile</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item =" href="<?= site_url('order-list');?>">Orders</a>
                                       
                                        </li>
                                        <li><a class="dropdown-item" href="<?= site_url('wishlist');?>">My Wishlist</a></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">Address</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?= site_url('address-list');?>">Address List</a>
                                                </li>
                                                <li><a class="dropdown-item" href="<?= site_url('address-add');?>">Address Add</a>
                                                </li>
                                            </ul>
                                        </li>
                             
                                        <!-- <li><a class="dropdown-item" href="transaction.html">Transaction</a></li>
                                        <li><a class="dropdown-item" href="notification.html">Notification</a></li>
                                        <li><a class="dropdown-item" href="message.html">Messages</a></li>
                                        <li><a class="dropdown-item" href="setting.html">Settings</a></li> -->
                                    </ul>
                                </li>
                            <li class="nav-item mega-menu dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Menu</a>
    <div class="dropdown-menu fade-down p-4">
        <div class="mega-content">
            <div class="container-fluid px-lg-0">
                <div class="row align-items-start">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                                        <h5 class="mega-menu-title"><?= htmlspecialchars($category['name']); ?></h5>
                                        <ul class="mega-menu-item list-unstyled">
                                            <?php if (!empty($category['subcategories'])): ?>
                                                <?php foreach ($category['subcategories'] as $sub): ?>
                                                    <li>
                                                        <a class="dropdown-item py-1" href="<?= site_url('shop-grid/' . $category['category_id']); ?>">
                                                            <?= htmlspecialchars($sub['name']); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li><a class="dropdown-item py-1" href="#">No Subcategories</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <p class="text-muted">No categories available.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ✅ Fixed banner image on the right side -->
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <div class="mega-menu-img text-center">
                            <a href="#">
                                <img src="<?= BASE_URL; ?>/public/assets/img/banner/mega-menu-banner.jpg"
                                     alt="Category Banner" class="img-fluid rounded-3 shadow-sm">
                            </a>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div>
        </div>
    </div>
</li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="<?= site_url('category');?>" >Category</a>
                                 
                                </li>
                          
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('contact');?>">Contact</a></li>
                            </ul>
                            <!-- nav-right -->
                       
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- navbar end -->

    </header>