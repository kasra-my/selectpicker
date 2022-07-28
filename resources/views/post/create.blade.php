@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row col-lg-6 col-md-6 col-sm-12">
            <h3 class="mb-3">Add Post</h3>


            <form method="POST" action="{{ route('post.store') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group mb-3">
                    <label for="content">Body</label>
                    <textarea type="text" class="form-control" id="body" name="body" placeholder="" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="category" class="mb-2">Select Categories</label>
                </div>
                <div class="form-group mb-4">
                    <select name="category[]" class="selectpicker" multiple data-live-search="true" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }} </option>
                        @endforeach
                    </select>

                    <a class="btn btn-success float-end add_category" data-bs-toggle="modal" data-bs-target="#addCatModal">
                        Add New Category
                    </a>
                </div>

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-success">Save</button>
                    <a type="submit" class="btn btn-secondary" href="{{ route('posts.index') }}">Cancel</a>
                </div>
            </form>
        </div>


        <!-- Add Category Modal -->
        <div class="modal modal-danger fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="Add"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" data-bs-dismiss="modal">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="cat_name">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button style="cursor:pointer" type="button" class="btn btn-success" id="addNewCategory" data-bs-dismiss="modal">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script type="text/javascript">
        $(document).ready(function () {

            $("#addNewCategory").click(function () {

                if ($('#cat_name').val()) {
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('post.addcat') }}",
                        data: {
                            'name': $('#cat_name').val(),
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (results) {
                            $('#category').selectpicker("destroy");
                            $('#category' + ' option').each(function () {
                                $(this).remove();
                            });

                            $.each(results, function (index, value) {
                                $('#category').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                            // $('#category').addClass('selectpicker').selectpicker("rebuild");
                            // $('#category').addClass('selectpicker').selectpicker("refresh");
                            $('#category').addClass('selectpicker').selectpicker("render");

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                }
            });

        });

    </script>
@endsection
