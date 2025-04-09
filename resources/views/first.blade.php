<p>こんにちは、{{$name}}</p> 
{{-- bladeにechoはいらない {{ }}  これでやる--}}

@foreach ($products as $product)

    <p>{{$product->id}},{{$product->name}}</p>
    <p>{{$product->price}}</p>

@endforeach