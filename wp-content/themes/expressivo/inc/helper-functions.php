<?php
/**
 * Get blockquote from the post content
 */
function knacc_get_content_blockquote() 
{
    $dom = new DOMDocument;
    $dom->loadHTML( apply_filters( 'the_content', get_the_content( '' ) ) );
    $blockquotes = $dom->getElementsByTagname( 'blockquote' );

    if ( $blockquotes->length > 0 ) {

        // First blockquote
        $blockquote = $blockquotes->item(0);

        $cite = $blockquote->getElementsByTagName( 'cite' )->item( 0 );
        $p = $blockquote->getElementsByTagName( 'p' );

        $cite_content = '';
        if ( $cite && $p ) {

            // Remove the cite from the paragraph
            foreach ( $p as $paragraph )
                try { $paragraph->removeChild( $cite ); }
                catch( Exception $e ) {}

            $cite_content = $dom->saveXML( $cite );
        }

        $blockquote_content = '';
        foreach ( $p as $paragraph ) {
            if ( strlen( trim( $paragraph->nodeValue ) ) > 0 )
                $blockquote_content .= $dom->saveXML( $paragraph );
            else
                $paragraph->parentNode->removeChild( $paragraph );

        $blockquote->parentNode->removeChild( $blockquote );
        $remaining_content = $dom->saveXML();
    }
    	return $blockquote_content; // $cite_content or $remaining_content
    	
	} else {

		return false;
	}
}

/**
 * Get first link from the post content
 */
function knacc_get_content_link()
{
	$dom = new DOMDocument;
    $dom->loadHTML( apply_filters( 'the_content', get_the_content( '' ) ) );
    $link = $dom->getElementsByTagname( 'a' );

    if ($link->item(0)) {
    	foreach ($link->item(0)->attributes as $attribute) {
    		if ($attribute->name == 'href') {
				$link = $attribute->value;
    		}
    	}

    	return $link;

    } else {

    	return false;
    }
}

/**
 * Formats a google font option
 */
function knacc_format_google_font($font) 
{
    $font = explode(',', $font);
    $font = $font[0];
    $font = str_replace(" ", "+", $font);

    return $font;
}

/**
 * Returns clean thumbnail image url
 */
function knacc_get_thumbnail_image_url($post_id) 
{
    $image_id = get_post_thumbnail_id($post_id);
    $image_size = knacc_get_thumbnail_size();
    $image_url = wp_get_attachment_image_src($image_id, $image_size, true);
    $image = $image_url[0];

    return $image;
}

/**
 * Returns optimum thumbnail size based on blog layout
 */
function knacc_get_thumbnail_size() 
{
    $page_id = get_option('page_for_posts');
    $blog_layout = get_field('blog_page_layout', $page_id);
    $blog_layout_columns = get_field('blog_layout_columns', $page_id); 

    $thumbnail_size = null;
    
    if (is_page()) {
        if (is_page_template('templates/template-fullwidth.php')) {
            $thumbnail_size = 'fullsize';
        } else {
            $thumbnail_size = '2400';
        }
    } elseif (!is_single() && $blog_layout == 'masonry') {
        if ($blog_layout_columns == '2') $thumbnail_size = '2400';
        if ($blog_layout_columns == '3') $thumbnail_size = '1600';
        if ($blog_layout_columns == '4') $thumbnail_size = '1200';
    }

    return $thumbnail_size;
}
