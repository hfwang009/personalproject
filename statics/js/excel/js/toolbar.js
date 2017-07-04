function formulaWizard() {
    Ext.onReady(function() {
        var store = new Ext.data.SimpleStore({
            fields: ["function_id", "function_name", "function_category", "function_description"],
            data: calculator.getFunctionNameList()
        });
        store.sort("function_id");
        var grid = new Ext.grid.GridPanel({
            store: store,
            columns: [{
                header: "Function",
                width: 120,
                dataIndex: "function_id",
                sortable: true
            },
            {
                header: "Category",
                width: 115,
                dataIndex: "function_category",
                sortable: true
            }],
            sm: new Ext.grid.RowSelectionModel({
                singleSelect: true
            }),
            viewConfig: {
                forceFit: true
            },
            height: 210,
            autoWidth: true,
            split: true,
            region: "north"
        });
        var bookTpl = new Ext.Template(["<br/>{function_description} <br/>"]);
        var ct = new Ext.Panel({
            frame: true,
            title: "选择一个函数...",
            autoHeight: true,
            autoWidth: true,
            items: [grid, {
                id: "detailPanel",
                region: "center",
                bodyStyle: {
                    padding: "10px"
                },
                html: "<br><br><strong>Please select a function to see additional details.<strong>"
            }]
        });
        grid.getSelectionModel().on("rowselect",
        function(sm, rowIdx, r) {
            var detailPanel = Ext.getCmp("detailPanel");
            bookTpl.overwrite(detailPanel.body, r.data);
        });
        var win = new Ext.Window({
            title: "插入一个函数...",
            applyToMarkup: "dialog-container",
            layout: "fit",
            autoHeight: true,
            width: 500,
            plain: true,
            modal: true,
            items: ct,
            resizable: false
        });
        function selectFunction() {
            var functionName = "=" + grid.getSelectionModel().getSelected().data.function_id + "()";
            FormulaBar.setValue(functionName);
            FormulaBar.focus();
            win.close();
        }
        win.addButton({
            text: "Ok",
            handler: selectFunction
        });
        win.addButton({
            text: "Close",
            handler: function() {
                win.close();
            }
        });
        grid.on("rowdblclick", selectFunction);
        win.show();
    });
}

function createToolbars(application) {
    Ext.onReady(function() {
        var imgpath = "/../../../statics/images/excel_imgs/";
        var iconspath = imgpath + "icons/";
        Ext.QuickTips.init();
        var tb = new Ext.Toolbar();
        tb.render("north");
        tb.add("-", {
            icon: iconspath + "saveas-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("保存") + "</b><br/>" + lang("保存到服务器"),
            handler: function() {
                application.saveBook();
            }
        });
        tb.add({
            icon: iconspath + "pencil-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("另存为") + "..</b><br/>" + lang("另存为"),
            handler: function() {
                saveBookConfirm();
            }
        });
        tb.add({
            icon: iconspath + "new-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("新建") + "..</b><br/>" + lang("新建表格"),
            handler: function() {
                application.newBook();
            }
        },
        "-");
        tb.add({
            icon: iconspath + "refresh-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("刷新表格") + "..</b><br/>" + lang("刷新表格"),
            handler: function() {
                application.refresh();
            }
        },
        "-");

        //var exportMenu = new Ext.menu.Menu({
        //    id: "exportMenu",
        //    items: [
        //    {
        //        text: "excel",
        //        icon: iconspath + "XLS-16x16.png",
        //        tooltip: "<b>" + lang("Export to") + " XLS</b><br/>" + lang("Export to") + " XLS. <br/>",
        //        handler: function() {
        //            application.exportBook("xls");
        //        }
        //    }
        //    ]
        //});
        //
        //tb.add({
        //    icon: iconspath + "export.png",
        //    text: lang("export"),
        //    iconCls: "bmenu",
        //    tooltip: "<b>" + lang("Export") + "</b><br/>" + lang("Export to many formats") + ". <br/>",
        //    menu: exportMenu
        //},
        //"-");

        var form = new Ext.form.FormPanel({
      		baseCls: 'x-plain',
      		labelWidth: 80,
      		//url:'import',
      		fileUpload:true,
      		defaultType: 'textfield',

      		items: [{
      			xtype: 'textfield',
      			fieldLabel: '文件路径',
      			name: 'file',
      			inputType: 'file',
      			allowBlank: false,
      			blankText: '导入文件不能为空.',
      			anchor: '90%' 
      		}]
      	});
		
      	var win = new Ext.Window({
      		title: '导入excel(请导入excel文件)',
      		width: 400,
      		height:200,
      		minWidth: 300,
      		minHeight: 100,
      		layout: 'fit',
      		plain:true,
      		bodyStyle:'padding:5px;',
      		buttonAlign:'center',
      		items: [form],

      		buttons: [{
      			text: '导入',
      			handler: function() {
                    var requestUrl ;
                    if(application.update1 == 0){
                        requestUrl = "import";
                    }else if(application.update1 == 1){
                        requestUrl = "../import";
                    }
      				if(form.form.isValid()){
      					Ext.MessageBox.show({
      						   title: '请等待',
      						   msg: '导入中...',
      						   progressText: '',
      						   width:300,
      						   progress:true,
      						   closable:false,
      						   animEl: 'loding'
      					   });
      					form.getForm().submit({
                            url:requestUrl,
      						success: function(form, action){
                                console.log(action.response);
                                win.hide();
                                Ext.MessageBox.hide();
      						   //Ext.Msg.alert('Message from extjs.org.cn',action.result.msg);
                                if(action.response.responseText){
                                    var response = action.response.responseText;
                                    response = jQuery.parseJSON(response);
                                    if(response.success == true){
                                        Ext.Msg.alert('导入成功', '文件导入成功.');
                                        var json = response.data;
                                        application.bookLoaded(json);
                                    }
                                }else{

                                }

      						},
      					   failure: function(action){
      						  Ext.Msg.alert('导入错误', '文件导入失败（请检查文件类型）.');
      					   }
      					})
      				}
      		   }
      		},{
      			text: '关闭',
      			handler:function(){win.hide();}
      		}]
      	});
	
    	tb.add({
			icon : iconspath + "table_import.png",
			cls : "x-btn-icon",
			tooltip : "<b>" + lang("导入") + "</b>",
			handler : function() {
				win.show();
			}
    	});
	        
        tb.add({
            icon: iconspath + "undo-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("撤销") + "</b>",
            handler: function() {
                application.undo();
            }
        });
        tb.add({
            icon: iconspath + "redo-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("重做") + "</b>",
            handler: function() {
                application.redo();
            }
        });
        tb.add({
            icon: iconspath + "bold-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<b>" + lang("黑体字") + "</b>",
            handler: bold
        });
        tb.add({
            icon: iconspath + "italic-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("斜体字") + "</i>",
            handler: italic
        });
        tb.add({
            icon: iconspath + "underline-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<u>" + lang("下划线") + "</u>",
            handler: underline
        },
        "-");
        tb.add({
            icon: iconspath + "delete-16x16.png",
            cls: "x-btn-icon",
            tooltip: "<u>" + lang("删除") + "</u>",
            handler: window.deleteSelection
        });
        tb.add({
            icon: iconspath + "unformat-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<u>" + lang("清除格式") + "</u>",
            handler: unformat
        },
        "-");
        var fontColorMenu = new Ext.menu.ColorMenu({});
        fontColorMenu.on("select",
        function(cm, color) {
            cmdSetFontColor("#" + color);
        });
        tb.add({
            icon: iconspath + "font-color-16x16.png",
            cls: "x-btn-icon",
            tooltip: lang("字体颜色"),
            menu: fontColorMenu
        },
        "-");
        var fontItems = [];
        for (var i in application.Fonts) {
            if (i != "remove") {
                fontItems.push({
                    text: "<span style=\"font-family: " + application.Fonts[i] + " \">" + application.Fonts[i] + "</span>",
                    index: i,
                    handler: function() {
                        cmdSetFontStyle(this.index);
                    }
                });
            }
        }
        var fontMenu = new Ext.menu.Menu({
            id: "fontMenu",
            items: fontItems
        });
        tb.add({
            icon: iconspath + "font-16x16.png",
            cls: "x-btn-icon",
            tooltip: lang("选择字体"),
            menu: fontMenu
        });
        var fontSize = new Ext.form.ComboBox({
            store: [["6", "6", "6"], ["7", "7", "7"], ["8", "8", "8"], ["9", "9", "9"], ["10", "10", "10"], ["11", "11", "11"], ["12", "12", "12"], ["14", "14", "14"], ["18", "18", "18"], ["24", "24", "24"], ["36", "36", "36"], ["48", "48", "48"]],
            displayField: "function_name",
            typeAhead: true,
            editable: false,
            mode: "local",
            triggerAction: "all",
            emptyText: "10",
            width: 60,
            selectOnFocus: true,
            tooltip: lang("字号")
        });
        fontSize.on("select",
        function(combo, record, index) {
            cmdSetFontSizeStyle(combo.getValue());
        });
        tb.addField(fontSize);
        tb.add("-");
        tb.add({
            disabled: false,
            icon: iconspath + "align_left-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("居左对齐") + "</i>",
            handler: function() {
                cmdSetAlignStyle("left");
            }
        });
        tb.add({
            disabled: false,
            icon: iconspath + "align_center-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("居中对齐") + "</i>",
            handler: function() {
                cmdSetAlignStyle("center");
            }
        });
        tb.add({
            disabled: false,
            icon: iconspath + "align_right-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("居右对齐") + "</i>",
            handler: function() {
                cmdSetAlignStyle("right");
            }
        });
        tb.add("-");
        tb.add({
            disabled: false,
            icon: iconspath + "valign_button-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("底部对齐") + "</i>",
            handler: function() {
                cmdSetValignStyle("bottom");
            }
        });
        tb.add({
            disabled: false,
            icon: iconspath + "valign_center-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("中间对齐") + "</i>",
            handler: function() {
                cmdSetValignStyle("middle");
            }
        });
        tb.add({
            disabled: false,
            icon: iconspath + "valign_top-16x16.gif",
            cls: "x-btn-icon",
            tooltip: "<i>" + lang("顶部对齐") + "</i>",
            handler: function() {
                cmdSetValignStyle("top");
            }
        });
        tb.add("-");
        tb.add({
            icon: iconspath + "fx-16x16.png",
            cls: "x-btn-icon",
            menu: new Ext.menu.Menu({
                items: [{
                    hideLabel: true,
                    text: "Sum",
                    handler: function() {
                        window.FormulaBar.setValue("=Sum(");
                        window.FormulaBar.focus();
                    }
                },
                {
                    hideLabel: true,
                    text: "Average",
                    handler: function() {
                        window.FormulaBar.setValue("=Average(");
                        window.FormulaBar.focus();
                    }
                },
                {
                    hideLabel: true,
                    text: "Count",
                    handler: function() {
                        window.FormulaBar.setValue("=Count(");
                        window.FormulaBar.focus();
                    }
                },
                {
                    hideLabel: true,
                    text: "Max",
                    handler: function() {
                        window.FormulaBar.setValue("=Max(");
                        window.FormulaBar.focus();
                    }
                },
                {
                    hideLabel: true,
                    text: "Min",
                    handler: function() {
                        window.FormulaBar.setValue("=Min(");
                        window.FormulaBar.focus();
                    }
                },
                "-", {
                    hideLabel: true,
                    text: lang("更多函数"),
                    handler: formulaWizard
                }]
            })
        });
       
        var tb2 = new Ext.Toolbar();
        tb2.render("north");
        var nameSelector = new Ext.form.ComboBox({
            displayField: "name",
            store: namesStore,
            typeAhead: true,
            mode: "local",
            forceSelection: false,
            width: 148,
            height: 23,
            triggerAction: "all",
            selectOnFocus: true,
            enableKeyEvents: true,
            ctCls: "nameSelectorContainer",
            id: "nameSelector"
        });
        window.nameSelector = nameSelector;
        nameSelector.on("keydown",
        function(object, e) {
            if (e.getKey() == e.ENTER) {
                if (!text.isExpanded()) {
                    setTimeout(function() {
                        application.nameSelectorChanged(nameSelector.getValue());
                    },
                    1);
                }
            }
        });
        nameSelector.on("select",
        function() {
            application.nameSelectorChanged(nameSelector.getValue());
        });
        tb2.add(nameSelector);
        tb2.add("");
        tb2.add({
            icon: iconspath + "fx-16x16.png",
            cls: "x-btn-icon",
            tooltip: lang("插入函数"),
            handler: formulaWizard
        });
        tb2.add("");
        var function_list = new Ext.data.SimpleStore({
            fields: ["function_id", "function_name"],
            data: calculator.getFunctionList()
        });
        function_list.sort("function_id");
        var text = new Ext.form.ComboBox({
            store: function_list,
            displayField: "function_name",
            typeAhead: true,
            mode: "local",
            forceSelection: false,
            width: 460,
            triggerAction: "all",
            selectOnFocus: false,
            id: "FormulaBar",
            ctCls: "no-image",
            enableKeyEvents: true
        });
        text.on("keydown",
        function(object, e) {
            if (e.getKey() == e.ENTER) {
                if (!text.isExpanded()) {
                    setTimeout(function() {
                        application.editActiveCell(text.getValue());
                    },
                    1);
                    application.model.moveDown();
                }
            }
            setTimeout(function() {
                application.editActiveCell(text.getValue());
            },
            1);
            return true;
        });
        text.on("select",
        function(object, e) {
            application.model.editActiveCell(text.getValue());
            return false;
        });
        text.on("focus",
        function(object, e) {
            application.editActiveCell(text.getValue());
            return true;
        });
        tb2.addField(text);
        window.FormulaBar = text;
    });
}