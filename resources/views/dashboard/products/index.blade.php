@extends('layouts.dashboard')

@section('title', 'المنتجات')

@section('dashboard-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>المنتجات</h1>
    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">إضافة منتج جديد</a>
</div>

@if(isset($products) && $products->count() > 0)
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $product->name }}</h5>
                            <span class="badge bg-primary">{{ $product->formatted_price }} ر.س</span>
                        </div>
                        
                        @if($product->subcategory)
                            <p class="mb-2">
                                <span class="badge bg-secondary">{{ $product->subcategory->name }}</span>
                            </p>
                        @endif
                        
                        @if($product->description)
                            <p class="card-text flex-grow-1">{{ $product->description }}</p>
                        @endif
                        
                        <div class="mt-auto pt-2 border-top">
                            <a href="#" class="btn btn-sm btn-outline-primary">تفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">لا توجد منتجات متاحة حاليًا.</div>
@endif
@endsection
