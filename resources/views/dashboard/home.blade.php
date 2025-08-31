@extends('layouts.dashboard')

@section('title', 'لوحة التحكم')

@section('dashboard-content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card">
            <h5>عدد الطلبات</h5>
            <h2>{{ $ordersCount }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <h5>عدد المستخدمين</h5>
            <h2>{{ $usersCount }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <h5>إجمالي الأرباح</h5>
            <h2>{{ number_format($totalEarnings, 2) }} $</h2>
        </div>
    </div>
</div>

<!-- Users List -->
<div class="card">
    <div class="card-header" style="background-color: #ecf0f1; font-weight: 600;">
        Top Users – أكتر ناس بيشتروا
    </div>
    <div class="card-body p-0">
        <ul class="list-group rounded-0">
            @foreach($topUsers as $user)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <!-- الاسم بأقصى اليسار -->
                        <div class="col text-start">
                            {{ $user->name }}
                        </div>

                        <!-- عدد الطلبات في المنتصف -->
                        <div class="col text-center">
                            <span class="badge bg-primary rounded-pill">
                                {{ $user->orders_count }} طلب
                            </span>
                        </div>

                        <!-- الزر بأقصى اليمين -->
                        <div class="col text-end">
                            <button class="btn btn-sm btn-outline-secondary"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#orders-{{ $user->id }}"
                                aria-expanded="false"
                                aria-controls="orders-{{ $user->id }}">
                                عرض الطلبات
                            </button>
                        </div>
                    </div>

                    <div class="collapse mt-2" id="orders-{{ $user->id }}">
                        <ul class="list-group">
                            @foreach($user->orders as $order)
                                <li class="list-group-item">
                                    <strong>طلب رقم {{ $order->id }} – إجمالي: {{ $order->total_price }} $</strong>
                                    <ul>
                                        @foreach($order->items as $item)
                                            <li>{{ $item->product->name }} - كمية: {{ $item->quantity }} - السعر: {{ $item->price }} $</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
