@extends('layouts.meta')

@section('stylesheet')

@endsection


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <form action="/create/member" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" name="status" class="form-control" id="status">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control" id="image" />
                    </div>
                    <div class="form-group">
                        <label for="dropdownMenu1">Type:</label>
                        <select name="type" size="1" class="form-control" id="dropdownMenu1">
                            <option value="Project">Project</option>
                            <option value="Thesis" selected>Thesis</option>
                            <option value="Research" disabled>Research</option>
                            <option value="Professional work">Professional work</option>
                            <option value="Course work">Course work</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Create post</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                    <form action="/create/member" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Add new post type:</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <button type="submit" class="btn btn-default">Create type</button>
                    </form>
            </div>
            <div class="well">
                    <form action="/create/member" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Add new group:</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <button type="submit" class="btn btn-default">Create group</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('javascript')

@endsection