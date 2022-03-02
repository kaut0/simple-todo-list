@extends('layout.master')
@section('add_todo')
    <div class="container my-4">
        <h4>Add-Todo</h4>
        <div class="container my-2">
            <form action="{{ route('post_todo') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="input" class="form-control" name="add_todo" placeholder="What Todo Today">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@section('todo_list')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Todo List</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($get_todo as $list)
                    <tr>
                        <td>{{ $list->todo }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                data-target="#modalUpdate{{ $list->id }}" style="margin-top: 10px">Edit</button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                data-target="#modalDelete{{ $list->id }}" style="margin-top: 10px">Edit</button>
                        </td>
                    </tr>
                    <!-- Update Modal-->
                    <div class="modal fade" id="modalUpdate{{ $list->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_todo', $list->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group mb-3">
                                            <input type="input" class="form-control" name="add_todo"
                                                placeholder="What Todo Today" value="{{ $list->todo }}">
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Delete Modal-->
                    <div class="modal fade" id="modalDelete{{ $list->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('delete_todo', $list->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <h3>Apakah Ingin Menghapus Todo List Ini??</h3>
                                        <br>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
