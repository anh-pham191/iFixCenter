@extends('layouts.main')

@section('content')
    <div id="admin">

        <h1>Account Admin Panel</h1>
        <hr>

        <p>Here you can view and delete accounts.</p>

        <h2>User Account</h2>
        <hr>

        {{--<ul>--}}
        {{--@foreach($users as $user)--}}
        {{--<li>--}}
        {{--{{ $user->firstname }}--}}
        {{--{{ $user->email }}--}}
        {{--@if($user->admin==0)--}}
        {{--{{ Form::open(array('url'=>'users/ban', 'class'=>'form-inline')) }}--}}
        {{--{{ Form::hidden('id', $user->id) }}--}}
        {{--{{ Form::submit('Ban') }}--}}
        {{--{{ Form::close() }}--}}
        {{--@elseif($user->admin==2)--}}
        {{--{{ Form::open(array('url'=>'users/unban', 'class'=>'form-inline')) }}--}}
        {{--{{ Form::hidden('id', $user->id) }}--}}
        {{--{{ Form::submit('Unban') }}--}}
        {{--{{ Form::close() }}--}}
        {{--@endif--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        <div id=user-control>
            <table border=1 style="width:100%">
                <tr>
                    <td>First Name</td>
                    <td>Email Address</td>
                    <td>Action</td>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->email}}</td>
                        <td> @if($user->admin==0)
                                {{ Form::open(array('url'=>'users/ban', 'class'=>'form-inline')) }}
                                {{ Form::hidden('id', $user->id) }}
                                {{ Form::submit('Ban') }}
                                {{ Form::close() }}
                            @elseif($user->admin==2)
                                {{ Form::open(array('url'=>'users/unban', 'class'=>'form-inline')) }}
                                {{ Form::hidden('id', $user->id) }}
                                {{ Form::submit('Unban') }}
                                {{ Form::close() }}
                            @elseif($user->admin==1)
                                <?php echo "Admin" ?>
                            @endif</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div><!-- end admin -->


@stop