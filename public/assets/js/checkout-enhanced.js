$(document).ready(function() {
  console.log('[v0] Checkout enhanced initialized');

  $('#expandCart').click(function() {
    const cartReview = $('#cartReview');
    const isExpanded = $(this).data('expanded') === 'true';
    
    if (isExpanded) {
      cartReview.slideUp(300);
      $(this).data('expanded', 'false').addClass('collapsed');
      console.log('[v0] Cart review collapsed');
    } else {
      cartReview.slideDown(300);
      $(this).data('expanded', 'true').removeClass('collapsed');
      console.log('[v0] Cart review expanded');
    }
  });

  $('#savedAddressSelect').change(function() {
    const selectedValue = $(this).val();
    const newAddressForm = $('#newAddressForm');
    
    if (selectedValue === '') {
      newAddressForm.addClass('active');
      console.log('[v0] New address form shown');
    } else {
      newAddressForm.removeClass('active');
      console.log('[v0] New address form hidden');
    }
  });

  $('#savedAddressSelect').trigger('change');

  $('.hesitation-zone').hover(
    function() {
      console.log('[v0] User reviewing item:', $(this).find('.item-name').text());
    },
    function() {}
  );

  $('input[name="payment_method"]').change(function() {
    const method = $(this).val();
    console.log('[v0] Payment method selected:', method);
    
    // Visual feedback
    $(this).closest('.payment-option').siblings().find('input').prop('checked', false);
  });

  $('.form-control, .form-select').on('focus', function() {
    console.log('[v0] User focused on field:', $(this).attr('name'));
  });

  $('#payWithGcash').click(function() {
    $('input[name="payment_method"][value="gcash"]').prop('checked', true).trigger('change');
    $(this).closest('form').submit();
  });

  $('#placeOrder').click(function(e) {
    const form = $(this).closest('form');
    let isValid = true;

    // Check if address is selected or new address is filled
    const savedAddress = form.find('select[name="saved_address"]').val();
    const newAddressForm = $('#newAddressForm');

    if (!savedAddress && !newAddressForm.hasClass('active')) {
      console.log('[v0] No address selected, form hidden');
      return;
    }

    console.log('[v0] Form validation passed, preparing to submit');
  });

  setTimeout(function() {
    $('.checkout-card').each(function(index) {
      $(this).css('animation-delay', (index * 0.1) + 's');
    });
  }, 100);
});
