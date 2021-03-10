<div class="col-lg-3">
    <div id="order-summary" class="box mt-0 mb-4 p-0">
        <div class="box-header mt-0">
        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Resumen de pedido</font></font></h3>
        </div>
        <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            Los costos de envío y adicionales se calculan en función de los valores que ingresó. Envio gratis para pedidos mayores a $20,000</font></font>
        </p>
        <div class="table-responsive">
        <table class="table">
            <tbody>
            <tr>
                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Subtotal de Orden</font></font></td>
                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">${{number_format(Cart::getSubTotal())}}</font></font></th>
            </tr>
            <tr>
                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Envío y manipulación</font></font></td>
                @if (Cart::getSubTotal() > 20000)
                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 0</font></font></th>
                @else
                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 10</font></font></th>
                @endif
            </tr>
            {{-- <tr>
                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Impuesto</font></font></td>
                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0,00 $</font></font></th>
            </tr> --}}
            <tr class="total">
                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total</font></font></td>
                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">${{number_format(Cart::getTotal()+10)}}</font></font></th>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="box box mt-0 mb-4 p-0">
        <div class="box-header mt-0">
        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Código promocional</font></font></h4>
        </div>
        <p class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Si tiene un código de cupón, ingréselo en el cuadro a continuación.</font></font></p>
        <form>
        <div class="input-group">
            <input type="text" class="form-control"><span class="input-group-btn">
            <button type="button" class="btn btn-template-main"><i class="fa fa-gift"></i></button></span>
        </div>
        </form>
    </div>
</div>