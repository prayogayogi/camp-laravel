@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        Update Discount : {{ $discount->name }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route("admin.discount.update", $discount->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="id" value="{{ $discount->id }}">
                            <div class="form-group mb-4">
                                <label for="name" class="form-lable">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old("name") ? : $discount->name }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="code" class="form-lable">Code</label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old("code") ? : $discount->code }}" required>
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="code" class="form-lable">Description</label>
                                <textarea name="description" id="description" cols="0" rows="2" class="form-control  @error('description') is-invalid @enderror">{{ old("description") ? : $discount->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="discount" class="form-lable">Discount Percentage</label>
                                <input type="number" name="percentage" id="discount" min="1" max="100" class="form-control @error('percentage') is-invalid @enderror" value="{{ old("percentage") ? : $discount->percentage }}" required>
                                @error('percentage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
