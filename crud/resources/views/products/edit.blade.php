@extends('layouts.app')

@section('content')
    <main class="container">
        <section>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="titlebar">
                    <h1>Edit Product</h1>
                    <button>Save</button>
                </div>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $product->name }}">
                        <label>Description (optional)</label>
                        <textarea cols="10" rows="5" name="description" value="{{ $product->description }}">{{ $product->description }}</textarea>
                        <label>Add Image</label>
                        <img src="{{ asset('image/' . $product->image) }}" alt="" class="img-product"
                            id="image" />
                        <input type="hidden" name="hidden_product_image" value={{ $product->image }}>
                        <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                    </div>
                    <div>
                        <label>Category</label>
                        <select name="category" id="">
                            @foreach ($categories as $key => $value)
                                <option value="{{ $key }}" {{ isset($product->category) && $product->category == $key }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <hr>
                        <label>Inventory</label>
                        <input type="text" class="input" name="quantity" value="{{ $product->quantity }}">
                        <hr>
                        <label>Price</label>
                        <input type="text" class="input" name="price" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="titlebar">
                    <h1></h1>
                    <input type="hidden" name="hidden_id" value="{{$product->id}}">
                    <button>Save</button>
                </div>
            </form>
        </section>
    </main>

    <script>
        function showFile(e) {
            const input = e.target;
            const reader = new FileReader();

            reader.onload = () => {
                const dataUrl = reader.result;
                const output = document.querySelector('#image');
                output.src = dataUrl;
            }



            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
