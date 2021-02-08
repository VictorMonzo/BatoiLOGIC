<div class="row pt-5 mb-3">
    <h3>Líneas de comanda</h3>
</div>
<div class="row">
    @forelse($orderLines as $orderLine)
        <div class="p-3 mb-5 bg-white rounded box-shadow w-100">
            <div class="media text-muted">
                <div class="media-body mb-0">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <a href="{{ route('product.show', $orderLine->product_id) }}"><strong class="text-success">Producto: {{ $orderLine->products->name }}</strong></a>
                        <a href="{{ route('orderLine.edit', $orderLine->id) }}" class="d-none d-md-block">Editar linea de comanda</a>
                    </div>
                    <span class="d-block">Cantidad: {{ $orderLine->quantity }}</span>
                    <span class="d-block">Precio: {{ $orderLine->price }}€</span>
                    <span class="d-block">Descuento: {{ $orderLine->discount }}%</span>
                    <span class="d-block">Precio total: {{ \App\Models\OrderLine::totalPrice($orderLine->price, $orderLine->quantity, $orderLine->discount) }}€</span>
                    <a href="{{ route('orderLine.edit', $orderLine->id) }}" class="d-block d-md-none">Editar linea de comanda</a>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger w-100" role="alert">
            No hay lineas de comanda
        </div>
    @endforelse
</div>
