var BASE_URL = 'http://10.7.231.166:8000/';
var API_URL = BASE_URL + 'api';  
var IMG_URL = BASE_URL + 'public/images/';

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



/*
localforage.setItem('favoritos', 'data', function (err) {
  // if err is non-null, we got an error
  localforage.getItem('favoritos', function (err, data) {
        window.favoritos = data;
    // if err is non-null, we got an error. otherwise, value is the value
  });
});

localforage.setItem('ultimabusqueda', 'data', function (err) {
  // if err is non-null, we got an error
  localforage.getItem('ultimabusqueda', function (err, data) {
        window.ultimabusqueda = data;
    // if err is non-null, we got an error. otherwise, value is the value
  });
});
*/



// Now we need to run the code that will be executed only for About page.

// Option 1. Using page callback for page (for "about" page in this case) (recommended way):
myApp.onPageInit('show', function (page) {
    //selection = window.getSelection(data[i].id) ;
    // Do something here for "about" page

});

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

    url= API_URL + '/show/'+window.libro,

     
    $$.ajax({
        url: API_URL + '/show/'+window.libro,
        data: {busquedaShow: window.libro},
        dataType: 'json',
        success:function(data){
    
            var result = 
            '<div class="card">'+
                '<div class="card-header"><b>'+data.nombre+'</b></div>'+
                '<div class="card-content" style="overflow:hidden">'+
                        '<div class="card-content-inner">'+            
                        '<div aling="center">'+'<img src="'+IMG_URL+data.foto+'">'+'</div>'+'<br>'+
                        '<div><b>Isbn : </b>'+ data.isbn +'</div>'+'<br>'+
                        '<div><b>Edicion : </b>'+ data.edicion+ '</div>'+'<br>'+
                        '<div><b>Editorial : </b>'+ data.editorial+ '</div>'+'<br>'+
                        
                        '<div><b>Vista Previa : </b><a href="data.vistaprevia">'+data.vistaprevia+'</a> </div>'+'<br>'+
                        '<div><b>Link Archivo : </b><a href="data.linkarchivo">'+ data.linkarchivo+ '</a></div>'+'<br>'+
                        '<div><b>Link Archivo :</b><a href="data.web">'+ data.web+ '</a></div>'+'<br>'+
                        
                        '<div><b>Indice : </b>'+ data.indice+ '</div>'+'<br>'+
                       '<div ><b>Resumen : </b>'+ data.resumen+ '</div>'+'</div>'+'</div>'
                            ;

            $$('#libro').html(result);
        },
        error: function(err) {
           alert('error', JSON.stringify(err));}
    
        });

}); 
