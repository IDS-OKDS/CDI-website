/**
 * @file
 * JS for CDI.
 */
(function ($, Drupal, window, document, undefined) {
  $(document).ready(function() {
    // Allow main menu dropdown-toggle to be clickable.
    $('.menu-block-wrapper .dropdown-submenu > a.dropdown-toggle').once('cdi-dropdown', function(){
      $(this).click(function(e) {
        e.preventDefault();
        window.location.href = $(this).attr('href');
      });
    });
  });
})(jQuery, Drupal, this, this.document);
