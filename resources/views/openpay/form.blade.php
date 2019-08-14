<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content px-10">
        <div class="d-inline-flex mx-auto mt-3">
            <form action="{{ action('OpenPayController@process') }}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="token_id" id="token_id">

                <h2>Pago en linea</h2>
                <h4>Tarjeta de débito o crédito</h4>
                <div class="d-flex flex-row" style=>
                    <div class="w-50" style="text-align: center">
                        <i class=" fab fa-cc-visa fa-5x"></i>
                    </div>
                    <div class="w-50" style="text-align: center">
                        <i class="mx-auto fab fa-cc-mastercard fa-5x"></i>
                    </div>
                </div>
                <label>Nombre del titular</label>
                <input type="text" class="form-control" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">


                <label>Número de tarjeta</label>
                <input class="form-control"  type="text" autocomplete="off" data-openpay-card="card_number">


                    <div class="w-100">
                        <label>Fecha de expiración</label>
                    </div>
                    <div class="d-flex flex-row w-100">
                        <div class="w-50"><input class="form-control" type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                        <div class="w-50"><input class="form-control" type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                    </div>
                <label>Código de seguridad</label>
                <div class="">
                    <input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" class="form-control">
                </div>
                <div class="d-flex mt-5 mb-5">
                    <a class="btn btn-primary mx-auto" id="pay-button" style="color: white">Pagar</a>
                </div>

            </form>
        </div>
    </div>
</div>
</div>