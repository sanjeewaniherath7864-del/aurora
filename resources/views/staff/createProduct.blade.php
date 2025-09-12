@extends('layouts.staffView');

@section('header')
    <style>
        .form > h3{
            margin-bottom: 3rem;
        }

        #product-unit{
            color:var(--color-green-dark-1);
            width: 100%;
            height: 6rem;
            padding: 1rem;
            font-size: 2.4rem;
            border-radius: 1rem;
            outline: 1px var(--color-gray-3) solid;
            border: none;
        }

        .feild__file{
            width: 100%;
            border: 1px solid var(--color-gray-3);
            padding: 2rem;
            font-size: 1.8rem;
            border-radius: 1rem;
        }

    </style>
@endsection

@section('table')

    <form action="/staff/{{$user->id}}/products/create" method="POST" class="form form_create_product" enctype="multipart/form-data">
        @csrf
        <h3>Create new Product</h3>

        <div class="feild">
            <label class="feild__label">product name</label>
            <input type="text" name="name" class="feild__input" required />
        </div>
        <div class="feild">
            <label class="feild__label">product price</label>
            <input type="number" name="price" class="feild__input" required />
        </div>

        <div class="row">
            <div class="feild">
                <label class="feild__label">unit</label>

                <select name="unit" id="product-unit" required  > 
                    <option value="kg">1 KG units</option>
                    <option value="g">100 g units</option>
                    <option value="unit" selected>1 item units</option>
                </select>
            </div>
            <div class="feild">
                <label class="feild__label">stoke</label>
                <input type="number" name="stoke" class="feild__input" required />
            </div>
            
        </div>
        <div class="feild">
                <label class="feild__label">upload image (100 X 100)</label>
                <input type="file" name="file" accept="image/*" class="feild__file" required />
            </div>
        <button type="submit" class="form__btn-submit--round">create new product</button>
        
    </form>

@endsection