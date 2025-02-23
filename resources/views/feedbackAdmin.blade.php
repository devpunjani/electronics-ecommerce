{{-- Extends Admin Panel --}}
@extends('layout.app')

@section('title')
View Feedbacks
@endsection

@section('open-feedback')
nav-item menu-open
@endsection

{{-- Adds Dashboard Subtitle --}}
@section('subtitle')
Feedbacks
@endsection

@section('content')
    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th> Sr. No.</th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Message </th>
            </tr>
        </thead>
        <tbody>
            <?php $count=1; ?>
            @foreach ($feedbacks as $feedback )
                <tr>
                    <td> {{  $count++ }}</td>
                    <td> {{  $feedback->name }}</td>
                    <td> {{  $feedback->email }}</td>
                    <td> {{  $feedback->phone }}</td>
                    <td> {{  $feedback->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
