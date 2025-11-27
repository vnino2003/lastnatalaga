<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
--primary: #1abc9c; --secondary: #34495e; --light-bg: #f8f9fa; --border-color: #e9ecef; --text-muted: #6c757d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* NOTE: You need to ensure you have a CSS rule for .active 
           in your stylesheet for the visual change to appear. 
           I have not added one per your instructions. */
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo.png" alt="logo">
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="<?= site_url('admin/dashboard'); ?>">
                    <i class="bi bi-grid-3x3-gap"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" data-bs-toggle="collapse" data-bs-target="#catalogMenu">
                    <i class="bi bi-collection"></i>
                    <span>Catalog</span>
                </a>
                <ul class="sidebar-submenu collapse" id="catalogMenu">
                    <li><a href="<?= site_url('admin/products');?>">Products</a></li>
                    <li><a href="<?= site_url('admin/category');?>">Categories</a></li>

                </ul>
            </li>
            <li>
                <a href="<?= site_url('admin/customer')  ?>">
                    <i class="bi bi-people"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="<?= site_url('admin/order')  ?>">
                    <i class="bi bi-receipt"></i>
                    <span>Orders</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-logout">
            <button class="logout-btn" id="logoutBtn">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
            </button>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-sm">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="logoutModalLabel"><i class="bi bi-box-arrow-right me-2"></i>Confirm Logout</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-0">Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="<?= site_url('logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const logoutBtn = document.getElementById('logoutBtn');
            // Check if element exists before adding event listener to prevent errors
            if (logoutBtn) {
                const logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
                logoutBtn.addEventListener('click', () => {
                    logoutModal.show();
                });
            }
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Get the current full URL
        const currentUrl = window.location.href;
        const sidebarLinks = document.querySelectorAll('.sidebar-menu a');

        sidebarLinks.forEach(link => {
            const linkHref = link.href; // Use .href to get the absolute URL

            // Skip empty links or toggle links
            if (!linkHref || linkHref.includes('#') || linkHref === 'javascript:void(0);') return;

            // 2. Check if current URL matches the link or starts with it
            if (currentUrl === linkHref || currentUrl.startsWith(linkHref)) {
                
                // Add active class to the link
                link.classList.add('active');

                // 3. If this link is inside a submenu (e.g., inside Catalog)
                const parentCollapse = link.closest('.collapse');
                
                if (parentCollapse) {
                    // Open the dropdown menu
                    new bootstrap.Collapse(parentCollapse, { toggle: true });

                    // Find the parent link that controls this dropdown (Catalog)
                    const parentId = parentCollapse.getAttribute('id');
                    const parentToggle = document.querySelector(`[data-bs-target="#${parentId}"]`);
                    
                    // Make the parent (Catalog) active too
                    if (parentToggle) {
                        parentToggle.classList.add('active');
                        parentToggle.setAttribute('aria-expanded', 'true');
                        parentToggle.classList.remove('collapsed');
                    }
                }
            }
        });
    });
    </script>

</body>
</html>