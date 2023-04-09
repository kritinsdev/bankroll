<?php

namespace Bankroll\Includes;

class Helpers {
    public static function createPosts($postType, $posts, $maxCount)
    {
        $typeFactory = 'Bankroll\Includes\Factory\\' . ucfirst( $postType ) . 'Factory';
        $posts = [];
    
        foreach ( $posts as $itemCount => $id ) {
            if ( $itemCount >= $maxCount ) {
                break;
            }
    
            $posts[] = $typeFactory::create( $id );
        }
    
        return $posts;
    }


    public static function slotFiltersQuery($filters) 
    {
        
    }

    public static function getSlotRtpRange(float $rtp): string
    {
        if($rtp < 95) {
            return 'low';
        }

        if($rtp >= 95 && $rtp <= 98) {
            return 'medium';
        }

        if($rtp > 98) {
            return 'high';
        }
    }
}