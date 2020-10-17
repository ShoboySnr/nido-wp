(function ($) {
    function repeaterController() {
        var $ = jQuery;
        var Input = Backbone.Model.extend();

        var Inputs = Backbone.Collection.extend({
            model: Input,
            initialize: function () {
                this.on('delete', this.remove);
            }
        });

        var rows = new Inputs();


        var addRowButtonView = Backbone.View.extend({

            counter: rows.length,
            events: {
                'click': 'addRow'
            },

            attributes: {
              style: 'margin-top: 30px'
            },

            initialize: function () {

                this.checkSaved();

                if (this.counter === 0) {
                    this.addRow();
                }
            },

            addRow: function ( e, key = '', val = '') {
                this.updateCounter();

                rows.add(new Input({
                    key: {
                        name: 'widget-repeater[2][rows][' + this.counter + '][key]',
                        value: key
                    },
                    value: {
                        name: 'widget-repeater[2][rows][' + this.counter + '][value]',
                        value: val
                    }
                }));
            },

            checkSaved: function () {
                if (typeof rowsSaved === 'object') {
                    for (var i = 0; i < rowsSaved.length; i++) {
                        this.addRow('', rowsSaved[i].key, rowsSaved[i].value);
                    }
                }
            },

            updateCounter: function () {
                this.counter = rows.length;
            },

            render: function () {
                let i = $('<i class="stmicon-plus-outline"></i>').appendTo(this.$el);
                i.css({
                    'font-size': '25px',
                    'padding': '5px',
                    'border': '1px solid',
                    'border-radius': '5px',
                    'display': 'inline-block',
                })

                return this;
            }
        });

        var InputsView = Backbone.View.extend({

            initialize: function () {
                this.model.on('all', this.render, this);
            },


            render: function () {
                var self = this;

                this.$el.html(' ');

                if (this.model.length < 1) {
                    this.$el.html(' ');
                }


                this.model.each(function (row) {
                    var rowView = new InputView({model: row});
                    self.$el.append(rowView.render().$el);
                })

            }

        });


        var InputView = Backbone.View.extend({

            events: {
                'click .close': 'removeRow',
                'keyup input': 'updateColleciton'
            },
            className: 'row',

            inputTo: null,

            attributes: {
              style: 'display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px'
            },

            template: _.template('<input class="koko" name="<%= key.name %>" type="text" value="<%= key.value %>"><input name="<%= value.name %>" type="text" value="<%= value.value %>"><i class="stmicon-cross close"></i>'),

            removeRow: function (e) {

                if (rows.length !== 1) {
                    this.remove();
                    this.model.trigger('delete', this.model);
                } else {
                    this.model.trigger('reset', this.model);
                }
            },

            updateColleciton: function (e) {

                if (this.inputTo) {
                    clearTimeout(this.inputTo);
                }


                this.inputTo = setTimeout(() => {
                    "use strict";
                },200);

                let input = $(e.target);
                let id = input.parent('.row').index();


            },


            render: function () {
                this.$el.html(this.template({
                    key: this.model.get('key'),
                    value: this.model.get('value')
                }));

                this.$el.find('.stmicon-cross').css({
                    'font-size': '20px'
                })

                return this;
            }
        });


        var inputsView = new InputsView({el: '.widgets-sortables .rows', model: rows});
        var addRowButton = new addRowButtonView({el: '.widgets-sortables .addRow'});


        addRowButton.render();
        inputsView.render();

    }

    repeaterController();

    $(document).on('widget-updated', function (e, w) {
        repeaterController();
    });
})(jQuery)


