<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="position-sticky">
        <h3 class="p-3">Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('products.index')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('orders.index')}}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
            </li>
        </ul>
    </div>
</nav>