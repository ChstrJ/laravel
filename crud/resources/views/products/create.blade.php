@extends('layouts.app')

@section('content')
    <main class="container">
        <section>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="titlebar">
                    <h1>Add Product</h1>
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
                        <input type="text" name="name">
                        <label>Description (optional)</label>
                        <textarea cols="10" rows="5" name="description"></textarea>
                        <label>Add Image</label>
                        <img src="" alt="" class="img-product" id="image" />
                        <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                    </div>
                    <div>
                        <label>Category</label>
                        <select name="category" id="">
                            @foreach ($categories as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <label>Inventory</label>
                        <input type="text" class="input" name="quantity">
                        <hr>
                        <label>Price</label>
                        <input type="text" class="input" name="price">
                    </div>
                </div>
                <div class="titlebar">
                    <h1></h1>
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
