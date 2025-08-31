@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-header">
                لوحة التحكم
            </div>
            <nav class="nav flex-column px-2">
                <a href="{{ route('dashboard') }}" class="nav-link @if(request()->routeIs('dashboard')) active @endif">
                    <i class="bi bi-speedometer2"></i> داشبورد
                </a>
                <a href="{{ route('dashboard.products.index') }}" class="nav-link @if(request()->routeIs('dashboard.products.index')) active @endif">
                    <i class="bi bi-box"></i> المنتجات
                </a>
                <a href="{{ route('dashboard.stores.index') }}" class="nav-link @if(request()->routeIs('dashboard.stores.index')) active @endif">
                    <i class="bi bi-shop"></i> المتاجر
                </a>
                <a href="{{ route('dashboard.orders.index') }}" class="nav-link @if(request()->routeIs('dashboard.orders.index')) active @endif">
                    <i class="bi bi-cart-check"></i> الطلبات
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main id="content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <!-- Navbar -->
            <nav class="navbar ">

                <div class="ms-auto d-flex align-items-center">
                    <span class="me-3">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm">تسجيل الخروج</button>
                    </form>
                </div>
            </nav>

            @yield('dashboard-content')
        </main>
    </div>
</div>

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        direction: rtl;
        color: #333;
    }

    /* Sidebar */
    #sidebar {
        width: 250px;
        background-color: #222831;
        color: #eee;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 1040;
        padding-top: 1rem;
        transition: transform 0.3s ease;
    }

    #sidebar .nav-link {
        color: #eee;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 0 15px 15px 0;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.25rem;
    }

    #sidebar .nav-link:hover,
    #sidebar .nav-link.active {
        background-color: #393e46;
        color: #fff;
        text-decoration: none;
    }

    .sidebar-header {
        padding: 0.5rem 1.5rem;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Content */
    #content {
        margin-right: 250px;
        padding: 1rem;
        transition: margin 0.3s ease;
    }

    /* Stats cards */
    .card {
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        background-color: #fff;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        padding: 1.5rem;
        text-align: center;
        height: 100%;
    }

    .stat-card h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0.5rem 0;
        color: #34495e;
    }

    .stat-card h5 {
        font-weight: 600;
        color: #7f8c8d;
        margin: 0;
    }
    /* Navbar */
    nav.navbar {
                position: fixed;
                top: 0;
                right: 250px;
                left: 0;
                height: 56px;
                background-color: #393e46;
                color: #eee;
                display: flex;
                align-items: center;
                padding: 0 1rem;
                z-index: 1050;
                justify-content: flex-end;
            }
            nav.navbar .user-name {
                margin-left: 1rem;
                font-weight: 600;
            }
            nav.navbar form button {
                background: none;
                border: none;
                color: #ff5252;
                font-weight: 600;
                cursor: pointer;
            }
            nav.navbar form button:hover {
                text-decoration: underline;
            }
    /* Responsive */
    @media (max-width: 991.98px) {
        #sidebar {
            transform: translateX(100%);
        }

        #sidebar.show {
            transform: translateX(0);
        }

        #content {
            margin-right: 0;
            width: 100%;
        }
        nav.navbar {
                right: 0;
            }
    }

    /* Toggle button */
    #toggleSidebarBtn {
        font-size: 1.5rem;
        color: #6c757d;
    }

    #toggleSidebarBtn:focus {
        box-shadow: none;
    }
           
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggleSidebarBtn');
        const sidebar = document.getElementById('sidebar');
        
        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }
    });
</script>
@endpush
@endsection
