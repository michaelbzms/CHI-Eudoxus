function hideOptions(){
    $(".navbar-specific-item").hide();
}

function showOptions(){
    $(".navbar-specific-item").show();
}

/* Events */
$("#student").on("click", function(){
    hideOptions();
    $("#student_options").show();
    $("#back_button").show();
});

$("#publisher").on("click", function(){
    hideOptions();
    $("#publisher_options").show();
    $("#back_button").show();
});

$("#secretary").on("click", function(){
    hideOptions();
    $("#secretary_options").show();
    $("#back_button").show();
});

$("#distribution_point").on("click", function(){
    hideOptions();
    $("#distribution_point_options").show();
    $("#back_button").show();
});

$("#other").on("click", function(){
    hideOptions();
    $("#other_options").show();
    $("#back_button").show();
});

$("#back_button").on("click", function(){
    $("#student_options").hide();
    $("#publisher_options").hide();
    $("#secretary_options").hide();
    $("#distribution_point_options").hide();
    $("#other_options").hide();
    $(this).hide();
    showOptions();
});