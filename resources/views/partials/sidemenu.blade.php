{{-- Side Menu --}}
<div class="list-group side-menu">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
    <a href="{{ route('products') }}" class="list-group-item list-group-item-action {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
    <a href="{{ route('pricing') }}" class="list-group-item list-group-item-action {{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a>
    <a href="{{ route('contact') }}" class="list-group-item list-group-item-action {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
</div>
