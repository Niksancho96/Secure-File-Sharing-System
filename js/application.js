$(document).ready(function() {
    $("#news").hide();
    $("#users").hide();
    $("#about").hide();
    
    $("#index-button").click(function() {
        $("#users").fadeOut();
        $("#about").fadeOut();
        $("#news").fadeOut();
        $("#file-tables").delay(1000).fadeIn();
    });
    
    $("#news-button").click(function() {
        $("#file-tables").fadeOut();
        $("#users").fadeOut();
        $("#about").fadeOut();
        $("#news").delay(1000).fadeIn();
    });
    
    $("#users-button").click(function() {
        $("#file-tables").fadeOut();
        $("#news").fadeOut();
        $("#about").fadeOut();
        $("#users").delay(1000).fadeIn();
    });
    
    $("#about-button").click(function() {
        $("#file-tables").fadeOut();
        $("#users").fadeOut();
        $("#news").fadeOut();
        $("#about").delay(1000).fadeIn();
    });
});