@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row">

        <div class="col-6 mb-5">
            <h2>List of posts</h2>
        </div>
        <div class="col-6 mb-5">
            <a class="btn btn-success float-end" href="{{ route('post.create') }}" role="button">Add a new Post</a>
        </div>
    </div>
    <div class="row mx-5">
        <table class="table table-striped table-hover color-mode table-sm max-width">
            <thead>
            <tr>
                <th scope="col" style="width:10%;">Title</th>
                <th scope="col" style="width:24%;">Body</th>

            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td  style="width:10%;">
                        {{  $post->title }}
                    </td>
                    <td style="width:24%;">
                        {{ $post->body }}
                    </td>
                    <td style="width:10%;">
                        @foreach($post->categories as $cat)
                            <span>{{ $cat->name }} {{ !$loop->last ? ',': ''}}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
