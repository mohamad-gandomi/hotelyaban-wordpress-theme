jQuery(function($){

  /* -------------------------------------------------------------------------- */
  /*	AJAX PRODUCTS & CATEGORIES SEARCH
  /* -------------------------------------------------------------------------- */

    var sendRequest = true
    $('#searchInput').on('keyup', function() {

        var searchPhrase = $(this).val()
        $('#searchResponse ul').html(' ')

        if ( !searchPhrase.length ) {$('#searchResponse').addClass('d-none')}
        if ( searchPhrase.length < 3 ) {
            $('#searchResponse').addClass('d-none')
            return
        }
        if ( !sendRequest ) return

        $.ajax({
            url: global.ajaxUrl,
            type: "POST",
            data: {
                action: 'search_site',
                search_phrase: searchPhrase,
                security: global.ajaxNonce
            },
            beforeSend: function(){
                sendRequest = false
            },
            success: function(res){

                sendRequest = true

                if (!res.length) {
                    $('#searchResponse').addClass('d-none')
                } else {
                    $('#searchResponse').removeClass('d-none')
                }

                res.forEach ((element,index)=>{
                    if ( element['type'] == 'city' ) {
                        $('#searchResponse ul').append('<li class="d-flex align-items-center mb-2"><i class="ms-2 icon-location1 fs-5"></i><a class="text-decoration-none text-reset" href='+ element['link'] +'>'+ element['title'] +'</a></li>')
                    } else {
                        $('#searchResponse ul').append('<li  class="d-flex align-items-center mb-2"><i class="ms-2 icon-house-cleaning fs-5"></i><a class="text-decoration-none text-reset" href='+ element['link'] +'>'+ element['title'] +'</a></li>')
                    }
                })
            }
        });
    })

  /* -------------------------------------------------------------------------- */
  /*	LOADMORE HOTELS BUTTON
  /* -------------------------------------------------------------------------- */

    $('#load_more_btn').on('click', function(){
        var url = new URL(window.location.href)
        window.queryParams = [];
        url.searchParams.forEach(function(value,key){
            window.queryParams[key] = value
        })
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: global.ajaxUrl,
            data: {
                'action': 'load_more',
                'term_id': $('#load_more_btn').data('term'),
                'page_number': $('#load_more_btn').data('page'),
                ...window.queryParams,
            },
            beforeSend: function() {
                $("#load_more_btn").html('در حال بارگذاری...');
            },
            success: function(response) {
                $("#loaderDiv").show();
                $('#load_more_btn').data('page', $('#load_more_btn').data('page')+1 );
                $("#load_more_btn").html('اطلاعات بیشتر');
                $('#listContainer').append(response);
                console.log(response)
            }
    });

    });


})