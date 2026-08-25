jQuery( window ).on( 'elementor/frontend/init', function() {
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_blog_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_portfolio_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_service_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_team_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_testimonial_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_client_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/CSPT_StaticBoxElement.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_multiple_icon_heading.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_fid_element.default', function($scope, $){ cspt_circle_progressbar(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/cspt_gallery_element.default', function($scope, $){ cspt_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope, $ ) {
		setTimeout(function(){
			cspt_rearrange_stretched_col( $scope.data('id') );			
			cspt_bgimage_class();
			cspt_bgcolor_class();
		}, 200);
	} );
} );

