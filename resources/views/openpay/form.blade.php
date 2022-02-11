<!-- Button trigger modal -->

<!-- Modal -->
<script type="text/javascript">
    $(function(){
        en_dis_facturacion($("#btn_en_dis_facturacion"));
        $("#btn_en_dis_facturacion").click(function(event){
            event.preventDefault();
            event.stopPropagation();
            en_dis_facturacion($(this));
        });
    });
    function en_dis_facturacion(button,enabled=false){
        first_children=$("#div_facturation_data").children("input,select").first();        
        if(first_children.attr("disabled")=="disabled" || enabled==true){
            $("#div_facturation_data").children("input,select").removeAttr("disabled");
            $(button).html("No requiero facturación");
        }else{
            $(button).html("Requiero facturación");
            $("#div_facturation_data").children("input,select").attr("disabled","true");
        }
    }
    function preventNonNumericalInput(input) {
      string=$(input).val();
      charStr=string[string.length-1];
      if(charStr.match(/^[0-9]+$/)==undefined){
        $(input).val($(input).val().substring(0,($(input).val().length-1)));
      }
    }
</script>
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content px-10">

        <div class="modal-body">

            <div class="d-inline-flex mx-auto mt-3">
                @csrf
                <input type="hidden" name="token_id" id="token_id">
                <div id="div_facturation_data" class="modal_checkout_page" style="margin-bottom: 50px;">
                    <h2>Datos de facturación</h2>
                    <h5>(Si no requiere facturación, no es necesario llenar)</h5>
                    <br>
                    <button class="btn primary" id="btn_en_dis_facturacion" style="background-color: green; color: white;">Requiero Facturación</button> 
                    <br>
                    <label>Código Postal</label>
                    <input type="number" class="form-control" placeholder="Codigo Postal" id="postal_code_facturation" name="postal_code_facturation" select_state_id="#select_state_facturation">
                    <label>Nombre o Razón social</label>
                    <input type="text" class="form-control" placeholder="Nombre o Razón social" id="name_facturation" name="name_facturation">
                    <label>Estado</label>
                    <select class="form-control" id="select_state_facturation" name="state_facturation" select_municipality_id="#municipality_facturation">
                        <option value="33" selected>Seleccione un estado</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    <label>Municipio</label>
                    <select class="form-control" id="municipality_facturation" name="municipality_facturation">
                        <option value="1" selected>Seleccione un municipio</option>
                    </select>
                    <label>Calle y número</label>
                    <input type="text" class="form-control" placeholder="Calle y #numero" id="street_and_number_facturacion" name="street_and_number_facturacion">
                    <div class="d-flex mt-5 mb-5">
                        <a class="btn btn-primary mx-auto" style="color: white" next_page="#div_credit_card_data" onclick="gotoPage(event)">Siguiente</a>
                    </div>
                </div>
                <div id="div_choose_envío" class="modal_checkout_page" style="margin-bottom: 50px; display: none" no-show="{{isset($disable_div_choose_envío)?$disable_div_choose_envío['next']:0}}">
                    <h2>Escoge una forma de recibirlo</h2>
                    <p id="minimum-buy-warning" class="alert alert-warning" style="display: none">{{(isset($minimum_checkout))?("Compra mínima para envió a domicilio: ".$minimum_checkout." su total no califica"):''}}</p>
                    <label>Envío a domicilio</label>
                    <input type="checkbox" class="delivery" next_page="#div_send_address_data" onclick="gotoPage(event)"  target="#delivery" value=true>
                    <input type="hidden" class="delivery_pickup" name="delivery" id="delivery" value=1 {{isset($disable_div_choose_envío)?'':'disabled'}}>
                    <label>Recoger en tienda</label>
                    <input type="checkbox" next_page="#div_credit_card_data" onclick="gotoPage(event)" target="#store_pickup" value=true>
                    <input type="hidden" class="delivery_pickup"  name="store_pickup" id="store_pickup" value=1 disabled>
                    <div>
                        <a class="btn btn-primary mx-auto" style="color: white" next_page="#div_facturation_data" onclick="gotoPage(event)">Atras</a>
                    </div>
                </div>
                <div id="div_send_address_data" class="modal_checkout_page" style="margin: 10px 30px 50px 30px; display: none;">
                    <h2>Direccion de envío/entrega a domicilio</h2>        
                    <div class="alert alert-warning"> 
                        Por el momento solo damos servicio a domicilio a Campo y Valle Imperial, estamos trabajando para expandir nuestra area de servicio!
                    </div>
                    <label>Código Postal</label>
                    <input type="number" class="form-control" placeholder="Codigo Postal" id="postal_code_send_address" name="postal_code_send_address" select_state_id="#select_state_send_address" value="45123" disabled>
                    <label>Nombre del receptor</label>
                    <input type="text" class="form-control" placeholder="Nombre" id="name_send_address" name="name_send_address">
                    <label>Estado</label>
                    <select class="form-control" id="select_state_send_address" name="state_send_address" select_municipality_id="#municipality_send_address" disabled>
                        <option value="14" selected>Jalisco</option>
                        <option value="33">Seleccione un estado</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    <label>Municipio</label>
                    <select class="form-control" id="municipality_send_address" name="municipality_send_address" disabled>
                        <option value="120" selected>Zapopan</option>
                    </select>
                    <label>Calle y número</label>
                    <input type="text" class="form-control" placeholder="Calle y #numero" id="street_and_number_send_address" name="street_and_number_send_adress">
                    <div class="d-flex mt-5 mb-5">
                        <a class="btn btn-primary mx-auto" style="color: white" next_page="{{isset($disable_div_choose_envío)?$disable_div_choose_envío['prev']:'#div_choose_envío'}}" onclick="gotoPage(event)">Atras</a>
                        <a class="btn btn-primary mx-auto" style="color: white" next_page="#div_credit_card_data" onclick="gotoPage(event)">Siguiente</a>
                    </div>
                </div>
                <div id="div_credit_card_data" class="modal_checkout_page" style="display: none">
                    <h2>Pago en linea</h2>
                    <h4>Tarjeta de débito o crédito</h4>
                    <label>Nombre del titular</label>
                    <script src="https://js.stripe.com/v3/"></script>

                    <input id="card-holder-name" class="form-control" placeholder="Titular"  name="buyer_name" type="text">
                    <br>
                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element"></div>
                    <br>
                    <label>Teléfono</label>
                    <input type="tel" id="telephone_card" name="card_telephone" placeholder="(33)3333-3333" class="form-control">
                    <label>E-mail</label>
                    <input type="email" id="card_email" name="card_email" placeholder="ejemplo@ejemplo.ej" class="form-control"/>                    <div>
                        <div class="avisos">
                            @include('legal/modal_terminos_y_condiciones')
                        </div>
                    </div>
                    <div class="d-flex mt-5 mb-5">
                        <a class="btn btn-primary mx-auto" style="color: white" next_page="#div_facturation_data" onclick="gotoPage(event)">Atras</a>
                        <button type="button" class="btn btn-primary" id="card-button">
                            Pagar!
                        </button>
                    </div>
                    <script>
                        const stripe = Stripe("{{env('STRIPE_KEY')}}");

                        const elements = stripe.elements();
                        const cardElement = elements.create('card');

                        cardElement.mount('#card-element');

                        const cardHolderName = document.getElementById('card-holder-name');
                        const cardButton = document.getElementById('card-button');

                        cardButton.addEventListener('click', async (e) => {
                            const { paymentMethod, error } = await stripe.createPaymentMethod(
                                'card', cardElement, {
                                    billing_details: { name: cardHolderName.value }
                                }
                            );

                            if (error) {
                                // Display "error.message" to the user...
                            } else {
                                $('#payment-form').append($('<input></input>', {name: 'payment_method_id'}).val(paymentMethod.id))
                                console.log('yes');
                                $('#payment-form').submit();
                            }
                        });
                    </script>

                </div>

            </div>
        </div>
        <div class="modal-footer">
            <img style="height: 25px;width:100px"  src="{{'images/openpay_logo.png'}}">
        </div>
    </div>
</div>
</div>