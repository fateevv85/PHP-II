(function ($) {
  $(function () {
    $('.buying').click(function () {
      var id = $(this).data('id');
      $.ajax({
        url: 'http://php-ii/public/cart/addToCart',
        type: 'POST',
        data: {
          id: id
        },
        dataType: 'text',
        success: function (responce) {
          // var message = [];
          /*
          for (var prop in responce) {
            message.push(responce[prop]);
          }*/
          // alert(message.join('\n'));
          alert(responce);
        }
      })
    })
  })
})(jQuery);
