export class SliderOperations {
    constructor() {
        this.$ = jQuery;
    }

    createNew() {

        this.$.ajax({
            url: ajaxurl,
            data: {
                action: 'stm_slider_ajax',
                create: 'slider'
            },
            success: (res) => {
                console.log(res);
                if (res.status === 200) {
                    window.location = `${window.location}&action=edit&slider_id=${res.data}`;
                }
            }

        })
    }

    delete($id) {
        this.$.ajax({
            url: ajaxurl,
            data: {
                action: 'stm_slider_ajax',
                delete: $id
            },
            success: (res) => {
                console.log(res);
                if (res.status === 200) {
                    window.location.reload();
                }
            }

        })
    }

}