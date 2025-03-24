<!-- Developed by Valeria Corrales Hoyos -->
@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <!-- Bienvenida -->
        <div class="col-12 text-center my-4">
            <h2 class="fw-bold">Welcome to your Admin Dashboard</h2>
            <p class="text-muted">Manage your platform efficiently</p>
        </div>

        <!-- Tarjetas de estadísticas -->
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title"> Users</h5>
                        <p class="display-4 fw-bold">{{ $viewData["totalUsers"] }}</p>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-people"></i> Manage Users
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title"> Computers</h5>
                        <p class="display-4 fw-bold">{{ $viewData["totalComputers"]  }}</p>
                        <a href="{{ route('admin.computer.index') }}" class="btn btn-secondary mt-3">
                            <i class="bi bi-pc"></i> Manage Computers
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title"> Components</h5>
                        <p class="display-4 fw-bold">{{ $viewData["totalComponents"] ?? 0 }}</p>
                        <a  class="btn btn-success mt-3">
                            <i class="bi bi-motherboard"></i> Manage Components
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title"> Orders</h5>
                        <p class="display-4 fw-bold">{{ $viewData["totalOrders"] ?? 0 }}</p>
                        <a  class="btn btn-warning mt-3">
                            <i class="bi bi-cart-check"></i> Manage Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
