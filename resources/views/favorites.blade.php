
@include('frontend.layout.header')

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('wishlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Wishlist List
                    @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="p-1.5 w-full inline-block align-middle">
                                <div class="overflow-hidden border rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                                                >
                                                    Name
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                                                >
                                                   Description
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
                                                >
                                                    Image
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-bold text-right text-gray-500 uppercase"
                                                >
                                                    Delete
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                        @foreach($favs as $fav)
                    
                                        <tr class="">
                        
                       
                                <td>{{$fav->RecipeName}}</td>
                                <td>
                                    {{Str::limit($fav->RecipeDescription, 120)}}
                                    <p style="margin: 0px;">
                                        <a style="color:green; text-decoration: none;"
                                            href="{{route('recipesingle',$fav->id)}}">Read More</a>
                                    </p>
                                </td>

                                <td>
                                    <img src="{{asset('storage/recipe')}}/{{$fav->Image}}" alt="" width="100px">
                                    {{--public/storage/posts directory eta ke access kora hoy asset diye--}}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    
                                    <form action="{{ route('recipes.removeFromFavorites',['recipe'=>$fav->id]) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="px-4 py-2 text-white bg-red-700 rounded"
                                                                value="Delete">
                                                        </form>
                                                        </td>
                                                    </tr>
                            
                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>



@include('frontend.layout.footer')