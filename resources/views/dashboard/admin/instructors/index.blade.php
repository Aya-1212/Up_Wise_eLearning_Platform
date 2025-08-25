@extends('dashboard.app')

@section('title', 'Instructors')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Instructors</h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">List of all Registered Instructors</p>
                            <a href="{{ route('instructors.add') }}" class="btn btn-primary position-absolute"
                                style="top: 0; right: 0;">Add Instructor</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Instructors -->
            <section class="content">
                <div class="container-fluid">
                    <x-success-state />
                    <x-error-state />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    @if (empty($instructors->items()))
                                        <x-empty-state>{{ 'Instructors' }}</x-empty-state>
                                    @else
                                        <div class="card-header">
                                            <h3 class="card-title text-center" style="font-size: 1.5em;">Instructors</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <table class="table table-sm table-bordered border-primary "
                                            style="width: 100%; border: 1px solid #ddd;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%; text-align: center; padding: 10px;">#</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Name</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Email</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Speciality
                                                    </th>
                                                    <th style="width: 30%; text-align: center; padding: 10px;">Image</th>
                                                    <th style="width: 30%; text-align: center; padding: 10px;">LinkedIn</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Edit</th>
                                                    <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($instructors as $instructor)
                                                    <tr>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $instructor->name }}
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $instructor->email }}
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            <a href="{{ route('specialities.show', $instructor->speciality_id) }}">
                                                                {{ $instructor->speciality_id }}
                                                            </a>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <img src="{{ asset("uploads/instructors/{$instructor->image}") }}"
                                                                alt="=category" class="img-fluid " height="100"
                                                                width="120">
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $instructor->linkedin_url }}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-success"
                                                                href="{{ route('instructors.edit', $instructor) }}">Edit</a>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <form action="{{ route('instructors.destroy', $instructor) }}"
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
                    {{ $instructors->links() }}
                </div>
            </section>
            <!-- end instructors -->
        </div>
    </main>


@endsection
