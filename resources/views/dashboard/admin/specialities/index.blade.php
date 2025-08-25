@extends('dashboard.app')

@section('title', 'Specialities')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Specialities</h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">List of all Registered Specialities</p>
                            <a href="{{ route('specialities.add') }}" class="btn btn-primary position-absolute"
                                style="top: 0; right: 0;">Add Speciality</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- specialities -->
            <section class="content">
                <div class="container-fluid">
                    <x-success-state />
                    <x-error-state />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    @if (empty($specialities->items()))
                                        <x-empty-state>{{ 'Specialities' }}</x-empty-state>
                                    @else
                                        <div class="card-header">
                                            <h3 class="card-title text-center" style="font-size: 1.5em;">Specialities</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <table class="table table-sm table-bordered border-primary "
                                            style="width: 100%; border: 1px solid #ddd;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%; text-align: center; padding: 10px;">#</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Title</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Edit</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($specialities as $speciality)
                                                    <tr>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $speciality->title }}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-success" href="{{ route('specialities.edit',$speciality) }}">Edit</a>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <form action="{{ route('specialities.destroy', $speciality) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    {{ $specialities->links() }}
                </div>
            </section>
            <!-- end specialities -->
        </div>
    </main>


@endsection
