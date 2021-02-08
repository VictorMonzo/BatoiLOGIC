
<h1>Listado de comandas {{ auth()->user()->name }}</h1>
<br>

<table class="default">
    <tr>
        <th>Nombre producto</th>
        <th>Catidad</th>
        <th>Estado</th>
        <th>Dirección</th>
        <th>Nombre cliente</th>
    </tr>

    @forelse($orders as $order)
        <tr>
            <td>{{ $orderLines[$count]->products->name }}</td>
            <td>{{ $orderLines[$count]->quantity }}</td>
            <td>{{ $order->states->name }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->users->name }} {{ $order->users->surname }}</td>
        </tr>
        {{ $count++ }}
    @empty
        <div class="alert alert-danger w-100" role="alert">No hay ninguna comanda</div>
    @endforelse

</table>
<style>
    table th
    {
        background: #E54B4B;
        color: #fff;
        text-align: left;
    }

    table td,
    table th{
        padding: 10px;
    }

    td
    {
        border: 1px solid #ddd;
        text-align: left;
    }
</style>
