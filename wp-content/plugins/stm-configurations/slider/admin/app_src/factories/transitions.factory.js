export const transitions =  () => {
    var transitions = {
        'default' : 'Default',
        'bounce' : 'Bounce',
        'flash' : 'Flash',
        'pulse' : 'Pulse',
        'rubberBand' : 'Rubber Band',
        'shake' : 'Shake',
        'headShake' : 'Head Shake',
        'swing' : 'Swing',
        'tada' : 'Tada',
        'wobble' : 'Wobble',
        'jello' : 'Jello',
        'bounceIn': 'Bounce In',
        'bounceInDown': 'Bounce In Down',
        'bounceInLeft' : 'Bounce In Left',
        'bounceInRight' : 'Bounce In Right',
        'bounceInUp' : 'Bounce In Up',
        'bounceOut': 'Bounce Out',
        'bounceOutDown': 'Bounce Out Down',
        'bounceOutLeft' : 'Bounce Out Left',
        'bounceOutRight': 'Bounce Out Right' ,
        'bounceOutUp' : 'Bounce Out Up',
        'fadeIn': 'Fade In',
        'fadeInDown': 'Fade In Down',
        'fadeInDownBig': 'Fade In Down Big',
        'fadeInLeft' : 'Fade In Left',
        'fadeInLeftBig' : 'Fade In Left Big',
        'fadeInRight' : 'Fade In Right',
        'fadeInRightBig' : 'Fade In Right Big',
        'fadeInUp' : 'Fade In Up',
        'fadeInUpBig' : 'Fade In Up Big',
        'flip' : 'Flip',
        'flipInX' : 'Flip In X',
        'flipInY' : 'Flip In Y',
        'flipOutX' : 'Flip Out X',
        'flipOutY' : 'Flip Out Y',
        'lightSpeedIn' : 'Light Speed In',
        'lightSpeedOut' : 'light Speed Out',
        'rotateIn' : 'Rotate In',
        'rotateInDownLeft' : 'Rotate In Down Left',
        'rotateInDownRight' : 'Rotate In Down Right',
        'rotateInUpLeft' : 'Rotate In Up Left',
        'rotateInUpRight' : 'Rotate In Up Right',
        'rotateOut': 'Rotate Out',
        'rotateOutDownLeft' : 'Rotate Out Down Left',
        'rotateOutDownRight' : 'Rotate Out Down Right',
        'rotateOutUpLeft' : 'Rotate Out Up Left',
        'rotateOutUpRight' : 'Rotate Out Up Right',
        'hinge' : 'Hinge',
        'rollIn' : 'Roll In',
        'rollOut' : 'Roll Out',
        'zoomIn' : 'Zoom In',
        'zoomInDown' : 'Zoom In Down',
        'zoomInLeft' : 'Zoom In Left',
        'zoomInRight' : 'Zoom In Right',
        'zoomInUp' : 'Zoom In Up',
        'zoomOut' : 'Zoom Out',
        'zoomOutDown' : 'Zoom Out Down',
        'zoomOutLeft' : 'Zoom Out Left',
        'zoomOutRight' : 'Zoom Out Right',
        'zoomOutUp' : 'Zoom Out Up',
        'slideInDown' : 'Slide In Down',
        'slideInLeft' : 'Slide In Left',
        'slideInRight' : 'Slide In Right',
        'slideInUp' : 'Slide In Up',
        'slideOutDown' : 'Slide Out Down',
        'slideOutLeft' : 'Slide Out Left',
        'slideOutRight' : 'Slide Out Right',
        'slideOutUp' : 'Slide Out Up'
    };
    return {
        getTransitionsTypes : () => {
            'use strict';
            let types = {};
            angular.forEach(transitions, (v, k) => {
                let type = k.replace('_', ' ');
                types[k] = type;
                // types.push(k);
            });

            return types;
        },
        getTransitions() {
            'use strict';
            return transitions;
        }
    }
};