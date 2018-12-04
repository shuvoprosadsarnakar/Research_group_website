@extends('layouts.meta') 

@section('stylesheet_after')
    <style>
    .container .img{
        text-align:center;
    }
    .container .details{
        border-left:3px solid #ded4da;
    }
    .container .details p{
        font-size:15px;
    }
    </style>
@endsection

@section('body')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                Group:
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias esse tenetur numquam voluptatum dolore vero impedit distinctio inventore dolorum quo minus eaque quod excepturi repudiandae beatae sequi vitae, velit debitis.
            </p>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 details">
                <h4>Members</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                </div>
                <div class="col-md-6 details">
                <h4>Works</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, temporibus expedita dolore officia, ipsum, blanditiis illum ea accusantium itaque vitae dolor! Esse ab, perspiciatis id tempora hic nam magni optio?</p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">zzzzzzzzzzzzzzzxvxcv</p>
                        </a>
                        <a href="#" class="list-group-item ">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem veniam, repellendus et, deleniti ullam quas in vero fuga exercitationem dignissimos velit? Repudiandae, culpa quis illum sapiente animi est alias corporis.</p>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection