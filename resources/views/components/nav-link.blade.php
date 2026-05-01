<a class="nav-link {{ request()->routeIs($to) ? 'active' : '' }}" {{ request()->routeIs ($to) ? 'aria-current="page"' : '' }}
    href="<?= route($to); ?>"
>
    {{ $slot }}
</a>
