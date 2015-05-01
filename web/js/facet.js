/**
 * Created by Anha on 28/04/15.
 */

/*
function getFacets(urlParams) {
    var facets = [];
    for (param in urlParams) {
        if(param % 2 === 0) {
            facets.push(urlParams[param]);
        }
    }
    return facets;
}


var url = window.location.search.replace("?" , "").replace(/=/g , "&").split("&");
var facets = getFacets(url);
*/

$("#descriptors li span").each(function(index) {
    var id = $(this).attr("id");
    $("#" + id).click(function() {
        $("." + id + "descriptors").slideToggle(300);
    });
});
