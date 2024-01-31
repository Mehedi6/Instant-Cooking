@extends('layouts.admin')

@section('content')

<!-- /.content-header -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header  ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Recipe List</h3>
                            <a href="{{route('Recipe.index')}}" class="btn btn-primary">Back to the list</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if(session('success'))
                        <div class="btn btn-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                        <div class="btn btn-danger">{{ session('error') }}</div>
                        @endif
                        <form action="{{route('Recipe.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Recipe Name</label>
                                    <input type="text" name="recipe_name" id="recipe_name" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label for="">Recipe Ingredients</label>
                                    <div class="form-control" role="group" aria-label="Basic checkbox toggle button group">
                                    <select name="ing[]" id="ing" multiple="multiple" required>
                                        <option value="Butter">Butter</option>
                                        <option value="Egg">Egg</option>
                                        <option value="Garlic">Garlic</option>
                                        <option value="Milk">Milk</option>
                                        <option value="Onion">Onion</option>
                                        <option value="sugar">Sugar</option>
                                        <option value="Flour">Flour</option>
                                        <option value="Oil">Oil</option>
                                        <option value="Rice">Rice</option>
                                        <option value="Mayonaise">Mayonnaise</option>
                                        <option value="Carrot">Carrot</option>
                                        <option value="Tomato">Tomato</option>
                                        <option value="Potato">Potato</option>
                                        <option value="Cucumber">Cucumber</option>
                                        <option value="Sweet Potato">Sweet Potato</option>
                                        <option value="Eggplant">Eggplant</option>
                                        <option value="Lettuce">Lettuce</option>
                                        <option value="Corn">Corn</option>
                                        <option value="Mushroom">Mushrooms</option>
                                        <option value="Lemon">Lemon</option>
                                        <option value="Lime">Lime</option>
                                        <option value="Apple">Apple</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Banana">Banana</option>
                                        <option value="Mango">Mango</option>
                                        <option value="Pineapple">Pineapple</option>
                                        <option value="Grape">Grape</option>
                                        <option value="Ice Cream">Ice Cream</option>
                                        <option value="Coconut">Coconut</option>
                                        <option value="Peanut">Peanut</option>
                                        <option value="Cashew">Cashew</option>
                                        <option value="Chia Seed">Chia seed</option>
                                        <option value="Cheese">Cheese</option>
                                        <option value="Yogurt">Yogurt</option>
                                        <option value="Ghee">Ghee</option>
                                        <option value="Cream">Cream</option>
                                        <option value="Condensed Milk">Condensed Milk</option>
                                        <option value="Stock">Stock</option>
                                        <option value="Soy Sauce">Soy Sauce</option>
                                        <option value="Vineger">Vineger</option>
                                        <option value="Seseme Oil">Seseme Oil</option>
                                        <option value="Bread">Bread</option>
                                        <option value="Paratha">Paratha</option>
                                        <option value="Noodles">Noodles</option>
                                        <option value="Pasta">Pasta</option>
                                        <option value="Peas">Peas</option>
                                        <option value="Lentils">Lentils</option>
                                        <option value="Rice">Rice</option>
                                        <option value="Basmati Rice">Basmati Rice</option>
                                        <option value="Yeast">Yeast</option>
                                        <option value="Salt">Salt</option>
                                        <option value=100>Russia</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <input type="text" id="category" name="category" class="form-control">
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Cooking Time</label>
                                        <input type="text" name="cookingtime" id="cookingtime" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Video Link</label>
                                        <input type="text" name="video" id="video" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Nutritional Values</label>
                                        <input type="text" name="nutrition" id="nutrition" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">External Link</label>
                                        <input type="text" name="link" id="link" class="form-control">
                                    </div>
                                </div>
                            </div>
{{-- 
                            <div class="mb-3">
                                <label for="">Ratings</label>
                                <select class="form-select" value="{{old('category')}}" name="reating" aria-label="Default select example">
                                    <option selected>Select Reating</option>
                                    <option value="1">One Star</option>
                                    <option value="2">Two Star</option>
                                    <option value="3">Three Star</option>
                                    <option value="4">Four Star</option>
                                    <option value="5">Five Star</option>
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Receipe Description</label>
                                <textarea name="recipe_description" id="recipe_description" cols="30" rows="4" class="form-control"></textarea>
                            </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
                    <script>
                        new MultiSelectTag('ing')  // id
                    </script>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        @endsection
