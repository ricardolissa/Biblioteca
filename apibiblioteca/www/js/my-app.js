// Initialize app
var API_URL= 'http://192.168.0.28:8000/api'; 
//'http://10.7.231.166:8000/api';

var myApp = new Framework7();


// If we need to use custom DOM library, let's save it to $$ variable:
var $$ = Dom7;

// Add view
var mainView = myApp.addView('.view-main', {
    // Because we want to use dynamic navbar, we need to enable it for this view:
    dynamicNavbar: true
});

// Handle Cordova Device Ready Event
$$(document).on('deviceready', function() {
    console.log("Device is ready!");
});


// Now we need to run the code that will be executed only for About page.

// Option 1. Using page callback for page (for "about" page in this case) (recommended way):
myApp.onPageInit('show', function (page) {

    alert(window.libro)
        //selection = window.getSelection(data[i].id) ;
        // Do something here for "about" page

    })

// Option 2. Using one 'pageInit' event handler for all pages:
$$(document).on('pageInit', function (e) {
    // Get page data from event data
    var page = e.detail.page;

    if (page.name === 'about') {
        // Following code will be executed for page with data-page attribute equal to "about"
        myApp.alert('Here comes About page');
    }
});

// Option 2. Using live 'pageInit' event handlers for each page
$$(document).on('pageInit', '.page[data-page="about"]', function (e) {
    // Following code will be executed for page with data-page attribute equal to "about"
    myApp.alert('Here comes About page');
});

$$('.pages').on('submit', '#form-busqueda', function(e){
    e.preventDefault();
    e.stopPropagation();
    
    var param = $$('#busquedaTitulo').val();
    alert("esto es  " +param);
    $$.ajax({
        url: API_URL + '/libros',
        data: {busqueda:param},
        dataType: 'json',
        success:function(data){

            var result =
            '<div class="content-block-title">Resultados</div>'+
            '<div class="list-block">' +
            '<ul>';

            for (var i = 0, length = data.length; i < length; i++) {

                result +=
                '<li class="item-content">'+
                '<a href="show.html" class="show" data-id="'+data[i].id+'" >'+
                '<div class="item-inner">'+

                '<div class="item-title">'+data[i].nombre+'<div>'+

                '<div>'+ 
                '</a>'+
                '</li>';
            }

            result += '</ul></div>';
            $$('#busquedaResultado').html(result);
        },
        error: function(err) {
            alert('error', JSON.stringify(err));
        }

    });

});

//show
$$('.pages').on('click', 'a.show', function(e){

    window.libro =this.dataset.id;
    alert("esto es "+window.libro);

    var libro = window.libro ;
    alert("esta es la variable libro que contiene el ID para hacerlo mas claro" +libro);

    url= API_URL + '/show/'+window.libro,
    alert(url);

     
 //});
    $$.ajax({
        url: API_URL + '/show/'+window.libro,
        data: {busqueda:libro},
        dataType: 'json',
        
 //});
        success:function(data){
    
            var result = '<div> Libro </div>';

        $$('#libro').html(result);
        },
        error: function(err) {
           alert('error', JSON.stringify(err));}
       
    
        });

}); 
/*
        var result =
        '<div class="content-block-title">Resultados</div>'+
        '<div class="list-block">' +
        '<a href="show.html" class="show" data-id="'+data[i].id+'" >'+'</a>'+
        '<div class="item-inner">'+
        '<div class="item-title">'+data[i].nombre+
        '</div>'+
        '</div>'+
        '</div>'

            
           
        }
         $$('#libro').html(result);
        },
        error: function(err) {
           alert('error', JSON.stringify(err));
        }

    });
*/
