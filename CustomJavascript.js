$(function() {
     $("#search_keywords").attr("placeholder", "¿Qué curso estas buscando?");
     $("#search_location").attr("placeholder", "Destino");
     setTimeout(function(){ $("#search_categories_chosen span").html("Categoría");},500);
});
