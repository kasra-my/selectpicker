@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row col-lg-6 col-md-6 col-sm-12 mb-5">

            <h3>Categories </h3>

            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group mb-4">
                    <button style="cursor:pointer" type="submit" class="btn btn-success">Add <i class="fa fa-plus" aria-hidden="true" title="Add Category"></i></button>
                </div>
            </form>

        </div>




        <div class="row col-lg-6 col-md-6 col-sm-12">

            <table id="catsTable" class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Category Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{$category->name}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
