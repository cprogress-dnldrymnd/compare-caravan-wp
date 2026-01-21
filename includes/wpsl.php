<?php

/**
 * 1. Add the "Listing Information" textarea to the 'Additional Info' tab in Admin
 */
add_filter('wpsl_meta_box_fields', 'custom_wpsl_add_listing_info_field');

function custom_wpsl_add_listing_info_field($meta_fields)
{


    $meta_fields[__('Listing Information', 'wpsl')] = array(
        'listing_information_1' => array(
            'label'    => __('Info 1', 'wpsl'),
            'type'  => 'text', // Defines the input type
        ),

        'listing_information_2' => array(
            'label'    => __('Info 2', 'wpsl'),
            'type'  => 'text', // Defines the input type
        ),

        'listing_information_3' => array(
            'label'    => __('Info 3', 'wpsl'),
            'type'  => 'text', // Defines the input type
        ),

        'listing_information_4' => array(
            'label'    => __('Info 4', 'wpsl'),
            'type'  => 'text', // Defines the input type
        ),
        'listing_information_5' => array(
            'label'    => __('Info 5', 'wpsl'),
            'type'  => 'text', // Defines the input type
        ),
    );

    return $meta_fields;
}

/**
 * 2. Include the new data in the Frontend JSON response
 * This allows the map to read the data when generating the store list.
 */
add_filter('wpsl_frontend_meta_fields', 'custom_wpsl_frontend_listing_info');

function custom_wpsl_frontend_listing_info($store_fields)
{

    $store_fields['wpsl_listing_information_1'] = array(
        'name' => 'listing_information_1',
    );


    $store_fields['wpsl_listing_information_2'] = array(
        'name' => 'listing_information_2',
    );


    $store_fields['wpsl_listing_information_3'] = array(
        'name' => 'listing_information_3',
    );


    $store_fields['wpsl_listing_information_4'] = array(
        'name' => 'listing_information_4',
    );


    $store_fields['wpsl_listing_information_5'] = array(
        'name' => 'listing_information_5',
    );

    return $store_fields;
}





add_filter('wpsl_listing_template', 'custom_listing_template');

function custom_listing_template()
{

    global $wpsl_settings, $wpsl;

    $listing_template = '<li class="store--listing"  data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t\t" . '<div>' . "\r\n";
    $listing_template .= "\t\t\t" . '<%= thumb %>' . "\r\n";
    $listing_template .= "\t\t" . '<div class="listing-title">' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<h4 class="fs-18 fw-semibold mb-0">' . wpsl_store_header_template('listing') . '</h4>' . "\r\n";
    // Check if we need to show the distance.
    if (!$wpsl_settings['hide_distance']) {
        $listing_template .= "\t\t" . '<div class="distance fs-14 d-flex gap-2 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="11.643" height="15.518" viewBox="0 0 11.643 15.518"> <path  fill="currentColor" id="pin-svgrepo-com_2_" data-name="pin-svgrepo-com (2)" d="M3.995,5.819A5.75,5.75,0,0,1,6.9.791,5.877,5.877,0,0,1,9.814,0a5.477,5.477,0,0,1,2.917.791A6.022,6.022,0,0,1,14.857,2.9a5.6,5.6,0,0,1,.776,2.917,4.583,4.583,0,0,1-.326,1.552,13.01,13.01,0,0,1-.822,1.785q-.5.9-1.133,1.831T12.11,12.724q-.605.807-1.133,1.428t-.838,1.009l-.326.357q-.124-.124-.326-.372t-.822-.978q-.621-.729-1.148-1.459T6.291,11A14.717,14.717,0,0,1,5.143,9.14q-.45-.885-.822-1.754a3.439,3.439,0,0,1-.326-1.567Zm1.94,0A3.74,3.74,0,0,0,7.067,8.565,3.74,3.74,0,0,0,9.814,9.7,3.74,3.74,0,0,0,12.56,8.565a3.74,3.74,0,0,0,1.133-2.747A3.689,3.689,0,0,0,12.56,3.088,3.879,3.879,0,0,0,9.814,1.939,3.566,3.566,0,0,0,7.067,3.088,3.824,3.824,0,0,0,5.934,5.819Z" transform="translate(-3.989 0.001)"/> </svg><%= distance %> ' . esc_html($wpsl_settings['distance_unit']) . ' away </div>' . "\r\n";
    }
    $listing_template .= "\t\t" . '</div>' . "\r\n";

    $listing_template .= "\t\t" . '<div class="address fs-14">' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '</div>' . "\r\n";

    //if ($wpsl_settings['show_contact_details']) {
    $listing_template .= "\t\t\t" . '<div class="contact-details-enquire d-flex align-items-center justify-content-between">' . "\r\n";
    $listing_template .= "\t\t\t" . '<div class="wpsl-contact-details fw-semibold fs-14 mb-0">' . "\r\n";
    $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span class="contact-details-span"><svg xmlns="http://www.w3.org/2000/svg" width="12.707" height="12.707" viewBox="0 0 12.707 12.707"> <path id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt" d="M12.345,8.98,9.565,7.788a.6.6,0,0,0-.695.171l-1.231,1.5a9.2,9.2,0,0,1-4.4-4.4l1.5-1.231a.594.594,0,0,0,.171-.695L3.725.36A.6.6,0,0,0,3.043.015L.462.611A.6.6,0,0,0,0,1.192,11.515,11.515,0,0,0,11.516,12.707a.6.6,0,0,0,.581-.462l.6-2.581a.6.6,0,0,0-.348-.685Z" transform="translate(0 0)"/> </svg> <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span><strong>' . esc_html($wpsl->i18n->get_translation('fax_label', __('Fax', 'wpsl'))) . '</strong>: <%= fax %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    /*
    $listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span><strong>' . esc_html($wpsl->i18n->get_translation('email_label', __('Email', 'wpsl'))) . '</strong>: <span class="email"><%= email %></span></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
*/
    $listing_template .= "\t\t\t" . '<% if ( url ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<span  class="contact-details-span text-pink"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13"> <g id="Icon_feather-globe" data-name="Icon feather-globe" transform="translate(-2.5 -2.5)"> <path id="Path_1331" data-name="Path 1331" d="M15,9A6,6,0,1,1,9,3,6,6,0,0,1,15,9Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/> <path id="Path_1332" data-name="Path 1332" d="M3,18H15" transform="translate(0 -9)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/> <path id="Path_1333" data-name="Path 1333" d="M14.4,3a9.18,9.18,0,0,1,2.4,6,9.18,9.18,0,0,1-2.4,6A9.18,9.18,0,0,1,12,9a9.18,9.18,0,0,1,2.4-6Z" transform="translate(-5.4)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/> </g> </svg><%= url %></span>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t" . '</div>' . "\r\n";



    $listing_template .= '<% if ( email ) { %>';
    $listing_template .= '<div class="enquire-now fs-14">' . "\r\n";
    $listing_template .= '<p><a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnquireDealer" aria-controls="offcanvasEnquireDealer" email="<%= email %>" title="' . wpsl_store_header_template('listing') . '" class="enquire-now-dealer">Enquire Now</a>' . "\r\n";
    $listing_template .= '</div>';
    $listing_template .= '<% } %>';

    $listing_template .= "\t\t\t" . '</div>' . "\r\n";


    $listing_template .= '<% if ( listing_information_1 ) { %>';
    $listing_template .= '<div class="wpsl-listing-info wpsl-listing-info-tag fw-medium fs-14">' . "\r\n";
    $listing_template .= '<% var items = listing_information_1.split(","); %>';
    $listing_template .= '<% _.each( items, function( item ) { %>';
    $listing_template .= '<span class="custom-tag"><%= item.trim() %></span>' . "\r\n";
    $listing_template .= '<% }); %>';
    $listing_template .= '</div>';
    $listing_template .= '<% } %>';

    $listing_template .= '<% if ( listing_information_2 ) { %>';
    $listing_template .= '<div class="wpsl-listing-info fs-14">' . "\r\n";
    $listing_template .= '<p><%= listing_information_2 %></p>' . "\r\n";
    $listing_template .= '</div>';
    $listing_template .= '<% } %>';

    $listing_template .= '<% if ( listing_information_3 ) { %>';
    $listing_template .= '<div class="wpsl-listing-info fs-14">' . "\r\n";
    $listing_template .= '<p><%= listing_information_3 %></p>' . "\r\n";
    $listing_template .= '</div>';
    $listing_template .= '<% } %>';

    $listing_template .= '<% if ( listing_information_4 ) { %>';
    $listing_template .= '<div class="wpsl-listing-info fs-14">' . "\r\n";
    $listing_template .= '<p><%= listing_information_4 %></p>' . "\r\n";
    $listing_template .= '</div>';
    $listing_template .= '<% } %>';

    $listing_template .= '<% if ( listing_information_5 ) { %>';
    $listing_template .= '<div class="wpsl-listing-info fs-14">' . "\r\n";
    $listing_template .= '<p><%= listing_information_5 %></p>' . "\r\n";
    $listing_template .= '</div>';
    $listing_template .= '<% } %>';




    // }



    $listing_template .= "\t\t" . '</div>' . "\r\n";



    $listing_template .= "\t" . '</li>' . "\r\n";

    return $listing_template;
}
