<div id="footer">

    <br><br>
    <h5 class="text-center">WARUNG MAMA NONI 
    <br><br>

</div>
<script type="text/javascript">
    function addToCart(product) {
        const isProductInCart = cart.some(item => item.id_barang === product.id_barang);

        if (!isProductInCart) {
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));
        } else {
            alert('Produk sudah ada di keranjang!')
        }
    }

    function getCartFromLocalStorage() {
        const storedCart = localStorage.getItem('cart');
        return storedCart ? JSON.parse(storedCart) : [];
    }

    const cart = getCartFromLocalStorage();
</script>