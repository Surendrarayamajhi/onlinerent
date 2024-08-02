 $(document).ready(function() {
    $('.sidebar__link').click(function() {
      $('.sidebar__link').removeClass('active_menu_link');
      $(this).addClass('active_menu_link');
    });
  });