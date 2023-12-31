@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказ ID{{ $order->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Заказы</a></li>
                        <li class="breadcrumb-item active">{{ $order->id }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            @if (!$order->deleted_at)
                                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary mr-3">Редактировать</a>
                                <form action="{{ route('order.delete', $order->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger">Отменить заказ</button>
                                </form>
                            @else
                                <form action="{{ route('order.restore', $order->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-warning">Восстановить заказ</button>
                                </form>
                            @endif
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Клиент ID</td>
                                        <td>{{ $order->user_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Клиент Имя</td>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Клиент Email</td>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес заказа</td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Товары</td>
                                        <td>
                                            @foreach(json_decode($order->products) as $orderProduct)
                                                <a href="{{ route('product.show', $orderProduct->id) }}">{{ $orderProduct->title }}</a>,
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Сумма заказа</td>
                                        <td>{{ $order->total_price }}BYN</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
