@extends('layouts.content')

@section('title', 'Pricing')

@section('description')
Check our pricing plans and special offers. We have flexible payment options available for all our products.
@endsection

@section('content')
<div class="mb-4">
    <h4>Pricing Plans</h4>
    <p>We offer competitive prices and flexible payment options.</p>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Installment</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>iPhone 17 Pro</td>
            <td>SAR 4,999</td>
            <td>SAR 417/month (12 months)</td>
        </tr>
        <tr>
            <td>iPhone 17 Pro Plus</td>
            <td>SAR 5,499</td>
            <td>SAR 458/month (12 months)</td>
        </tr>
        <tr>
            <td>Apple Watch Series 10</td>
            <td>SAR 1,799</td>
            <td>SAR 150/month (12 months)</td>
        </tr>
    </tbody>
</table>

<div class="mt-4">
    <h5>Special Offers</h5>
    <ul>
        <li>Buy iPhone 17 Pro Plus and get 20% off on Apple Watch</li>
        <li>Free screen protector with every iPhone purchase</li>
        <li>Student discount available (10% off)</li>
    </ul>
</div>
@endsection