<div class="sidebar" id="sidebar">
    {{-- Brand --}}
    <div class="brand p-3 text-center bg-dark text-white fw-bold">
        🛍️ PGMS Admin
    </div>

    <hr class="text-white">

    {{-- Search Form --}}
    <form action="{{ route('admin.search') }}" method="GET" class="px-3 mb-3">
        <div class="input-group">
            <input type="text" name="q" class="form-control form-control-sm bg-white border-0" placeholder="Search...">
            <button type="submit" class="btn btn-warning btn-sm border-0">🔍</button>
        </div>
    </form>

    {{-- Dashboard --}}
    <a href="{{ route('admin.admindashboard') }}" class="{{ request()->routeIs('admin.admindashboard') ? 'active' : '' }}">
        🏠 Dashboard
    </a>

    {{-- POS --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">POS</div>
    <a href="{{ route('admin.pos.index') }}">🧾 POS</a>

    {{-- Order Management --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Order Management</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'ordersMenu')">
        📦 Orders <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="ordersMenu">
        <a href="{{ route('admin.orders.index') }}">All Orders</a>
        <a href="{{ route('admin.orders.pending') }}">Pending Orders</a>
        <a href="{{ route('admin.orders.shipped') }}">Shipped Orders</a>
        <a href="{{ route('admin.orders.delivered') }}">Delivered Orders</a>
        <a href="{{ route('admin.orders.cancelled') }}">Cancelled Orders</a>
        <a href="{{ route('admin.orders.refunds') }}">Refund Requests</a>
    </div>

    {{-- Product Management --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Product Management</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'productsMenu')">
        🗂️ Products <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="productsMenu">
        <a href="{{ route('admin.products.index') }}">All Products</a>
        <a href="{{ route('admin.categories.index') }}">Category Setup</a>
        <a href="{{ route('admin.brands.index') }}">Brands</a>
        <a href="{{ route('admin.attributes.index') }}">Product Attributes</a>
        <a href="{{ route('admin.inhouse_products.index') }}">In-house Products</a>
        <a href="{{ route('admin.vendor_products.index') }}">Vendor Products</a>
       <!-- <a href="#">Products Gallery</a>-->
    </div>

    {{-- Coupon / Discount Management --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Coupon & Discounts</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'promotionMenu')">
        🎟️ Coupons <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="promotionMenu">
        <a href="{{ route('admin.promotions.index') }}">All Coupons</a>
        <a href="{{ route('admin.promotions.create') }}">Add New Coupon</a>
        <a href="{{ route('admin.promotions.banners') }}">Banner Setup</a>
        <a href="{{ route('admin.promotions.offers') }}">Offers & Deals</a>
        <a href="{{ route('admin.promotions.notifications')}}">Coupon Notifications</a>
        <a href="{{ route('admin.promotions.announcements')}}">Announcements</a>
    </div>

    {{-- Help & Support --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Help & Support</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'supportMenu')">
        📨 Support <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="supportMenu">
        <a href="{{ route('admin.support.index') }}">All Tickets</a>
        <a href="{{ route('admin.support.create') }}">Create Ticket</a>
        <a href="{{ route('admin.support.inbox') }}">Inbox</a>
        <a href="{{ route('admin.support.messages') }}">Messages</a>
    </div>
{{-- Chat Management --}}
<div class="menu-title text-uppercase text-white small mt-3 px-3">Chat Management</div>
<a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'chatMenu')">
    💬 Chat System <i class="bi bi-chevron-down ms-auto"></i>
</a>
<div class="submenu" id="chatMenu">
    <a href="{{ route('admin.chats.index') }}">All Conversations</a>
</div>



    {{-- Reports & Analysis --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Reports & Analysis</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'reportsMenu')">
        📊 Reports <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="reportsMenu">
        <a href="{{ route('admin.reports.sales') }}">Sales Reports</a>
        <a href="{{ route('admin.reports.products') }}">Product Reports</a>
        <a href="{{ route('admin.reports.orders') }}">Order Reports</a>
    </div>

    {{-- Blog Management --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Blog Management</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'blogMenu')">
        📰 Blog <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="blogMenu">
        <a href="{{ route('admin.blogs.index') }}">All Blogs</a>
        <a href="{{ route('admin.blogs.create') }}">Create Blog</a>
    </div>

    {{-- User Management --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">User Management</div>
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'usersMenu')">
        👥 Users <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="usersMenu">
        <a href="{{ route('admin.users.index') }}">All Users</a>
        <a href="{{ route('admin.users.index', ['role'=>'customer']) }}">Customers</a>
        <a href="{{ route('admin.users.index', ['role'=>'vendor']) }}">Vendors</a>
        <a href="{{ route('admin.users.index', ['role'=>'delivery']) }}">Delivery Men</a>
        <a href="{{ route('admin.users.index', ['role'=>'employee']) }}">Employees</a>
    </div>

    {{-- Advanced System Modules --}}
    <div class="menu-title text-uppercase text-white small mt-3 px-3">Advanced Modules</div>

    {{-- Role & Permission --}}
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'rolesMenu')">
        🔒 Role & Permission <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="rolesMenu">
        <a href="{{ route('admin.roles.index') }}">Roles</a>
        <a href="{{ route('admin.permissions.index') }}">Permissions</a>
    </div>

    {{-- Seller Management --}}
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'sellerMenu')">
        🏬 Seller Management <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="sellerMenu">
        <a href="{{ route('admin.sellers.index') }}">All Sellers</a>
        <a href="{{ route('admin.sellers.approvals') }}">Approvals</a>
        <a href="{{ route('admin.sellers.commission') }}">Commission Setup</a>
        <a href="{{ route('admin.sellers.analytics') }}">Seller Analytics</a>
    </div>

    {{-- Payments & Transactions --}}
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'paymentsMenu')">
        💰 Payments & Transactions <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="paymentsMenu">
        <a href="{{ route('admin.transactions.index') }}">All Transactions</a>
        <a href="{{ route('admin.payment_gateways.index') }}">Payment Gateways</a>
    
     <a href="{{ route('admin.refunds.index') }}"> Refund Tracking</a>


    </div>

    {{-- Shipping & Delivery --}}
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'shippingMenu')">
        🚚 Shipping & Delivery <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="shippingMenu">
        <a href="{{route('admin.shipping.partners.index')}}">Shipping Partners</a>
        <a href="{{route('admin.shipping.tracking.index')}}">Delivery Tracking</a>
        <a href="{{ route('admin.shipping.tracking.index') }}">Status Updates</a>
    </div>

    {{-- Inventory Management --}}
    <a href="#" class="dropdown-toggle" onclick="toggleSubmenu(event, 'inventoryMenu')">
        📦 Inventory Management <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div class="submenu" id="inventoryMenu">
        <a href="{{ route('admin.inventory.warehouse.index') }}">Warehouse Stock</a>
        <a href="{{ route('admin.inventory.stock.index') }}"> Current Stock</a>
        <a href="{{ route('admin.inventory.history.index') }}">Stock History</a>
    </div>
</div>

<style>
.submenu {
    display: none;
    flex-direction: column;
    padding-left: 15px;
}
.submenu.show {
    display: flex;
}
.dropdown-toggle.open i {
    transform: rotate(180deg);
    transition: transform 0.2s ease;
}
a.dropdown-toggle {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>

<script>
function toggleSubmenu(event,id){
    event.preventDefault();
    const el = document.getElementById(id);
    const toggle = event.currentTarget;
    el.classList.toggle('show');
    toggle.classList.toggle('open');
}
</script>
