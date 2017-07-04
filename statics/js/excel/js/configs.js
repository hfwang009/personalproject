function loadConfigs() {
    var configs = {
        application: {
            titlePrefix: "excel"
        },
        communication: {
            url: "export",
            method: "POST"
        },
        communication1: {
            url: "../export",
            method: "POST"
        },
        theme: "excel",
        style: {
            defaultFontStyle: {
                fontId: 1,
                size: 10,
                color: "#000000",
                bold: false,
                italic: false,
                underline: false,
                align: "general",
                valign: "middle"
            }
        },
        grid: {
            height: 500,
            width: 500,
            rowHeader: {
                height: 28,
                width: 20
            },
            colHeader: {
                height: 18,
                width: 100
            },
            scrollbar: {
                height: 16,
                width: 17
            },
            resizeHandler: {
                size: 5
            }
        },
        sheet: {
            rows: 65536,
            cols: 256,
            defaultColumnWidth: 100,
            defaultRowHeight: 28
        },
        book: {
            defaultName: "book1",
            defaultSheets: 3
        }
    };
    return configs;
}

var format_json = {
	    "bookId": null, 
	    "bookName": "book1", 
	    "bookContent": {
	        "sheets": [
	            {
	                "sheetId": null, 
	                "sheetName": "sheet1", 
	                "cells": [
	                    {
	                        "r": "0", 
	                        "c": "0", 
	                        "f": "17", 
	                        "v": "17", 
	                        "fs": "3", 
	                        "ls": "0"
	                    }, 
	                    {
	                        "r": "0", 
	                        "c": "3", 
	                        "f": "= A1 + MAX(2,3)", 
	                        "v": "3424327", 
	                        "fs": "6", 
	                        "ls": "0"
	                    }
	                ]
	            }
	        ], 
	        "fontStyles": [
	            {
	                "fontStyleId": "0", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "10", 
	                "fontColor": "#000000", 
	                "fontUnderline": "0", 
	                "fontHAlign": 0, 
	                "fontVAlign": 1
	            }, 
	            {
	                "fontStyleId": "1", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "10", 
	                "fontColor": "#000000", 
	                "fontUnderline": "0", 
	                "fontHAlign": 2, 
	                "fontVAlign": 1
	            }, 
	            {
	                "fontStyleId": "2", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "10", 
	                "fontColor": "#FF0000", 
	                "fontUnderline": "0", 
	                "fontHAlign": 2, 
	                "fontVAlign": 1
	            }, 
	            {
	                "fontStyleId": "3", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "24", 
	                "fontColor": "#FF0000", 
	                "fontUnderline": "0", 
	                "fontHAlign": 2, 
	                "fontVAlign": 1
	            }, 
	            {
	                "fontStyleId": "4", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "10", 
	                "fontColor": "#FF00FF", 
	                "fontUnderline": "0", 
	                "fontHAlign": 2, 
	                "fontVAlign": 1
	            }, 
	            {
	                "fontStyleId": "5", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "9", 
	                "fontColor": "#FF00FF", 
	                "fontUnderline": "0", 
	                "fontHAlign": 2, 
	                "fontVAlign": 1
	            }, 
	            {
	                "fontStyleId": "6", 
	                "fontId": "1", 
	                "fontBold": "0", 
	                "fontItalic": "0", 
	                "fontSize": "48", 
	                "fontColor": "#FF00FF", 
	                "fontUnderline": "0", 
	                "fontHAlign": 2, 
	                "fontVAlign": 1
	            }
	        ]
	    }
	}