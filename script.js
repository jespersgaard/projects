function doAfterLoading(data){
    
    $('#content').html(data);

    //add active class to icon
    var hash = location.hash;
    hash = hash.substring(3, hash.length);
    var category = '#!/' + hash.split('/')[0];
    $('.nav li').removeClass('active');
    $('.nav a[href="'+category+'"]').parent().addClass('active');

    $('#ajax-loader').hide();
    
    $('#searchResultContainer').hide(200);
    
    $('[rel=tooltip]').tooltip({placement : 'bottom'});

    $('#form').bind('submit', function(){
        var data = $(this).serialize();
        $('#result').html(data);
        hash = split(hash, '/');
        loadPage(hash[0], data);
        return false;
    });

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
        success: function(data){
            doAfterLoading(data);
        }
    });
}

function hashChangeCallback(){
    
    $('#ajax-loader').show();
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
        $('#searchResultContainer').hide(200);
        
    });
//    $().tooltip({
//      'selector': "[rel=tooltip]",
//      'placement': 'below'
//    })
    
    $('#search').keyup(liveSearch);
    $('#search').focus(liveSearch);

    $('#inputFieldOverlay').click(function(){
        $('#search').val('');
        $('#searchResultContainer').hide(200);
    });
});