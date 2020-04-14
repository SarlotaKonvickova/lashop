@extends('layout')

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Produkty </h3>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div v-if="products.length === 0">
                                <div class="alert alert-danger">
                                    <strong>Omlouváme se! </strong>Bohužel, na váš dotaz "@{{ searchHere }}" nemáme odpověď. Je váš dotaz
                                    napsán správně? Ještě jednou si svůj dotaz zkontrolujte. I mistr tesař se někdy utne.
                                    Jestliže i poté vidíte tuto zprávu, kontaktujte nás, napravíme to.
                                </div>
                            </div>
                            <div class="product" v-for="product in products" :key="product.id">
                                <div class="product-body">
                                    <h3 class="product-name">@{{ product.name }}</h3>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="product-description"> @{{ product.description }}</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h4 class="product-price"> @{{ parseFloat(product.price).toFixed(2) }}
                                                Kč</h4>
                                            <p class="product-quantity">
                                                Skladem @{{ parseFloat(product.stock).toFixed()}} ks</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="paginator">Aktuální stránka: <strong>@{{ currentPage }}</strong></p>
                                <nav class="mb-4">
                                    <v-pagination
                                        v-model="currentPage"
                                        :page-count="total"
                                        :classes="bootstrapPaginationClasses"
                                        :labels="customLabels"
                                    ></v-pagination>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
