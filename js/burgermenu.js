// hamburger menu

function doburgermenu(){
  if (	jQuery( ".hamburger" ).hasClass( "is-active" )){
    jQuery( ".hamburger" ).removeClass( "is-active" )
    jQuery(".navmenu").slideUp();
  }
  else {
    jQuery( ".hamburger" ).addClass( "is-active" )
    jQuery(".navmenu ").slideDown();
  };
};

jQuery( document ).ready(function() {
  // click / tap handler
  jQuery( ".hamburger" ).on( "click", function() {
    doburgermenu();
  });
});