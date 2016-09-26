<script id="order-product-edit-template"  type="text/x-handlebars-template">
    <tr id="bonds-{{ bonds }}">
        <td>{{ city }}</td>
        <td><b>{{{ title }}}</b></td>
        <td>{{ price }}</td>
        <td>
            <button type="button" class="btn btn-link cart-quantity-minus">
                <i class="fa fa-minus" aria-hidden="true"></i>
            </button>
            <input type="text"
                   value="{{ quantity }}"
                   class="product-price"
                   data-id="{{ work_id }}"
                   data-price="{{ price }}"
                   data-bonds="{{ bonds }}"
                   data-order="{{ work_order }}" />
            <button type="button" class="btn btn-link cart-quantity-plus">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </td>
        <td>
            <div id="sum-price-{{ work_id }}" class="sum-price price-order-{{ work_order }}">{{ work_price }}</div>
        </td>
        <td>
            <button class="btn btn-danger btn-xs" type="button" onclick="deleteProduct({{ work_order }}, {{ bonds }})">
                <i class="fa fa-trash" aria-hidden="true"></i> Удалить
            </button>
        </td>
    </tr>
</script>

<script id="order-product-template"  type="text/x-handlebars-template">
    <tr>
        <td>{{ city }}</td>
        <td><b>{{{ title }}}</b></td>
        <td>{{ price }}</td>
        <td>
            <div class="product-price">{{ quantity }}</div>
        </td>
        <td>
            <div id="sum-price-{{ work_id }}" class="sum-price price-order-{{ work_order }}">{{ work_price }}</div>
        </td>
        <td> </td>
    </tr>
</script>