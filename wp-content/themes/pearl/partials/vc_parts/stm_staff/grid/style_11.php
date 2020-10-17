<?php
/*STM STAFF LIST*/
// Barbershop
$image_size = (!empty($image_size)) ? $image_size : '280x280';
$image = (!empty($image)) ? pearl_get_VC_img($image, $image_size) : '';

$main_color=pearl_get_option('main_color');
$secondary_color=pearl_get_option('secondary_color');
$third_color=pearl_get_option('third_color');

if(!empty($image)): ?>
    <div class="stm_staff__image">
        <?php echo wp_kses_post($image); ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="199.012" height="69.917" viewBox="0 0 199.012 69.917">
            <g id="Group_18" data-name="Group 18" transform="translate(-425.012 -2512.432)">
                <g id="Group_16" data-name="Group 16" transform="translate(136.523 2480.653) rotate(-20)">
                <path id="Path_313" data-name="Path 313" d="M432.981,195.324c-10.321,13.918-24.387,25.189-40.578,31.359s-34.493,7.079-50.952,1.663" transform="translate(0 -1.175)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                <path id="Path_314" data-name="Path 314" d="M391.6,240.377a20.972,20.972,0,0,1,18.6,2.047,3.7,3.7,0,0,0,1.641.8,9.566,9.566,0,0,1-7.736,1.492,23.161,23.161,0,0,1-7.4-3.27c-1.319-.808-3.692-1.693-5.108-1.07" transform="translate(-11.567 -11.267)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_315" data-name="Path 315" d="M411.647,228.331c3.651-1.2,6.849-5.108,8.285-8.673a27.673,27.673,0,0,0,1.551-11.338,15.108,15.108,0,0,0-5.469,7.446c-.744,2.246-.946,4.633-1.533,6.925a10.8,10.8,0,0,1-4.005,6.135" transform="translate(-15.921 -4.173)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_316" data-name="Path 316" d="M431.27,221.79a28.233,28.233,0,0,1,16.372-5.549,12.11,12.11,0,0,0,4.585-.524,16.243,16.243,0,0,1-3.708,3.826c-2.277,1.493-5.146,1.745-7.867,1.632s-5.448-.545-8.153-.242" transform="translate(-20.718 -5.879)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_317" data-name="Path 317" d="M378.2,237.849a10.915,10.915,0,0,0,8.16-4.451c2.22-3.08,2.651-7.057,3.01-10.837-.535,1.162-1.949,1.557-3.01,2.273a8.118,8.118,0,0,0-2.874,4.473,38.408,38.408,0,0,1-1.627,5.164,5.763,5.763,0,0,1-3.931,3.426" transform="translate(-8.413 -7.458)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_318" data-name="Path 318" d="M443.409,208.16a17.82,17.82,0,0,0,4.164-8.445,37.3,37.3,0,0,0,.583-9.487,7.948,7.948,0,0,0-3.168,5.562c-.341,2.213-.17,4.471-.3,6.706a13.618,13.618,0,0,1-2.677,7" transform="translate(-23.195)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_319" data-name="Path 319" d="M389.309,224.325a10.572,10.572,0,0,0-2.854,4.766,33.468,33.468,0,0,1-1.957,5.264,6.55,6.55,0,0,1-4.181,3.49" transform="translate(-8.965 -7.865)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_320" data-name="Path 320" d="M412.29,243.488a20.669,20.669,0,0,1-8.639-.828,85.936,85.936,0,0,0-8.454-2.223" transform="translate(-12.397 -11.581)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_321" data-name="Path 321" d="M421.357,209.576a43.464,43.464,0,0,1-2.567,8.55c-.541,1.183-1.187,2.316-1.748,3.49-.547,1.147-1.013,2.336-1.639,3.443a7.718,7.718,0,0,1-2.51,2.82" transform="translate(-16.479 -4.463)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_322" data-name="Path 322" d="M452.424,216.006a18.647,18.647,0,0,1-5.952,2.944,41.261,41.261,0,0,1-5.672.857l-5.879.611" transform="translate(-21.56 -5.946)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_323" data-name="Path 323" d="M448.394,190.924a15.081,15.081,0,0,0-1.171,5.632,46.382,46.382,0,0,1-.432,5.769,9.2,9.2,0,0,1-2.5,5.114" transform="translate(-23.722 -0.161)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_324" data-name="Path 324" d="M461.478,194.872a1.507,1.507,0,1,1-1.506-1.507A1.507,1.507,0,0,1,461.478,194.872Z" transform="translate(-26.99 -0.724)" fill="#c0a6ea" stroke="#78c15d" stroke-width="1"/>
                </g>
                <g id="Group_17" data-name="Group 17" transform="translate(507.625 2583.457) rotate(-160)">
                <path id="Path_313-2" data-name="Path 313" d="M87.113,34.823C77.29,21.577,63.9,10.85,48.493,4.977S15.664-1.76,0,3.4" transform="translate(0 2.801)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                <path id="Path_314-2" data-name="Path 314" d="M0,4.349A19.96,19.96,0,0,0,17.7,2.4a3.517,3.517,0,0,1,1.562-.762A9.1,9.1,0,0,0,11.9.218,22.044,22.044,0,0,0,4.862,3.33C3.606,4.1,1.348,4.941,0,4.349" transform="translate(36.72 0)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_315-2" data-name="Path 315" d="M1.115.472C4.59,1.615,7.634,5.333,9,8.726a26.337,26.337,0,0,1,1.476,10.791,14.379,14.379,0,0,1-5.205-7.087c-.708-2.137-.9-4.409-1.459-6.591A10.274,10.274,0,0,0,0,0" transform="translate(50.54 8.591)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_316-2" data-name="Path 316" d="M0,0A26.871,26.871,0,0,0,15.581,5.281a11.526,11.526,0,0,1,4.364.5,15.459,15.459,0,0,0-3.529-3.641C14.249.718,11.518.478,8.929.586a50.957,50.957,0,0,1-7.76.231" transform="translate(65.767 16.911)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_317-2" data-name="Path 317" d="M.259.046A10.388,10.388,0,0,1,8.025,4.282C10.137,7.213,10.548,11,10.89,14.6c-.509-1.106-1.855-1.482-2.864-2.164A7.726,7.726,0,0,1,5.29,8.175,36.555,36.555,0,0,0,3.742,3.261,5.485,5.485,0,0,0,0,0" transform="translate(26.707 3.084)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_318-2" data-name="Path 318" d="M1.333,1.276A16.96,16.96,0,0,1,5.3,9.313a35.5,35.5,0,0,1,.555,9.029,7.564,7.564,0,0,1-3.015-5.293c-.324-2.106-.162-4.255-.288-6.382A12.96,12.96,0,0,0,0,0" transform="translate(73.629 23.013)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_319-2" data-name="Path 319" d="M8.557,12.867A10.061,10.061,0,0,1,5.842,8.331a31.854,31.854,0,0,0-1.863-5.01A6.234,6.234,0,0,0,0,0" transform="translate(28.459 3.522)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_320-2" data-name="Path 320" d="M16.268.166A19.672,19.672,0,0,0,8.046.954,81.794,81.794,0,0,1,0,3.07" transform="translate(39.354 1.521)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_321-2" data-name="Path 321" d="M8.056,17.419A41.368,41.368,0,0,0,5.612,9.281C5.1,8.155,4.483,7.078,3.949,5.96c-.521-1.092-.964-2.223-1.56-3.277A7.345,7.345,0,0,0,0,0" transform="translate(52.311 9.769)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_322-2" data-name="Path 322" d="M16.658,4.2a17.748,17.748,0,0,0-5.664-2.8,39.269,39.269,0,0,0-5.4-.816L0,0" transform="translate(68.441 18.281)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_323-2" data-name="Path 323" d="M3.9,15.717a14.352,14.352,0,0,1-1.114-5.36,44.146,44.146,0,0,0-.411-5.49A8.751,8.751,0,0,0,0,0" transform="translate(75.302 25.128)" fill="none" stroke="#78c15d" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                <path id="Path_324-2" data-name="Path 324" d="M2.868,1.434A1.434,1.434,0,1,0,1.434,2.868,1.434,1.434,0,0,0,2.868,1.434Z" transform="translate(85.678 36.19)" fill="#c0a6ea" stroke="#78c15d" stroke-width="1"/>
                </g>
            </g>
        </svg>
    </div>
    <div class="stm_staff__info">
        <?php if(!empty($name)): ?>
            <h6 class="stm_staff__name"><?php echo sanitize_text_field($name); ?></h6>
        <?php endif; ?>
        <?php if(!empty($job)): ?>
            <div class="stm_staff__job"><?php echo sanitize_text_field($job); ?></div>
        <?php endif; ?>
        <?php if(!empty($description)): ?>
            <p class="stm_staff__description"><?php echo wp_kses_post($description); ?></p>
        <?php endif; ?>

        <?php if(!empty($full_description)): ?>
            <p class="js_trigger__unit"><?php echo wp_kses_post($full_description); ?></p>
        <?php endif; ?>


		<?php
		/*Socials*/
		$socials = array();
		if(!empty($facebook)) $socials['facebook'] = $facebook;
		if(!empty($twitter)) $socials['twitter'] = $twitter;
		if(!empty($linkedin)) $socials['linkedin'] = $linkedin;
		if(!empty($gplus)) $socials['gplus'] = $gplus;
		if(!empty($insta)) $socials['insta'] = $insta;
		pearl_load_vc_element('stm_staff', $socials, 'parts/socials');
		?>
    </div>
<?php endif; ?>