@extends('dashboard.app')

@section('title', 'Messages')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Messages</h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">List of all Messages</p>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            {{-- Debug --}}
            <!-- messages -->
            <section class="content">
                <div class="container-fluid">
                    <x-success-state />
                    <x-error-state />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    @if (empty($messages->items()))
                                        <x-empty-state>{{ 'Messages' }}</x-empty-state>
                                    @else
                                        <table class="table table-sm table-bordered border-primary "
                                            style="table-layout: fixed; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;text-align: center;">#</th>
                                                    <th style="width: 15%;text-align: center;">Name</th>
                                                    <th style="width: 15%;text-align: center;">Email</th>
                                                    <th style="width: 20%;text-align: center;">Subject</th>
                                                    <th style="width: 28%;width: 50%; text-align: center;">Message</th>
                                                    <th style="width: 8%;text-align: center;">User_Id</th>
                                                    <th style="width: 9%;text-align: center;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($messages as $message)
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td style="text-align: center;">{{ $message->name }}</td>
                                                        <td style="text-align: center;">{{ $message->email }}</td>
                                                        <td style="text-align: center;">{{ $message->subject }}</td>
                                                        <td style="text-align: center;">{{ $message->message }} </td>
                                                        <td style="text-align: center;">
                                                            @if ($message->user_id != null)
                                                            <a href="{{ route('users.show', $message->user_id) }}">
                                                                {{ $message->user_id }}
                                                            </a>
                                                            @else    
                                                            {{ 'N/A' }}
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <form action="{{ route('messages.destroy', $message->id) }}"
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
                    {{ $messages->links() }}
                </div>
            </section>
            <!-- end messages -->
    </main>


@endsection
