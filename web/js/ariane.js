/**
 * Created by Anha on 05/03/15.
 */

$(document).ready(function() {
    //$('#ariane').append($(this).attr('id'));
    var selection = GetURLParameter();
    if(typeof selection !== 'undefined') {
        $('.breadcrumb').show();
        for(var i in selection) {
            var button = "<li><a class=\"ariane\" href=\"#\">" + selection[i] + "<i class=\"glyphicon glyphicon-remove\"></i></a></li>";
            $('.breadcrumb').append(button);
        }
    } else {
        $('.breadcrumb').hide();
    }
})

$('.breadcrumb').on('click', function(e) {
    window.location="http://localhost/EthnoDoc/web/app_dev.php/";
});

function GetURLParameter()
{
    var sPageURL = window.location.search.substring(1);
    var ariane = [];
    if(sPageURL.length > 0) {
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            ariane.push(sParameterName[1]);
        }
        console.log(ariane);
        return ariane;
    }
}