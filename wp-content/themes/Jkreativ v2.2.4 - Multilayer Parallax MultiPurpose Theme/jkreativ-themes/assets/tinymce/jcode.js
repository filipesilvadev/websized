(function() {

	tinymce.create('tinymce.plugins.jcode', {
		init : function(ed, url) {

			ed.addCommand('jcode', function() {

			    ed.windowManager.open({
                    title: "Source code",
                    body: {
                        type: "textbox",
                        name: "code",
                        multiline: !0,
                        minWidth: ed.getParam("code_dialog_width", 600),
                        minHeight: ed.getParam("code_dialog_height", Math.min(tinymce.DOM.getViewPort().h - 200, 500)),
                        value: ed.getContent({
                            source_view: !0
                        }),
                        spellcheck: !1,
                        style: "direction: ltr; text-align: left"
                    },
                    onSubmit: function (o) {
                        ed.focus(), ed.undoManager.transact(function () {
                            ed.setContent(o.data.code)
                        }), ed.selection.setCursorLocation(), ed.nodeChanged()
                    }
                });

			});

			ed.addButton('jcode', {
				title : 'Edit HTML',
				cmd : 'jcode',
				image : url + '/img/icon.png'
			});

			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('jcode', n.nodeName == 'CODE');
			});
		},

		getInfo : function() {
			return {
				longname    : 'Code Element',
				author      : 'Jegtheme',
				authorurl   : 'http://jegtheme.com',
				infourl     : '',
				version     : "1.0.0"
			};
		}
	});

	tinymce.PluginManager.add('jcode', tinymce.plugins.jcode);
})();

