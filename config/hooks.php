<?php

namespace sgkirby\Commentions;

return [

	'route:before' => function ( $route, $path, $method ) {

		// create the feedback message
		if ( get('thx') ) {

			if ( option( 'sgkirby.commentions.autoapprovecomments', 'false' ) != 'true' )
				Commentions::$feedback = [ 'success' => 'Thank you! Please be patient, your comment has has to be approved by the editor.' ];

			else
				Commentions::$feedback = [ 'success' => 'Thank you for your comment!' ];

		}

		// process form submission
		if ( get('commentions') && get('submit') )
			Commentions::queueComment( $path );

	}

];
