<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\UpdateRequest;
use App\Http\Requests\Admin\Discount\DiscountRequest;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return response()->view("admin.discount.index", [
            "discounts" => $discounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view("admin.discount.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        $discount = Discount::create($request->input());
        $request->session()->flash("success", "A new discount has been created");
        return redirect(route("admin.discount.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return response()->view("admin.discount.edit", [
            "discount" => $discount
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Discount $discount)
    {
        $data = $request->input();
        $discount->update($data);
        $request->session()->flash("success", "Discount {$request->name} has been updated");
        return redirect(route("admin.discount.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Discount $discount)
    {
        $discount->delete();
        $request->session()->flash("error", "Discount {$discount->name} has been deleted");
        return redirect(route("admin.discount.index"));
    }
}
