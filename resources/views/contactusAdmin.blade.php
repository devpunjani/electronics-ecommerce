{{-- Extends Admin Panel --}}
@extends('layout.app')

@section('title')
View Contact Us
@endsection

@section('open-contactus')
nav-item menu-open
@endsection

{{-- Adds Dashboard Subtitle --}}
@section('subtitle')
Contact Us
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
            @foreach ($contactus as $contact )
                <tr>
                    <td> {{  $count++ }}</td>
                    <td> {{  $contact->name }}</td>
                    <td> {{  $contact->email }}</td>
                    <td> {{  $contact->phone }}</td>
                    <td> {{  $contact->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
