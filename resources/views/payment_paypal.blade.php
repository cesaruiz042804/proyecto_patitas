<link rel="stylesheet" href="{{ asset('asset_css/payment_paypal.css') }}">

<div class="modal-overlay" id="modalOverlay">
    <div class="modal">
        <button class="close-btn" id="closeModal">&times;</button>
        <div class="container">
            <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="upload" value="1">
                <input type="hidden" name="business" value="sb-i47l6a27301038@business.example.com">
                <input type="hidden" name="currency_code" value="USD">

                @php
                    $cart = session()->get('cart', []);
                    $index = 1;
                @endphp

                @if (!empty($cart))
                    @foreach ($cart as $producto)
                        <input type="hidden" name="item_name_{{ $index }}" value="{{ $producto['name'] }}">
                        <input type="hidden" name="item_number_{{ $index }}" value="{{ $producto['id'] }}">
                        <input type="hidden" name="amount_{{ $index }}" value="{{ $producto['price'] }}">
                        <input type="hidden" name="quantity_{{ $index }}" value="{{ $producto['quantity'] }}">
                        @php $index++ @endphp
                    @endforeach
                @endif

                <input type="hidden" name="return" value="{{ route('home') }}">
                <input type="hidden" name="notify_url"
                    value="https://95b3-190-219-188-201.ngrok-free.app/payment/webhook">
                <input type="hidden" name="cancel_return" value="{{ route('home') }}">

                <input type="submit" value="Pagar con PayPal">
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeModal');
    const modalOverlay = document.getElementById('modalOverlay');

    // Abrir modal
    openModalBtn.addEventListener('click', () => {
        modalOverlay.classList.add('active');
    });

    // Cerrar modal
    closeModalBtn.addEventListener('click', () => {
        modalOverlay.classList.remove('active');
    });

    // Cerrar modal al hacer clic fuera de él
    modalOverlay.addEventListener('click', (e) => {
        if (e.target === modalOverlay) {
            modalOverlay.classList.remove('active');
        }
    });
</script>
