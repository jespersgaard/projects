function doAfterLoading(data){
    
    var parsedData = $(data);
    var content = $('#content', parsedData);
    var breadcrumb = $('#breadcrumb', parsedData);
    
    $('#alertArea').append($('.alert', parsedData));
    if($('#redirect', parsedData).length > 0){
        location.hash = "!/" + $('#redirect', parsedData).html();
    }
    else {

        $('#breadcrumb').html(breadcrumb);
        $('#content').html(content);

        //add active class to icon
        var hash = location.hash;
        hash = hash.substring(3, hash.length);
        var category = '#!/' + hash.split('/')[0];
        $('.navbar li').removeClass('active');
        $('.nav a[href="'+category+'"]').parent().addClass('active');

        $('#searchResultContainer').hide(200);

        $('[rel=tooltip]').tooltip({placement : 'bottom'});

        //$().alert();
        $('.alert').bind('close', function(){
            $(this).slideUp(200);
        })
        $('.alert').slideDown(200);

        $('#form').bind('submit', function(){
            var data = $(this).serialize();
            $('#result').html(data);
            hash = split(hash, '/');
            loadPage(hash[0], data);
            return false;
        });
    }
}

function loadPage(page, data){
    if (data != null){
        data = '&' + data; 
    }
    else{
        data = '';
    }
    $.ajax({
        url: 'controllers/page.php',
        data: 'page=' + page + data,
        type: 'POST',
        error: function(data){
            alert("bla");
        },
        success: function(data, status){
            doAfterLoading(data);
        }
    });
}

function hashChangeCallback(){
    var hash = location.hash;
    hash = hash.substr(3, hash.length);   
    loadPage(hash);
}

function liveSearch(){
    if( $(this).val().length >= 3 ){
        $('#searchResults').html('<tr><td>searching...</tr></td>');
        $('#searchResultContainer').show(200);

        $.ajax({
            url: 'controllers/liveSearch.php',
            data: 'search='+$(this).val(),
            type: 'POST',
            success: function(data){
                $('#searchResults').html(data);
            }
        });
    }
    else{
        $('#searchResultContainer').hide(200);
    }
}

$(function(){
    
    $(window).bind('hashchange',function(){
        hashChangeCallback();
    });
    hashChangeCallback();
    
    $('#searchResultContainer').hide();
    
    $('#searchdiv').bind("clickoutside", function(event){
        //$('#searchResultContainer').hide(200);
        
    });
    
    $().tooltip({
      'selector': "[rel=tooltip]",
      'placement': 'below'
    })
    
    $("#ajax-loader").bind("ajaxSend", function(){
        $(this).show();
    }).bind("ajaxComplete", function(){
        $(this).fadeOut(300);
    });
    
//    $('#search').click(function(){
//        $('#searchResultContainer').toggle(200);
//        $(this).tooltip('toggle');
//    });
    
    //$('#search').focus(liveSearch);

//    $('#inputFieldOverlay').click(function(){
//        $('#search').val('');
//        $('#searchResultContainer').hide(200);
//    });
});