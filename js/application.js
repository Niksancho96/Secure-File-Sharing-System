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

$(function() {
    $("#profile-dialog").dialog({
        autoOpen: false,
        width: 700,
        height: 700,
        modal: true,
        open: function() {
            $('.ui-widget-overlay').addClass('custom-overlay');
        },
        close: function() {
            $('.ui-widget-overlay').removeClass('custom-overlay');
        },
        show: {
            effect: "drop",
            duration: 1000
        },
        hide: {
            effect: "drop",
            duration: 1000
        }
    });
    $("#profile-dialog-button").click(function() {
        $("#profile-dialog").dialog("open");
    });
});
$(function() {
    $("#upload-file-dialog").dialog({
        autoOpen: false,
        width: 668,
        height: 260,
        modal: true,
        open: function() {
            $('.ui-widget-overlay').addClass('custom-overlay');
        },
        close: function() {
            $('.ui-widget-overlay').removeClass('custom-overlay');
        },
        show: {
            effect: "drop",
            duration: 1000
        },
        hide: {
            effect: "drop",
            duration: 1000
        }
    });
    $("#upload-file-button").click(function() {
        $("#upload-file-dialog").dialog("open");
    });
});
$(function() {
    $("#settings-dialog").dialog({
        autoOpen: false,
        width: 668,
        height: 350,
        modal: true,
        open: function() {
            $('.ui-widget-overlay').addClass('custom-overlay');
        },
        close: function() {
            $('.ui-widget-overlay').removeClass('custom-overlay');
        },
        show: {
            effect: "drop",
            duration: 1000
        },
        hide: {
            effect: "drop",
            duration: 1000
        }
    });
    $("#settings-dialog-button").click(function() {
        $("#settings-dialog").dialog("open");
    });
});