(function ($) {
  $(function () {
    $('select').formSelect();

    var $sidenav = $('.sidenav');
    $sidenav.sidenav({
      edge: 'left',
      draggable: true,
      preventScrolling: true
    });

    $('.sidenav-close').on('click', function (e) {
      e.preventDefault();
      var instance = M.Sidenav.getInstance($sidenav[0]);
      if (instance) {
        instance.close();
      }
    });

    $('.parallax').parallax();
    $('.dropdown-trigger').dropdown();
    $('.tooltipped').tooltip();
  });
})(jQuery);
