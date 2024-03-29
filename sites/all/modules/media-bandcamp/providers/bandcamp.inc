<?php

// $Id$

/**
 * @file
 *   This include processes bandcamp media files for use by emfield.module.
 */
/**
 *  Bandcamp URL
 */
define('EMAUDIO_BANDCAMP_MAIN_URL', 'http://www.bandcamp.com');

/**
 *  Define player bandcamp color, size, dimensions and default
 */
//color
define('EMAUDIO_BANDCAMP_BACKGROUND_COLOR_DEFAULT', 'FFFFFF');
define('EMAUDIO_BANDCAMP_LINK_COLOR_DEFAULT', '4285BB');

//size and dimensions
define('EMAUDIO_BANDCAMP_SIZE_VENTI', 'venti');
define('EMAUDIO_BANDCAMP_SIZE_VENTI_WIDTH', '400');
define('EMAUDIO_BANDCAMP_SIZE_VENTI_HEIGHT', '100');

define('EMAUDIO_BANDCAMP_SIZE_GRANDE', 'grande');
define('EMAUDIO_BANDCAMP_SIZE_GRANDE_WIDTH', '300');
define('EMAUDIO_BANDCAMP_SIZE_GRANDE_HEIGHT', '100');

define('EMAUDIO_BANDCAMP_SIZE_GRANDE2_TRACK', 'grande2');
define('EMAUDIO_BANDCAMP_SIZE_GRANDE2_WIDTH', '300');
define('EMAUDIO_BANDCAMP_SIZE_GRANDE2_HEIGHT', '355');

define('EMAUDIO_BANDCAMP_SIZE_GRANDE3_TRACK_ART', 'grande3');
define('EMAUDIO_BANDCAMP_SIZE_GRANDE3_WIDTH', '300');
define('EMAUDIO_BANDCAMP_SIZE_GRANDE3_HEIGHT', '415');

define('EMAUDIO_BANDCAMP_SIZE_TALL', 'tall');
define('EMAUDIO_BANDCAMP_SIZE_TALL_WIDTH', '150');
define('EMAUDIO_BANDCAMP_SIZE_TALL_HEIGHT', '295');

define('EMAUDIO_BANDCAMP_SIZE_TALL2_TRACK', 'tall2');
define('EMAUDIO_BANDCAMP_SIZE_TALL2_WIDTH', '300');
define('EMAUDIO_BANDCAMP_SIZE_TALL2_HEIGHT', '450');

define('EMAUDIO_BANDCAMP_SIZE_SHORT', 'short');
define('EMAUDIO_BANDCAMP_SIZE_SHORT_WIDTH', '46');
define('EMAUDIO_BANDCAMP_SIZE_SHORT_HEIGHT', '23');

//visualization
define('EMAUDIO_BANDCAMP_VISUALIZATION_BUBBLES', 'bubbles');
define('EMAUDIO_BANDCAMP_VISUALIZATION_ABSTRACT3D', 'abstract3d');
define('EMAUDIO_BANDCAMP_VISUALIZATION_FLOWERS', 'flowers');
define('EMAUDIO_BANDCAMP_VISUALIZATION_PLASMA', 'plasma');
define('EMAUDIO_BANDCAMP_VISUALIZATION_EQUALIZER', 'equalizer3d');
define('EMAUDIO_BANDCAMP_VISUALIZATION_HYPNO', 'hypno');
define('EMAUDIO_BANDCAMP_VISUALIZATION_PLUGHOLE', 'plughole');
define('EMAUDIO_BANDCAMP_VISUALIZATION_STRATA', 'strata');
define('EMAUDIO_BANDCAMP_VISUALIZATION_RIBBONS', 'ribbons');

//player defaults
define('EMAUDIO_BANDCAMP_ALBUM_SIZE_DEFAULT', 'grande2');
define('EMAUDIO_BANDCAMP_TRACK_SIZE_DEFAULT', 'venti');
define('EMAUDIO_BANDCAMP_SIZE_DEFAULT', 'venti');
define('EMAUDIO_BANDCAMP_VISUALIZATION_DEFAULT', 'none');


/**
 *  This defines the version of the content data array that we serialize
 *  in emvideo_hulu_data(). If we change the expected keys of that array,
 *  we must increment this value, which will allow older content to be updated
 *  to the new version automatically.
 */
define('EMAUDIO_BANDCAMP_DATA_VERSION', 1);

/**
 *  Return the information about a specific provider.
 *
 *  Each provider module must implement this hook to be recognized.
 *
 *  @return
 *    An associative array with the following information:
 *      'provider' => The machine name, should be same as the provider filename.
 *      'name' => The provider's human readable name.
 *      'url' => The URL to the provider's main page.
 *      'settings_description' => This will be displayed above the provider
 *        information on the administration page.
 *      'supported_features' => An array of cells to be passed to a table
 *        on the administration page, under the headers of 'Feature',
 *        'Supported', and 'Notes'.
 */
function emaudio_bandcamp_info() {
    $features = array(
        array(t('Autoplay'), t('no'), ''),
        array(t('RSS Attachment'), t('no'), ''),
        array(t('Thumbnails'), t('no'), t('')),
        array(t('Duration'), t('no'), ''),
        array(t('Full screen mode'), t('no'), t('You may customize the player to enable or disable full screen playback. Full screen mode is enabled by default.')),
        array(t('Use JW FLV Media Player'), t('no'), t("You may opt to use the !flvplayer to play example.com videos if it's installed on your server.", array('!flvplayer' => l(t('JW FLV Media Player'), 'http://www.longtailvideo.com/players/jw-flv-player/')))),
    );
    return array(
        'provider' => 'bandcamp',
        'name' => t('Bandcamp'),
        'url' => EMAUDIO_BANDCAMP_MAIN_URL,
        'settings_description' => t('These settings specifically affect videos displayed from !bandcamp.', array('!bandcamp' => l(t('Bandcamp.com'), EMAUDIO_BANDCAMP_MAIN_URL))),
        'supported_features' => $features,
    );
}

/**
 *  Menu settings
 *
 */
function emaudio_bandcamp_settings() {
    $form['bandcamp']['player'] = array(
        '#type' => 'fieldset',
        '#title' => 'Player options',
        '#description' => 'Styling and playback options for the embedded player.',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['bandcamp']['player']['color'] = array(
        '#type' => 'fieldset',
        '#title' => 'Color',
        '#description' => 'If allowed, these colors in hexidecimal RRGGBB (without #), will be used to change the skin of the Bandcamp player.',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['bandcamp']['player']['color']['emaudio_bandcamp_color_override'] = array(
        '#type' => 'checkbox',
        '#title' => 'Override player color',
        '#default_value' => variable_get('emaudio_bandcamp_color_override', FALSE),
    );

    // find an example using the colour wheel module

    $form['bandcamp']['player']['color']['emaudio_bandcamp_background_color'] = array(
        '#type' => 'textfield',
        '#title' => 'Background Color',
        '#default_value' => variable_get('emaudio_bandcamp_background_color', EMAUDIO_BANDCAMP_BACKGROUND_COLOR_DEFAULT),
    );

    $form['bandcamp']['player']['color']['emaudio_bandcamp_link_color'] = array(
        '#type' => 'textfield',
        '#title' => 'Text Color',
        '#default_value' => variable_get('emaudio_bandcamp_link_color', EMAUDIO_BANDCAMP_LINK_COLOR_DEFAULT),
    );

    $form['bandcamp']['player']['dimensions'] = array(
        '#type' => 'fieldset',
        '#title' => 'Size and Type',
        '#description' => 'Set the size and type of the player for albums and tracks',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['bandcamp']['player']['dimensions']['emaudio_bandcamp_override_default_dimensions'] = array(
        '#type' => 'checkbox',
        '#title' => 'Override emaudio default sizes',
        '#description' => 'Use the sizes set here in place of emaudio defaults',
        '#default_value' => 1,
    );


    $form['bandcamp']['player']['dimensions']['album']['emaudio_bandcamp_album_full_dimensions'] = array(
        '#type' => 'select',
        '#title' => 'Album (full display)',
        '#default_value' => variable_get('emaudio_bandcamp_album_full_dimensions', EMAUDIO_BANDCAMP_ALBUM_SIZE_DEFAULT),
        '#options' => array(
            'venti' => t('Venti (400 x 100)'),
            'grande' => t('Grande (300 x 100)'),
            'grande2' => t('Grande with tracklist (400 x 355)'),
            'grande3' => t('Grande with tracklist and art (300 x 415)'),
            'tall' => t('Tall (150 x 295)'),
            'tall2' => t('Tall with tracklist (150 x 450)'),
            'short' => t('Short (46 x 23)'),
        ),
        '#description' => 'Set the type and size of embedded media player for albums',
    );



    $form['bandcamp']['player']['dimensions']['album']['emaudio_bandcamp_album_preview_dimensions'] = array(
        '#type' => 'select',
        '#title' => 'Album (preview)',
        '#default_value' => variable_get('emaudio_bandcamp_album_preview_dimensions', EMAUDIO_BANDCAMP_ALBUM_SIZE_DEFAULT),
        '#options' => array(
            'venti' => t('Venti (400 x 100)'),
            'grande' => t('Grande (300 x 100)'),
            'grande2' => t('Grande with tracklist (400 x 355)'),
            'grande3' => t('Grande with tracklist and art (300 x 415)'),
            'tall' => t('Tall (150 x 295)'),
            'tall2' => t('Tall with tracklist (150 x 450)'),
            'short' => t('Short (46 x 23)'),
        ),
        '#description' => 'Set the type and size of embedded media player for albums',
    );


    $form['bandcamp']['player']['dimensions']['track']['emaudio_bandcamp_track_full_dimensions'] = array(
        '#type' => 'select',
        '#title' => 'Track (full display)',
        '#default_value' => variable_get('emaudio_bandcamp_track_full_dimensions', EMAUDIO_BANDCAMP_TRACK_SIZE_DEFAULT),
        '#options' => array(
            'venti' => t('Venti (400 x 100)'),
            'grande' => t('Grande (300 x 100)'),
            'grande2' => t('Grande with tracklist (400 x 355)'),
            'grande3' => t('Grande with tracklist and art (300 x 415)'),
            'tall' => t('Tall (150 x 295)'),
            'tall2' => t('Tall with tracklist (150 x 450)'),
            'short' => t('Short (46 x 23)'),
        ),
        '#description' => 'Set the type and size of embedded media player for tracks',
    );

    $form['bandcamp']['player']['dimensions']['track']['emaudio_bandcamp_track_preview_dimensions'] = array(
        '#type' => 'select',
        '#title' => 'Track (preview)',
        '#default_value' => variable_get('emaudio_bandcamp_track_preview_dimensions', EMAUDIO_BANDCAMP_TRACK_SIZE_DEFAULT),
        '#options' => array(
            'venti' => t('Venti (400 x 100)'),
            'grande' => t('Grande (300 x 100)'),
            'grande2' => t('Grande with tracklist (400 x 355)'),
            'grande3' => t('Grande with tracklist and art (300 x 415)'),
            'tall' => t('Tall (150 x 295)'),
            'tall2' => t('Tall with tracklist (150 x 450)'),
            'short' => t('Short (46 x 23)'),
        ),
        '#description' => 'Set the type and size of embedded media player for tracks',
    );

    $form['bandcamp']['player']['visualization'] = array(
        '#type' => 'fieldset',
        '#title' => t('Visualization'),
        '#description' => t('Set the default visualization'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );

    $form['bandcamp']['player']['visualization']['emaudio_bandcamp_visualization'] = array(
        '#type' => 'radios',
        '#title' => 'Visualization',
        '#default_value' => variable_get('emaudio_bandcamp_visualization', EMAUDIO_BANDCAMP_VISUALIZATION_DEFAULT),
        '#options' => array(
            'none' => t('No visuals, just display the player'),
            'bubbles' => t('Bubbles'),
            'abstract3d' => t('Abstract 3D'),
            'flowers' => t('Flowers'),
            'plasma' => t('Plasma'),
            'equalizer3d' => t('Equalizer'),
            'hypno' => t('Hypno'),
            'plughole' => t('Plughole'),
            'strata' => t('Strata'),
            'ribbons' => t('Ribbons'),
        ),
        '#description' => 'Choose the default visualization',
    );

    return $form;
}

/**
 *  Parse the URL or embed code provided by an editor.
 *
 *  @param $embed
 *    The raw URL or embed code pasted into the text field by the editor.
 *  @param $field
 *    The field data for the emvideo, emaudio, etc.
 *  @return
 *    If the hook returns a non-empty string, then it is assumed to have been
 *    parsed and matched by this provider. If the hook returns an array of
 *    strings, then each string is assumed to be a regex pattern, and will
 *    be checked for a match in turn. Otherwise, it is assumed there is no
 *    match.
 */
function emaudio_bandcamp_extract($embed, $field) {

    return array(
        // matching urls
        // http://laurashigihara.bandcamp.com
        // http://laurashigihara.bandcamp.com/track/crazy-daves-greeting
        // http://laurashigihara.bandcamp.com/album/plants-vs-zombies-soundtrack
        '@((?:\w+)\.bandcamp\.com/(album|track)?/(?:[^"\&]+))@i',
        //match embed code
        //<object data="http://bandcamp.com/EmbeddedPlayer/album=1420100316/size=venti/bgcol=FFFFFF/linkcol=4285BB//"
        //type="text/html" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
        //width="400" height="100">
        //<param name="movie" value="http://bandcamp.com/EmbeddedPlayer/album=1420100316/size=venti/bgcol=FFFFFF/linkcol=4285BB//">
        //<param name="quality" value="high"><param name="allowNetworking" value="always">
        //<param name="wmode" value="transparent"><param name="bgcolor" value="#FFFFFF">
        //<param name="allowScriptAccess" value="never">
        //<object data="http://bandcamp.com/EmbeddedPlayer/album=1420100316/size=venti/bgcol=FFFFFF/linkcol=4285BB//" type="text/html" width="400" height="100"></object></object>

        '@http://bandcamp\.com/EmbeddedPlayer/((album|track)=([\d]+))@i',
    );
}

/**
 *  Validate the provider's embedded code.
 *
 *  This allows each provider to determine whether a pasted URL that otherwise
 *  matches a parse attempt from EMMODULE_PROVIDER_extract is valid.
 *  For instance, the provider file might check against the third party
 *  provider's API to ensure a video still exists. If the validation is to
 *  fail, the function should call form_set_error with the provided
 *  $error_field.
 *
 *  @param $code
 *    The unique identifier for the third party media.
 *  @param $error_field
 *    The form field to use with form_set_error().
 */


//todo check and validate color input
function EMMODULE_PROVIDER_validate($code, $error_field) {
    if (!_example_call_api('video_data', $code)) {
        form_set_error($error_field, t('That video no longer exists on example.com.'));
    }
}

/*
 * Retrieve information and parse information from URL
 *
 * @return $data
 *   An associative array containing
 *   - type: whether the content is an 'album' or 'track'
 *   - code: the unique numerical ID of the track
 *   - preview_image: the URI of cover art
 */

function emaudio_bandcamp_data($field, $item) {
    //dsm($field);
    //$data = array('emaudio_bandcamp_version' => EMAUDIO_BANDCAMP_DATA_VERSION);
    $data = array();

    //regex for embed code
    $embed_regex = '@http://bandcamp\.com/EmbeddedPlayer/(album|track)=([\d]+)@i';
    //regex for link
    $link_regex = '@((?:\w+)\.bandcamp\.com/(album|track)?/(?:[^"\&]+))@i';

    //if we have an embed code, just return the values for type and code
    if (preg_match($embed_regex, $item['embed'], &$matches)) {
        $data['type'] = $matches[1]; //matched (album|track)
        $data['code'] = $matches[2]; //matched code


        return $data;
    }

    //if we have a link
    if (preg_match($link_regex, $item['embed'])) {
        //request the page at the given url
        $response = drupal_http_request($item['embed']);
        if ($response->code == 200) {

            //extract 'album' or 'track' and unique numerical identifier
            preg_match('@(?:video_src.+)(album|track)=([\d]+)@i', $response->data, &$matches);

            $data['type'] = $matches[1]; // 'album' or 'track'
            $data['code'] = $matches[2]; // the numerical identifier for the album or track
            //extract preview image URL for potential use by themers
            preg_match('@http://[^"\&]+\.jpg@i', $response->data, &$matches);
            $data['preview_image'] = $matches[0];

            return $data;
        }
    }
}

function emaudio_bandcamp_data_version($field, $item) {
    return EMAUDIO_BANDCAMP_DATA_VERSION;
}

/**
 * The embedded flash displaying the SoundCloud audio.
 */
function theme_emaudio_bandcamp_flash($item) {

    $type = $item['data']['type'];
    $code = $item['data']['code'];
    $width = $item['options']['width'];
    $height = $item['options']['height'];
    $size = $item['options']['size'];
    $bg_color = $item['options']['bg_color'];
    $link_color = $item['options']['link_color'];
    $visualization = $item['options']['visualization'];


    //don't forget to add a bit about visualization

    $output = <<<BC
<object data="http://bandcamp.com/EmbeddedPlayer/{$type}={$code}/size={$size}/bgcol={$bg_color}/linkcol={$link_color}/vis={$visualization}//"
type="text/html" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{$width}" height="{$height}">
<param name="movie" value="http://bandcamp.com/EmbeddedPlayer/{$type}={$code}/size={$size}/bgcol={$bg_color}/linkcol={$link_color}/vis={$visualization}//">
<param name="quality" value="high">
<param name="allowNetworking" value="always">
<param name="wmode" value="transparent">
<param name="bgcolor" value="#{$bg_color}">
<param name="allowScriptAccess" value="never">
<object data="http://bandcamp.com/EmbeddedPlayer/{$type}={$code}/size={$size}/bgcol={$bg_color}/linkcol={$link_color}/vis={$visualization}//" type="text/html" width="{$width}" height="{$height}">
</object></object>
BC;

    return $output;
}

/**
 * Returns a link to view the original media at the provider's site.
 *  @param $code
 *    The unique identifier for the third party media.
 *  @param $data
 *    The original data array collected for the media.
 *  @return
 *    A string containing the URL to view the original media.
 */
function emaudio_bandcamp_embedded_link($code, $data = array()) {
    return $code;
}

/*
 * This displays the actual content
 */

function emaudio_bandcamp_audio($embed, $width, $height, $field, $item, $node, $autoplay) {

    $item['options'] = emaudio_bandcamp_set_options($item, $width, $height, 'full');

    return theme('emaudio_bandcamp_flash', $item);
}

/**
 *  Returns any theme functions required for this provider.
 */
function emaudio_bandcamp_emfield_subtheme() {
    return array(
        'emaudio_bandcamp_flash' => array(
            'arguments' => array('embed' => NULL, 'width' => NULL, 'height' => NULL, 'autoplay' => NULL, 'options' => array()),
            'file' => 'providers/bandcamp.inc',
        ),
    );
}

/*
 * Implementation of emfield_hook_preview
 */

function emaudio_bandcamp_preview($embed, $width, $height, $field, $item, $node, $autoplay) {
    $item['options'] = emaudio_bandcamp_set_options($item, $width, $height, 'preview');

    return theme('emaudio_bandcamp_flash', $item);
}

/**
 *  Build a list of provider files that serve the invoking module.
 *
 *  @param $module
 *    The contributed Embedded Media Field module in question, such as
 *    Embedded Video Field or Embedded Google Wave.
 *  @param $provider
 *    If provided, then we expect the single provider file named.
 *    Otherwise, we expect an array of all provider files supported.
 *  @return
 *    A listing of files built with drupal_system_listing().
 */
function hook_emfield_providers($module, $provider = NULL) {
    return drupal_system_listing("$provider\.inc$", drupal_get_path('module', 'media_example') . "/providers/$module", 'name', 0);
}


/*
 * @param $item
 * nested array of player parameters, options and data
 *
 * @param $width
 * The default width set in the emaudio providers default CCK configuration
 *
 * @param $height
 * The default height set in the emaudio providers default CCK configuration
 *
 * @param $display_type
 * A string literal - either 'full' or 'preview' for the type of display being handled
 *
 *
 */

function emaudio_bandcamp_set_options($item, $width, $height, $display_type = 'full') {

    $options = array();
    $type = $item['data']['type'];
    $size = variable_get('emaudio_bandcamp_' . $type . '_' . $display_type . '_dimensions', EMAUDIO_BANDCAMP_SIZE_DEFAULT);

    if (variable_get('emaudio_bandcamp_override_default_dimensions', 0)) {

        switch ($size) {

            case EMAUDIO_BANDCAMP_SIZE_VENTI:
                $width = EMAUDIO_BANDCAMP_SIZE_VENTI_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_VENTI_HEIGHT;
                break;

            case EMAUDIO_BANDCAMP_SIZE_GRANDE:
                $width = EMAUDIO_BANDCAMP_SIZE_GRANDE_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_GRANDE_HEIGHT;
                break;

            case EMAUDIO_BANDCAMP_SIZE_GRANDE2_TRACK:
                $width = EMAUDIO_BANDCAMP_SIZE_GRANDE2_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_GRANDE2_HEIGHT;
                break;

            case EMAUDIO_BANDCAMP_SIZE_GRANDE3_TRACK_ART:
                $width = EMAUDIO_BANDCAMP_SIZE_GRANDE3_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_GRANDE3_HEIGHT;
                break;

            case EMAUDIO_BANDCAMP_SIZE_TALL:
                $width = EMAUDIO_BANDCAMP_SIZE_TALL_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_TALL_HEIGHT;
                break;

            case EMAUDIO_BANDCAMP_SIZE_TALL2_TRACK:
                $width = EMAUDIO_BANDCAMP_SIZE_TALL2_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_TALL2_HEIGHT;
                break;

            case EMAUDIO_BANDCAMP_SIZE_SHORT:
                $width = EMAUDIO_BANDCAMP_SIZE_SHORT_WIDTH;
                $height = EMAUDIO_BANDCAMP_SIZE_SHORT_HEIGHT;
                break;
        }
    }

    $options['size'] = $size;
    $options['width'] = $width;
    $options['height'] = $height;
    $options['bg_color'] = variable_get('emaudio_bandcamp_background_color', EMAUDIO_BANDCAMP_BACKGROUND_COLOR_DEFAULT);
    $options['link_color'] = variable_get('emaudio_bandcamp_link_color', EMAUDIO_BANDCAMP_LINK_COLOR_DEFAULT);
    $options['visualization'] = variable_get('emaudio_bandcamp_visualization', EMAUDIO_BANDCAMP_VISUALIZATION_DEFAULT);
    return $options;
}