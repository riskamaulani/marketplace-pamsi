@props(['detail' => null])

<div class="flex space-x-2">
    @if ($detail)
        <button class="font-medium text-blue-600 hover:underline"
            @click="$dispatch('{{ $detail }}'); $dispatch('{{ $detail }}-id', { order: '{{ $data->id }}' }); $dispatch('detail-order', { status: '{{ $data->status }}', products: JSON.parse(atob('{{ base64_encode($data->products) }}')), data: { shipping: '{{ $data->shipping }}', address: '{{ $data->address }}', payment: '{{ $data->payment }}', totalProduct: '{{ $data->total_product }}', shippingFee: '{{ $data->shipping_fee }}', total: '{{ $data->total }}', productsQuantity: '{{ $data->products_quantity }}' }})">Detail</button>
    @endif
</div>
