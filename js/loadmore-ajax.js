(function ($) {
    'use strict';

    //  Portfolio load more button Ajax

    var $loadbutton = $( '.loadAjax' );

    if( $loadbutton.length ){

        var postNumber = portfolioloadajax.postNumber,
            Incr = 0;
        //
        $loadbutton.on( 'click', function(){


            Incr = Incr + parseInt( postNumber) ;
           
            var $button = $( this ),
                $data;
           
            $data =  {
                'action' : 'datarc_portfolio_ajax',
                'postNumber'   : postNumber,
                'postIncrNumber'   : Incr,
                'elsettings'   : portfolioloadajax.elsettings
            };
           
            $.ajax({
                
                url  : portfolioloadajax.action_url,
                data : $data,
                type : 'POST',

                success: function( data ){

                    $( '.item-removable' ).remove();
                    $( '.datarc-portfolio-load' ).before( data );
                    //$( '.datarc-portfolio-load' ).after();

                    mixitup( '#filter-content' ).forceRefresh();

                    var loaditems = parseInt( Incr ) + parseInt( postNumber );

                    if( portfolioloadajax.totalitems <= loaditems  ){

                        $button.hide();
                    }
    
                }
                
            });
            
            return false;   
            
        } );
        
        
    }


})(jQuery);