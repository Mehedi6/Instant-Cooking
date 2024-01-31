@include('frontend.layout.header')
    <section class="dietsection">
        <div class=" pt-5 pb-5">
            <div class="container">
                <div class="textbox text-center">
                    <h2 class="text-center">SELECT DIET CATEGORY</h2>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="dietcategory pt-4">
        <div class="container">
            <div class="row gy-4">
                @foreach ($category as $key => $item)
                <div class="col-md-6">
                    <div class="innerimage plant">
                        <div class="text text-center">
                            <h3>{{$item->name}} </h3>
                            <a href="{{url('/categorypost')}}/{{$item->id}}">Show The Recipe</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @include('frontend.layout.footer')

