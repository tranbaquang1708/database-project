<?php
/**
 * Created by PhpStorm.
 * User: ad
 * Date: 12/9/2018
 * Time: 7:32 PM
 */
?>

@extends('layouts.app');

@section('content')

    <div class="panel-body">
        @include('errors.503')

        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            {{--}}<div class="form-group">
                <label for="task" class="col-sm-3 control-lable">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>--}}
            <div class="form-group">
                <label for="task" class="col-sm-3 control-lable">Dang ky</label>
                <div class="col-sm-6">
                    <input type="text" name="username" placeholder="Tai khoan" id="user-name" class="form-control">
                    <input type="password" name="password" placeholder="Mat khau" id="user-password" class="form-control">
                    <input type="password" name="repassword" placeholder="Nhap lai mat khau" id="user-repassword" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" name="taskbut" value="signup" class="btn btn-default">
                        <i class="fa fa-plus"></i>Dang ky
                    </button>
                    {{--}}<button type="submit" name="taskbut" value="add" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Task
                    </button>--}}
                </div>
            </div>
            @if(($user  = Session::get('user')) == null)
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-lable">Dang nhap</label>
                    <div class="col-sm-6">
                        <input type="text" name="loginusername" placeholder="Tai khoan" id="user-name" class="form-control">;
                        <input type="password" name="loginpassword" placeholder="Mat khau" id="user-password" class="form-control">;
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" name="taskbut" value="login" class="btn btn-default">
                            <i class="fa fa-plus"></i>Dang nhap
                        </button>
                    </div>
                </div>
            @else
                <div class="form-group">
                    Xin chao
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" name="taskbut" value="logout" class="btn btn-default">
                            <i class="fa fa-plus"></i>Dang xuat
                        </button>
                    </div>
                </div>
            @endif

        </form>

        {{--<form action="{{url('task')}}" method="post" class="form-horizontal">
          //  {{scrf_field()}}

        </form>
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Task
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <td>Task</td>
                            <td>&nbsp;</td>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$task->name}}</div>
                                    </td>

                                    <td>
                                        <form action="/task/{{$task->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button>Delete Task</button>
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
    </div>
--}}
    @endsection
