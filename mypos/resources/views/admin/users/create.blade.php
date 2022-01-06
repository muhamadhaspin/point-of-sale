@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('users.store') }}" method="post">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Administrator</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter Name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter Email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter password"
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm password"
                                class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="card">
                                <div class="card-header d-flex p-0">

                                    <h3 class="card-title p-3">Permissions</h3>
                                    @php
                                    $models = ['users', 'categories', 'products'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                    @endphp
                                    <ul class="nav nav-pills ml-auto p-2">
                                        @foreach ($models as $i => $model)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $i == 0 ? 'active' : ''}}" href="#{{ $model }}"
                                                data-toggle="tab">
                                                {{ $model == 'users' ? "administrator" : $model }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">

                                        @foreach ($models as $i => $model)
                                        <div class="tab-pane {{ $i == 0 ? 'active' : '' }}" id="{{ $model }}">
                                            <div class="row">

                                                @foreach ($maps as $map)
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="{{ $model . "_" . $map }}" name="permissions[]"
                                                            value="{{ $model . "_" . $map }}">
                                                        <label for="{{ $model . "_" . $map }}"
                                                            class="custom-control-label">
                                                            {{ $map }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa fa-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection