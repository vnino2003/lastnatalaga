<script src="https://cdn.paymongo.com/js/v1/paymongo.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymongo = Paymongo('<?= $public_key ?>');

    paymongo.pay({
        client_key: '<?= $client_key ?>',
        payment_method: 'gcash',
        onSuccess: function(result) {
            // Notify server about successful payment
            $.post('<?= site_url("checkout/gcash_complete") ?>', { order_id: <?= $order['id'] ?> }, function(res) {
                if(res.status === 'success') {
                    alert('Payment Successful!');
                    window.location.href = '<?= site_url("order-success") ?>';
                }
            }, 'json');
        },
        onError: function(err) {
            alert('Payment failed: ' + JSON.stringify(err));
            window.location.href = '<?= site_url("checkout") ?>';
        },
        onClose: function() {
            window.location.href = '<?= site_url("checkout") ?>';
        }
    });
});
</script>
